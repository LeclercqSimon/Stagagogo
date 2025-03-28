<?php
namespace App\models;

class DBaddress {
    private $pdo;

    public function __construct(){  
        $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
    }

    public function getId($parameter1, $value1){
        $stmt = $this->pdo->prepare("SELECT id_address FROM address WHERE $parameter1 = :value1 LIMIT 1");
        $stmt->bindParam(':value1', $value1);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function insertAddress($num_address, $street_address, $country_adress, $postal_address, $city_address, $complement_address){
        $stmt = $this->pdo->prepare("INSERT INTO address (num_address, street_address, country_adress, postal_address, city_address, complement_address) VALUES (:num_address, :street_address, :country_adress, :postal_address, :city_address, :complement_address)");
        $stmt->bindParam(':num_address', $num_address);
        $stmt->bindParam(':street_address', $street_address);
        $stmt->bindParam(':country_adress', $country_adress);
        $stmt->bindParam(':postal_address', $postal_address);
        $stmt->bindParam(':city_address', $city_address);
        $stmt->bindParam(':complement_address', $complement_address);
        return $stmt->execute();
    }
}
