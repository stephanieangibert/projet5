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