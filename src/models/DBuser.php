<?php

namespace App\models;

class DBuser{
    private $pdo;

    public function __construct(){  
        $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
    }
    public function getUser($username, $password){
        
    }

}