<?php

require 'vendor/autoload.php';
use app\model\Manager;
use app\model\MemberManager;
use app\model\PostManager;
 
function addElements(){
    $user=New MemberManager();
    $users=$user->allUsers();   
    $recipe=New PostManager();
    $recipes=$recipe->addRecipesBack();
    require('view/backend/admin.php');

}
function acceptRecipe($id){
    $accept=New PostManager();
    $accRe=$accept->displayAcceptRecipe($id);
    header('location:index.php?action=admin');

}
function  deleteRecipe($id)
{
   $del=new PostManager();
   $delRecipe=$del->displayDeleteRecipe($id);
   header('location:index.php?action=admin');
   
}