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
    $req= $db->query('SELECT id, title,ingredients, content,id_user,photo, DATE_FORMAT(date_content, \'%d/%m/%Y\') AS date_content FROM recipe ORDER BY date_content DESC LIMIT '. $begin .','. $RecipePerPage .'');
    return $req;
}
public function totalRecipes(){
    $db = $this->dbConnect();
    $reqRec=$db->query('SELECT id FROM recipe');
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
public function add($title,$ingredients,$content,$id_user,$love,$photo)
{
    $db = $this->dbConnect();
    $add = $db->prepare('INSERT INTO recipe(title,ingredients,content,date_content,id_user,love,photo) VALUES(?,?,?, NOW(),?,?,?)');
    $addRecipe = $add->execute(array($title,$ingredients,$content,$id_user,$love,$photo));    
    return $addRecipe;
}
public function join(){
    $db=$this->dbConnect();
    $reqj=$db->query('SELECT recipe.id_user,users.pseudo FROM recipe,users WHERE recipe.id_user=users.id ');
    return $reqj;
}
public function addLove($id){
    // die(var_dump($id));
    $db = $this->dbConnect();    
    $addL =$db->prepare('UPDATE recipe SET love=love+1 WHERE id = :id');
    $addLo=$addL->execute(array('id'=>$id));
    return $addLo;
}
public function minLove($id){
    $db = $this->dbConnect();    
    $addM =$db->prepare('UPDATE recipe SET love=love-1 WHERE id = ?');
    $addMi=$addM ->execute($id);
    return $addMi;

}
public function addRecipesBack(){
    $db = $this->dbConnect(); 
    $reqR=$db->query('SELECT * FROM recipe');
    return $reqR;

}
}