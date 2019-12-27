<?php
//require_once("model/Manager.php");
namespace app\model; 
require 'vendor/autoload.php';
use app\model\Manager;

class PostManager extends Manager
{
    public function getPosts($begin,$RecipePerPage)
{
    
    $db = $this->dbConnect();    
    $req=$db->query('SELECT recipe.id, recipe.title,recipe.ingredients,recipe.content,recipe.photo,users.pseudo,users.avatar
     FROM recipe INNER JOIN users ON recipe.id_user=users.id
     WHERE statut=1 ORDER BY date_content DESC LIMIT '. $begin .','. $RecipePerPage .'');
     return $req;
}
public function totalRecipes(){
    $db = $this->dbConnect();
    $reqRec=$db->query('SELECT id FROM recipe WHERE statut=1');
    $nbrRecipe =$reqRec->rowCount();
    return $nbrRecipe;
}
public function getPost($id)
{
    $db = $this->dbConnect();
    $post=$db->prepare('SELECT id, title,ingredients,content FROM recipe WHERE id=?');
    $post->execute(array($id));
    $reqPost= $post->fetch();
    return $reqPost;

}
public function getCom($comment,$id_pseudo,$id_recipe)
{
    $db = $this->dbConnect();
    $postC=$db->prepare('INSERT INTO comments(comment,id_pseudo,date_comment,id_recipe) VALUES (?,?,NOW(),?)');
    $postCo=$postC->execute(array($comment,$id_pseudo,$id_recipe));
    return $postCo;

}

public function comments($Id)
{
    $db = $this->dbConnect();   
    $comments = $db->prepare('SELECT id, id_pseudo, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y\') AS date_comment FROM comments WHERE id_recipe = ? ORDER BY date_comment DESC');
    $comments->execute(array($Id));

    return $comments;
}
public function add($title,$ingredients,$content,$id_user,$photo,$statut)
{
    $db = $this->dbConnect();
    $add = $db->prepare('INSERT INTO recipe(title,ingredients,content,date_content,id_user,photo,statut) VALUES(?,?,?, NOW(),?,?,?)');
    $addRecipe = $add->execute(array($title,$ingredients,$content,$id_user,$photo,$statut));    
    return $addRecipe;
}

public function addLove($id,$id_user){
    // die(var_dump($id));
    $db = $this->dbConnect();     
    $addL =$db->prepare('INSERT INTO likes(id_recipe,id_user,point) VALUES(?,?,0)');
    $addLo=$addL->execute(array($id,$id_user));
    return $addLo;
}
 public function point($id,$id_user)
{
    $db = $this->dbConnect();
    $reqPoi=$db->prepare('SELECT * FROM likes WHERE id_recipe=? AND id_user=?');
    $reqPoint=$reqPoi->execute(array($id,$id_user)); 
    return $reqPoint;

} 

public function addRecipesBack(){
    $db = $this->dbConnect(); 
    $reqR=$db->query('SELECT * FROM recipe');
    return $reqR;

}
public function displayAcceptRecipe($id){
    $db = $this->dbConnect();
    $accep=$db->prepare('UPDATE recipe SET statut=1 WHERE id = :id');
    $acc=$accep->execute(array('id'=>$id));
    return $acc;

}
 public function displayDeleteRecipe($id)
 {
    $db = $this->dbConnect();
    $delPos =$db->prepare("DELETE FROM recipe WHERE id = ?");
    $delPos->execute(array($id));
    $delPost=$delPos->fetch();
    return $delPost;
}
}