<?php
function addRecipe(){
    if(isset($_POST['submitAdd'])){
          if(isset($_FILES['photo'])&&!empty($_FILES['photo']['name'])&&!empty($_POST['title'])&&!empty($_POST['ingredients'])!empty($_POST['content'])){
            $tailleMax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
             $title=htmlspecialchars($_POST['title']);
             $ingredients=htmlspecialchars($_POST['ingredients']);
             $content=htmlspecialchars($_POST['content']);
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
            $photo=0;      
            $Post=new PostManager();
            $addReci=$Post->add($title,$ingredients,$content,$id_user,$love,$photo);
          }           

          }
    }
    require('view/frontend/listPost.php');
}