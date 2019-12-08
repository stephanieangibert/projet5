<?php
//require_once("model/Manager.php");
namespace app\model; 
require 'vendor/autoload.php';
use app\model\Manager;

class PostManager extends Manager
{
    public function getPosts()
{
    $db = $this->dbConnect();

    $req= $db->query('SELECT id, title,ingredients, content,id_user, DATE_FORMAT(date_content, \'%d/%m/%Y\') AS date_content FROM recipe ORDER BY date_content DESC LIMIT 0,2');
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
    $post=$db->prepare('SELECT id, title,ingredients, content FROM recipe WHERE id=?');
    $post->execute(array($id));
    $reqPost= $post->fetch();
    return $reqPost;

}
public function add($title,$ingredients,$content,$id_user,$love)
{
    $db = $this->dbConnect();
    $add = $db->prepare('INSERT INTO recipe(title,ingredients,content,date_content,id_user,love) VALUES(?,?,?, NOW(),?,?)');
    $addRecipe = $add->execute(array($title,$ingredients,$content,$id_user,$love));    
    return $addRecipe;
}
public function addLove($id){
    $db = $this->dbConnect();    
    $addL =$db->prepare('UPDATE recipe SET love=love+1 WHERE id = ?');
    $addLo=$addL ->execute($id);
    return $addLo;
}
public function minLove($id){
    $db = $this->dbConnect();    
    $addM =$db->prepare('UPDATE recipe SET love=love-1 WHERE id = ?');
    $addMi=$addM ->execute($id);
    return $addMi;

}
}