<?php
//require_once("model/Manager.php");
namespace app\model; 
class MemberManager extends Manager
{
    public function subscribe($mail)
{
    $db = $this->dbConnect();
    $reqmail = $db->prepare("SELECT * FROM users WHERE email = ?");
    $reqmail->execute(array($mail));
    $mailexist = $reqmail->rowCount();
    return $mailexist;
}
public function member($pseudo, $mail, $mdp,$admin)
{  
    $db = $this->dbConnect();
    $admin=0;
    $insertmbr = $db->prepare("INSERT INTO users(pseudo, email, password,admin) VALUES(?, ?, ?,?)");
    $insertmbr->execute(array($pseudo, $mail, $mdp,$admin));  
    return  $insertmbr; 
          
}
}