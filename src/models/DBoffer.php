<?php 
namespace App\models;

class DBoffer{
    private $pdo;

    public function __construct(){  
        $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
    }

    public function getOffer($offerId){
        $stmt = $this->pdo->prepare("SELECT * FROM offer WHERE id_offer = :offerId");
        $stmt->bindParam(':offerId', $offerId);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function getId($parameter1, $value1){
        $stmt = $this->pdo->prepare("SELECT id_offer FROM offer WHERE $parameter1 = :value1 LIMIT 1");
        $stmt->bindParam(':value1', $value1);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function insertOffer($publication,$title,$description,$salary,$status,$contract,$sector,$views,$candidates){
        $stmt = $this->pdo->prepare("INSERT INTO offer (publication_offer, title_offer, description_offer, salary_offer, status_offer, contract_offer, sector_offer, views_offer, candidates_offer) VALUES (:publication, :title, :description, :salary, :status, :contract, :sector, :views, :candidates)");
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
    }

    function getOffers(){
        $stmt = $this->pdo->prepare("SELECT * FROM offer");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}