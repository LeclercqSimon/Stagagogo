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
    public function insertUser($name, $firstname, $mail, $pwd, $phone, $status, $id_address){
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO user (name_user, firstname_user, mail_user, pwd_user, phone_user, status_user, id_address) VALUES (:name, :firstname, :mail, :pwd, :phone, :status, :id_address)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':pwd', $hashedPwd); 
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id_address', $id_address);
        echo "L'utilisateur a été ajouté avec succès. ✅";
        return $stmt->execute();
    }

    public function verif($mail, $pwd) {
        // Prépare la requête SQL
        $stmt = $this->pdo->prepare("SELECT pwd_user FROM user WHERE mail_user = :mail");
        $stmt->bindParam(':mail', $mail); // Lie le paramètre :mail
        $stmt->execute(); // Exécute la requête
        
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($result && password_verify($pwd, $result['pwd_user'])) {
            echo "L'utilisateur a saisi le bon mot de passe. ✅";
        } else {
            echo "L'utilisateur n'a pas saisi le bon mot de passe. ❌";
        }
    }
}