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
public function member($pseudo, $mail, $mdp,$admin,$avatar)
{  
    $db = $this->dbConnect();
    $admin=0;
    $avatar="";
    $insertmbr = $db->prepare("INSERT INTO users(pseudo, email, password,admin,avatar) VALUES(?, ?, ?,?,?)");
    $insertmbr->execute(array($pseudo, $mail, $mdp,$admin,$avatar));  
    return  $insertmbr; 
          
}
}