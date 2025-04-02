<?php
namespace App\models;

class DBwishlist {
    private $pdo;

    public function __construct(){  
        $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
    }
    public function getOffers($id_user){
        $stmt = $this->pdo->prepare("SELECT * FROM wishlist WHERE id_user = :id_user");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function addOffer($id_user, $id_offer){
        $stmt = $this->pdo->prepare("INSERT INTO wishlist (id_user, id_offer,status) VALUES (:id_user, :id_offer, false)");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_offer', $id_offer);
        return $stmt->execute();
    }

    public function removeOffer($id_user, $id_offer){
        $stmt = $this->pdo->prepare("DELETE FROM wishlist WHERE id_user = :id_user AND id_offer = :id_offer");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_offer', $id_offer);
        return $stmt->execute();
    }
}
