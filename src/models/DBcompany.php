<?php

namespace App\models;

class DBcompany{
    private $pdo;

    public function __construct(){  
        $this->pdo = new \PDO('mysql:host=localhost;dbname=stagagogo', 'root', '');
    }
    public function getCompanies(){
        $stmt = $this->pdo->prepare("SELECT * FROM company");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getCompany($companyId){
        $stmt = $this->pdo->prepare("SELECT * FROM company WHERE id_company = :companyId");
        $stmt->bindParam(':companyId', $companyId);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getId($parameter1, $value1){
        $stmt = $this->pdo->prepare("SELECT id_company FROM company WHERE $parameter1 = :value1 LIMIT 1");
        $stmt->bindParam(':value1', $value1);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function insertCompany($name, $city, $sector, $mail, $phone, $description, $post, $siret){
        $stmt = $this->pdo->prepare("INSERT INTO company (name_company, city_company, sector_company, mail_company, phone_company, description_company, post_company, siret_company) VALUES (:name, :city, :sector, :mail, :phone, :description, :post, :siret)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':sector', $sector);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':post', $post);
        $stmt->bindParam(':siret', $siret);
        return $stmt->execute();
    }

    public function getCompaniesWithOffers() {
        $stmt = $this->pdo->prepare("SELECT * FROM company c LEFT JOIN offer o ON c.id_company = o.id_company ORDER BY c.id_company");
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        // Regrouper les offres par entreprise
        $companies = [];
        foreach ($results as $row) {
            $companyId = $row['id_company'];
            if (!isset($companies[$companyId])) {
                $companies[$companyId] = [
                    'id_company' => $row['id_company'],
                    'name_company' => $row['name_company'],
                    'description_company' => $row['description_company'],
                    'city_company' => $row['city_company'],
                    'sector_company' => $row['sector_company'],
                    'mail_company' => $row['mail_company'],
                    'phone_company' => $row['phone_company'],
                    'siret_company' => $row['siret_company'],
                    'offers' => [] // Initialiser un tableau pour les offres
                ];
            }
            if ($row['title_offer']) {
                $companies[$companyId]['offers'][] = $row['title_offer'];
            }
        }
        return array_values($companies); // Retourner un tableau indexé
    }
}