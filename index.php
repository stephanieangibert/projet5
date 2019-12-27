<?php

 require('controller/frontend.php');
 require('controller/backend.php');


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
     else if($_GET['action'] == 'subscribe')  {
         subscribe();
        //  connexion();
     }
     else if($_GET['action'] == 'post')  {
        addOnePost($_GET['id']);
    }
    else if($_GET['action'] == 'comment')  {
        addComment($_POST['comment'],$_SESSION['pseudo'],$_GET['id']);
    }
     
     else if($_GET['action']=='add'){
        addRecipe();         
        
     }
     
     
     else if($_GET['action']=='profil'){
        if (isset($_GET['id']) && $_GET['id'] > 0){
            
            changeProfile($_GET['id']);
        }
    
        else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }    
       
    }
    else if($_GET['action']=='change'){
        if (isset($_GET['id']) && $_GET['id'] > 0){
            
            profil($_GET['id']);
        }
              
    }
    else if($_GET['action']=='love') {
        if (isset($_GET['id']) && $_GET['id'] > 0){
            heart($_GET['id'],$_SESSION['id']);
            
           
        }
    
        else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }    
      
    }
    else if($_GET['action']=='admin'){
        addElements();        
   
}
else if($_GET['action']=='accept'){
    if(isset($_GET['id']) && $_GET['id']>0 ){
        acceptRecipe($_GET['id']);
    }
}
else if($_GET['action']=='delete'){
    if(isset($_GET['id']) && $_GET['id']>0 ){
        deleteRecipe($_GET['id']);
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
