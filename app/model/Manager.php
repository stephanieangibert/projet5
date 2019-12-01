<?php
namespace app\model;
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=project5;charset=utf8', 'root', '');       
        //$db = new PDO('mysql:host=db5000219174.hosting-data.io;dbname=dbs213939;charset=utf8', 'dbu204211', 'Romane1010!');
        return $db;
    }
}