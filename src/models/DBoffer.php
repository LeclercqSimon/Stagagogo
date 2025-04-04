<?php 
namespace App\Models;

class DBoffer {
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

    public function getOffer($offerId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM offer WHERE id_offer = :offerId");
            $stmt->bindParam(':offerId', $offerId);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'offre : " . $e->getMessage();
            return null;
        }
    }

    public function getId($parameter1, $value1) {
        try {
            $stmt = $this->pdo->prepare("SELECT id_offer FROM offer WHERE $parameter1 = :value1 LIMIT 1");
            $stmt->bindParam(':value1', $value1);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération de l'ID de l'offre : " . $e->getMessage();
            return null;
        }
    }

    public function insertOffer($publication, $title, $description, $salary, $status, $contract, $sector, $views, $candidates) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO offer (publication_offer, title_offer, description_offer, salary_offer, status_offer, contract_offer, sector_offer, views_offer, candidates_offer) 
                VALUES (:publication, :title, :description, :salary, :status, :contract, :sector, :views, :candidates)
            ");
            $stmt->bindParam(':publication', $publication);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':salary', $salary);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':contract', $contract);
            $stmt->bindParam(':sector', $sector);
            $stmt->bindParam(':views', $views);
            $stmt->bindParam(':candidates', $candidates);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur lors de l'insertion de l'offre : " . $e->getMessage();
            return false;
        }
    }

    public function getOffers() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM offer WHERE offer_status = 'ouvert' ORDER BY publication_offer DESC");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération des offres : " . $e->getMessage();
            return [];
        }
    }

    public function candidatesOffer($id_offer) {
        try {
            $stmt = $this->pdo->prepare("SELECT candidates_offer FROM offer WHERE id_offer = :id_offer");
            $stmt->bindParam(':id_offer', $id_offer);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération des candidats pour l'offre : " . $e->getMessage();
            return null;
        }
    }

    public function updateCandidates($id_offer, $nb_post) {
        try {
            $stmt = $this->pdo->prepare("UPDATE offer SET candidates_offer = :nb_post WHERE id_offer = :id_offer");
            $stmt->bindParam(':nb_post', $nb_post);
            $stmt->bindParam(':id_offer', $id_offer);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur lors de la mise à jour des candidats pour l'offre : " . $e->getMessage();
            return false;
        }
    }

    public function companiesOffers() {
        try {
            $stmt = $this->pdo->prepare("
                SELECT * FROM offer o 
                INNER JOIN company c ON o.id_company = c.id_company 
                WHERE offer_status = 'ouvert'
            ");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération des offres des entreprises : " . $e->getMessage();
            return [];
        }
    }
}