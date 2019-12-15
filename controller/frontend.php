 <?php
session_start();
require 'vendor/autoload.php';
use app\model\Manager;
use app\model\MemberManager;
use app\model\PostManager;


function listPosts()
{
    $managerP=new PostManager();   
    $nbrRecipe=$managerP->totalRecipes();   
    $RecipePerPage =2;
   $allPages = ceil($nbrRecipe/$RecipePerPage);   
  
    if(isset($_GET['listPosts']) AND !empty($_GET['listPosts']) AND $_GET['listPosts'] > 0 AND $_GET['listPosts'] <= $allPages) {
      $_GET['listPosts'] = intval($_GET['listPosts']);
      $currentPage = $_GET['listPosts'];
   } else {
      $currentPage = 1;
   }   
   $begin = ($currentPage-1)*$RecipePerPage;
   $pseudo=$managerP->join(); 
   $posts=$managerP->getPosts($begin,$RecipePerPage);
    
    
    
       
    require('view/frontend/listPostsView.php');
    
}
/* function addRecipe(){
    if(isset($_POST['submitAdd'])){
        $title=htmlspecialchars($_POST['title']);
        $ingredients=htmlspecialchars($_POST['ingredients']);
        $content=htmlspecialchars($_POST['content']); 
        $id_user=$_SESSION['id'];
        $love=0;
        $photo=0;      
      
        if(!empty($title)&&!empty($ingredients)&&!empty($content)){
            $Post=new PostManager();
            $addReci=$Post->add($title,$ingredients,$content,$id_user,$love,$photo);
        }
    }
    require('view/frontend/listPost.php');
} */
function addRecipe(){
   if(isset($_POST['submitAdd'])){
         if(isset($_FILES['photo']) && !empty($_FILES['photo']['name']) && !empty($_POST['title']) && !empty($_POST['ingredients']) && !empty($_POST['content'])){
            $tailleMax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
            $title=htmlspecialchars($_POST['title']);
            $ingredients=htmlspecialchars($_POST['ingredients']);
            $content=htmlspecialchars($_POST['content']);
            $id_user=$_SESSION['id'];           
            $love=0;
            if($_FILES['photo']['size'] <= $tailleMax){
               $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
               if(in_array($extensionUpload, $extensionsValides)){
                   $chemin = "member/photo/".$_SESSION['id'].".".$extensionUpload;
                   $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
                      if($resultat){
                       $photo=$_SESSION['id'].".".$extensionUpload;
                       $Post=new PostManager();
                       $addReci=$Post->add($title,$ingredients,$content,$id_user,$love,$photo);
                      }
                      else{
                       $msg = "Erreur durant l'importation de votre photo de recette";
                      }
               }else{
                   $msg = "Votre photo de recette doit être au format jpg, jpeg, gif ou png";
               }
            }else{
               $msg = "Votre photo de recette ne doit pas dépasser 2Mo";
            }
                
         }else{if(!empty($title)&&!empty($ingredients)&&!empty($content)){
           $title=htmlspecialchars($_POST['title']);
           $ingredients=htmlspecialchars($_POST['ingredients']);
           $content=htmlspecialchars($_POST['content']); 
           $id_user=$_SESSION['id'];
           $love=0;
           $photo="";      
           $Post=new PostManager();
           $addReci=$Post->add($title,$ingredients,$content,$id_user,$love,$photo);
         }           

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

   function changeProfile($id){
      $profil= new MemberManager();
         $Prof=$profil->profile($id);
         $msg="";
      require('view/frontend/profile.php');
   
   } 
   function profil($id){
     if(isset($_POST['submit'])){
      if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'] && !empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['password'])&& !empty($_POST['pass1']))){
         $tailleMax = 2097152;
         $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
          $email=htmlspecialchars($_POST['email']);
               $pseudo=htmlspecialchars($_POST['pseudo']);
               $pass=$_POST['password'];
               $mdp1=$_POST['pass1']; 
               $admin=0; 
               $id=$_SESSION['id'];  
               if($pass==$mdp1){
                 $pass= password_hash($_POST['password'], PASSWORD_DEFAULT);
                 $mdp1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);  
                 if($_FILES['avatar']['size'] <= $tailleMax){
                     $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                     if(in_array($extensionUpload, $extensionsValides)){
                         $chemin = "member/avatars/".$_SESSION['id'].".".$extensionUpload;
                         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                         if($resultat){
                             $avatar=$_SESSION['id'].".".$extensionUpload;
                             $updPro= new MemberManager();
                             $updProf=$updPro->update($pseudo,$email,$pass,$admin,$avatar,$id);
                         }else{
                             $msg = "Erreur durant l'importation de votre photo de profil";
                         }
                     }else{
                         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
                     }
                 }else{
                     $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
                 }
               }else{
                 $msg = "Vos mots de passe doivent être identiques";
               }
     }
     else{
        if(!empty($_POST['pseudo'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['pass1']))
        {
           $email=htmlspecialchars($_POST['email']);
           $pseudo=htmlspecialchars($_POST['pseudo']);
           $pass=$_POST['password'];
           $mdp1=$_POST['pass1']; 
           $admin=0; 
           $id=$_SESSION['id'];  
           $avatar=$_SESSION['avatar'];
               if($pass=$mdp1){
                    if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $pass)){
                       $pass= password_hash($_POST['password'], PASSWORD_DEFAULT);
                       $mdp1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);                                     
                       $updPro= new MemberManager();
                       $updProf=$updPro->update($pseudo,$email,$pass,$admin,$avatar,$id);               
                       $msg = "Votre compte a bien été créé !";
                    }
                    else{
                        $msg="Doit comporter au moins 6 caractères et 1 majuscule !";
                    }

               }
               else{
                  $msg="Vos mots de passe ne correspondent pas !";
               }
        }
 
     }

     }
     
   
     
    header('location:index.php?action=profil&id='.$id);
  
  }  


  
