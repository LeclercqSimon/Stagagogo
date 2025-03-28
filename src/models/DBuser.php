<?php

namespace App\models;

class DBuser{
    private $pdo;

    public function __construct(){  
        $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
    }

    public function getId($parameter1, $value1){
        $stmt = $this->pdo->prepare("SELECT id_user FROM user WHERE $parameter1 = :value1 LIMIT 1");
        $stmt->bindParam(':value1', $value1);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getUser($mail, $password){
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE mail_user = :mail AND pwd_user = :password");
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function insertUser($name, $firstname, $mail, $pwd, $phone, $status){
        $stmt = $this->pdo->prepare("INSERT INTO user (name_user, firstname_user, mail_user, pwd_user, phone_user, status) VALUES (:name, :firstname, :mail, :pwd, :phone, :status)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':pwd', $pwd);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }
}