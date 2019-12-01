<?php
require 'vendor/autoload.php';
use app\model\Manager;
use app\model\MemberManager;
use app\model\PostManager;
require('controller/frontend.php');
//require('controller/backend.php');
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
     else if($_GET['action'] == 'subscribe')  {
         subscribe();
     }
     else if($_GET['action']=='add'){
         addPost();
     }
     else if($_GET['action']=='profil'){
        profil();
    }
  

}
else{
    listPosts();

 }          
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}
