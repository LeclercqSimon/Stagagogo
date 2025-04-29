<?php

namespace App\models;

class DBcompany {
    private $pdo;

    public function __construct() {  
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo3', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Active les exceptions PDO
        } catch (\PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit();
        }
    }

    public function getCompanies() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM company");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération des entreprises : " . $e->getMessage();
            return [];
        }
    }

    public function getCompany($companyId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM company WHERE id_company = :companyId");
            $stmt->bindParam(':companyId', $companyId);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'entreprise : " . $e->getMessage();
            return null;
        }
    }
    
    public function getId($parameter1, $value1) {
        try {
            $stmt = $this->pdo->prepare("SELECT id_company FROM company WHERE $parameter1 = :value1 LIMIT 1");
            $stmt->bindParam(':value1', $value1);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'ID de l'entreprise : " . $e->getMessage();
            return null;
        }
    }

    public function insertCompany($name, $city, $sector, $email, $phone, $description, $siret, $addressId) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO company (name_company, city_company, sector_company, mail_company, phone_company, description_company, siret_company, id_address)
                VALUES (:name, :city, :sector, :email, :phone, :description, :siret, :addressId)
            ");
            
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':sector', $sector);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':siret', $siret);
            $stmt->bindParam(':addressId', $addressId);
            $stmt->execute();
            
            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            echo "Erreur lors de l'insertion de l'entreprise : " . $e->getMessage();
            return false;
        }
    }
    
}