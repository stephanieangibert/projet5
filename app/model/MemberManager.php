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
public function profile($id){
    $db = $this->dbConnect();
    $reqprof=$db->prepare("SELECT * FROM users WHERE id = ?");
    $reqprof->execute(array($id));
    return $reqprof;

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
public function mailConnex($mailconnect)
{   
    $db = $this->dbConnect();
    $requser = $db->prepare("SELECT * FROM users WHERE email = ?");
    $requser->execute(array($mailconnect));    
    return $requser; 
    
} 
public function update($pseudo,$email,$pass,$admin,$avatar,$id){
    $db = $this->dbConnect();
    $squpd= $db->prepare("UPDATE users SET pseudo = ?,email = ?,password = ?,admin = ?,avatar = ? WHERE id = ?");   
    $upd=$squpd->execute(array($pseudo,$email,$pass,$admin,$avatar,$id));
    return $upd;                    

}
public function allUsers(){
    $db = $this->dbConnect();
    $reqU=$db->query('SELECT * FROM users');
    return $reqU;

}

}