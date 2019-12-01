<?php
//require_once("model/Manager.php");

namespace app\model; 
class PostManager extends Manager
{
    public function getPosts()
{
    $db = $this->dbConnect();
    $req= $db->query('SELECT id, title,ingredients, content, DATE_FORMAT(date_content, \'%d/%m/%Y\') AS date_content FROM recipe ORDER BY date_content DESC LIMIT 0, 5');
    return $req;
}
}