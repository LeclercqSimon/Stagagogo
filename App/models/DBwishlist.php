<?php

namespace App\Models;

class DBwishlist
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo3', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit();
        }
    }

    public function getOffers($id_user)
{
    try {
        $stmt = $this->pdo->prepare("
            SELECT o.id_offer, o.title_offer, o.descr_offer, o.salary_offer, o.offer_status, o.contract_offer, 
                   o.sector_offer, o.views_offer, o.candidates_offer, o.publication_offer, o.id_company
            FROM wishlist w
            JOIN offer o ON w.id_offer = o.id_offer
            WHERE w.id_user = :id_user
        ");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        echo "Erreur lors de la récupération des offres de la wishlist : " . $e->getMessage();
        return [];
    }
}


    public function addOffer($id_user, $id_offer)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO wishlist (id_user, id_offer, status_wishlist) VALUES (:id_user, :id_offer, false)");
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_offer', $id_offer);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur lors de l'ajout de l'offre à la wishlist : " . $e->getMessage();
            return false;
        }
    }

    public function removeOffer($id_user, $id_offer)
    {
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
