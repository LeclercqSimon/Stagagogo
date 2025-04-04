<?php
namespace App\models;

class DBwishlist {
    private $pdo;

    public function __construct() {  
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Active les exceptions PDO
        } catch (\PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit();
        }
    }

    public function getOffers($id_user) {
        try {
            $stmt = $this->pdo->prepare("SELECT id_offer FROM wishlist WHERE id_user = :id_user");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération des offres de la wishlist : " . $e->getMessage();
            return [];
        }
    }

    public function addOffer($id_user, $id_offer) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO wishlist (id_user, id_offer, status) VALUES (:id_user, :id_offer, false)");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_offer', $id_offer);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur lors de l'ajout de l'offre à la wishlist : " . $e->getMessage();
            return false;
        }
    }

    public function removeOffer($id_user, $id_offer) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM wishlist WHERE id_user = :id_user AND id_offer = :id_offer");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_offer', $id_offer);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur lors de la suppression de l'offre de la wishlist : " . $e->getMessage();
            return false;
        }
    }
}