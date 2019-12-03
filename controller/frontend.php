<?php
session_start();
//require_once('model/PostManager.php'); 
//require_once('model/MemberManager.php'); 
require 'vendor/autoload.php';
use app\model\Manager;
use app\model\MemberManager;
use app\model\PostManager;


function listPosts()
{
    $managerP=new PostManager();
    $posts=$managerP->getPosts();
    require('view/frontend/listPostsView.php');
    
}
function addPost(){
    if(isset($_POST['submit'])){
        $title=htmlspecialchars($_POST['title']);
        $ingredrients=htmlspecialchars($_POST['ingredrients']);
        $content=htmlspecialchars($_POST['content']);
        if(!empty($title)&&!empty($ingredrients)&&!empty($content)){
            $Post=new postManager();
            $req=$Post->getsPots();
        }
    }
    require('view/frontend/listPost.php');
}
function subscribe()
{
   
     if(isset($_POST['submit'])){
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['email']);
      $mdp=$_POST['password'];
      $mdp1=$_POST['pass1'];
      $admin=0;
      $avatar="";
    
      if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['pass1'])) {
         $pseudolength = strlen($pseudo);
         if($pseudolength <= 255) {
         
               if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                  $memberM=new MemberManager();
                  $mailexist=$memberM->subscribe($mail);              
                  if($mailexist == 0) {
                                          
                     if($mdp == $mdp1) {
                        if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $mdp)){
                       $mdp= password_hash($_POST['password'], PASSWORD_DEFAULT);
                       $mdp1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);                                     
                       $insertmbr=$memberM->member($pseudo, $mail, $mdp,$admin,$avatar);                
                       $erreur = "Votre compte a bien été créé !"; 
                       $_SESSION['pseudo']=$mailexist['pseudo'];
                     }        
                       
                                      
                      else {$erreur = "Doit comporter au moins 6 caractères et 1 majuscule !";}
                               

                     }else{
                        $erreur = "Vos mots de passe ne correspondent pas";
                     }
                  } else {
                     $erreur = "Adresse mail déjà utilisée !";
                  }
               } else {
                  $erreur = "Votre adresse mail n'est pas valide !";
               }
            
         } else {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
         }
      } else {
         $erreur = "Tous les champs doivent être complétés !";
      }

   }        
     
     require('view/frontend/subscribe.php');
}
function profil(){
   require('view/frontend/profile.php');
}