function connexion()
{
   if(isset($_POST['submit2'])){     
      $mailconnect = htmlspecialchars($_POST['email']);   
      $mdpconnect=htmlspecialchars($_POST['password']); 
        if(isset($mailconnect) AND !empty($mdpconnect)) {    
           $memberM=new MemberManager();

         $userexist= $memberM->mailConnex($mailconnect);        
                      
                 if($userexist->rowCount() == 1) {                
               
                 $userinfo=$userexist->fetch();
                  if(password_verify($mdpconnect,$userinfo['password'])){               
                     $_SESSION['pseudo'] = $userinfo['pseudo'];                   
                     $_SESSION['id']=$userinfo['id']; 
                     $_SESSION['admin']=$userinfo['admin'];
                     $_SESSION['email']=$userinfo['email'];                
                     $erreur='Vous êtes connectés !'; 
                    
                  }  
                 
                  else{ 
                   $erreur='Mauvais mail ou mot de passe !';             
             
                  }                                
      
                } else {
                  $erreur="Mauvais mail ou mot de passe !"; 
              
                
                 }
            
           
                } else {
                  $erreur="Tous les champs doivent être complétés !"; 
                
    }  
  
   }  
 
}




function addComment($id){
   $post=new PostManager();
   $postCom=$post->getPost($id);
   require('view/frontend/listComments.php');
}
function heart($id){
  /*  if(!empty($_SESSION['pseudo'])){
      $playing = true;
      if ($playing) {
         $postAlo=new PostManager();
         $addLo=$postAlo->addLove($id);
     } else {
      $postMin=new PostManager();
      $addMi=$postMin->minLove($id);
     }
    $playing=!$playing;
      
   }
    */
 
   header('location:index.php'); 
   $postAlo=new PostManager();
   $addLo=$postAlo->addLove($id);
}