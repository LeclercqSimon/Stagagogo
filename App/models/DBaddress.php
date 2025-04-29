<?php
namespace App\models;

class DBaddress {
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

    public function getId($parameter1, $value1) {
        try {
            $stmt = $this->pdo->prepare("SELECT id_address FROM address WHERE $parameter1 = :value1 LIMIT 1");
            $stmt->bindParam(':value1', $value1);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'ID de l'adresse : " . $e->getMessage();
            return null;
        }
    }

    public function insertAddress($num_address, $street_address, $country_address, $postal_address, $city_address) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO address (num_address, street_address, country_address, postal_address, city_address) 
                VALUES (:num_address, :street_address, :country_address, :postal_address, :city_address)
            ");
            $stmt->bindParam(':num_address', $num_address);
            $stmt->bindParam(':street_address', $street_address);
            $stmt->bindParam(':country_address', $country_address);
            $stmt->bindParam(':postal_address', $postal_address);
            $stmt->bindParam(':city_address', $city_address);
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            echo "Erreur lors de l'insertion de l'adresse : " . $e->getMessage();
            return false;
        }
    }


    public function addressCompany($tab) {
        try {
            foreach ($tab as $key => $value) {
                $stmt = $this->pdo->prepare("SELECT * FROM address WHERE id_address = :id_address");
                $stmt->bindParam(':id_address', $value['id_address']);
                $stmt->execute();
                $address = $stmt->fetch(\PDO::FETCH_ASSOC);
                if ($address) {
                    $tab[$key]['address'] = $address;
                } else {
                    $tab[$key]['address'] = null;
                }
            }
            return $tab;
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération des adresses des entreprises : " . $e->getMessage();
            return [];
        }
    }
}