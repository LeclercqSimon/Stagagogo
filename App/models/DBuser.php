<?php

namespace App\Models;

class DBuser {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo3', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit();
        }
    }

    public function getUserById($id_user) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT u.*, a.num_address, a.street_address, a.postal_address, a.city_address, a.country_address
                FROM user u
                LEFT JOIN address a ON u.id_address = a.id_address
                WHERE u.id_user = :id_user
            ");
            $stmt->bindParam(':id_user', $id_user, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'utilisateur : " . $e->getMessage();
            return null;
        }
    }

    public function insertUser($name, $firstname, $mail, $pwd, $phone, $status, $id_address) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO user (name_user, firstname_user, mail_user, pwd_user, phone_user, status_user, id_address) 
                VALUES (:name, :firstname, :mail, :pwd, :phone, :status, :id_address)
            ");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':pwd', $pwd);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id_address', $id_address);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    public function verif($mail, $pwd) {
        try {
            $stmt = $this->pdo->prepare("SELECT pwd_user FROM user WHERE mail_user = :mail");
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$result) return false;
            return password_verify($pwd, $result['pwd_user']);
        } catch (\PDOException $e) {
            echo "Erreur lors de la vérification des identifiants : " . $e->getMessage();
            return false;
        }
    }

    public function getUser($mail) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT u.*, a.num_address, a.street_address, a.postal_address, a.city_address, a.country_address
                FROM user u
                LEFT JOIN address a ON u.id_address = a.id_address
                WHERE u.mail_user = :mail
            ");
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'utilisateur : " . $e->getMessage();
            return null;
        }
    }

    public function getAllUser() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM user");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de tous les utilisateurs : " . $e->getMessage();
            return [];
        }
    }

    public function deleteUserById($userId) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM user WHERE id_user = :id_user");
            $stmt->bindParam(':id_user', $userId, \PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }
}
