<?php
/* require 'vendor/autoload.php';
use app\model\Manager;
use app\model\MemberManager;
use app\model\PostManager;
 */
 require('controller/frontend.php');
//require('controller/backend.php');
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
     else if($_GET['action'] == 'subscribe')  {
         subscribe();
         connexion();
     }
     else if($_GET['action'] == 'post')  {
        addComment($_GET['id']);
    }
     
     else if($_GET['action']=='add'){
         
         addRecipe();
     }
     else if($_GET['action']=='profil'){
        if (isset($_GET['id']) && $_GET['id'] > 0){
            profil($_GET['id']);
            changeProfile($_GET['id']);
        }
    
        else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }    
       
    }
    else if($_GET['action']=='love') {
        if(isset($_GET['id']) && $_GET['id']>0 ){
            heart($_GET['id']);
        }
      
    }
   
}
else{
    listPosts();

 }          
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}
