<?php
namespace App\Controllers;

use App\Models\DBcompany;
use App\Models\DBaddress;
use App\Models\DBoffer;
use Exception;

class CompaniesController extends Controller {

    public function __construct($templateEngine) {
        try {
            $this->model = new DBcompany();
            $this->model2 = new DBaddress();
            $this->templateEngine = $templateEngine;
        } catch (Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur : " . $e->getMessage();
            exit();
        }
    }

    public function CompaniesPage() {
        try {
            echo $this->templateEngine->render('companies.twig.html', [
                'companies' => $this->model->getCompanies()
            ]);
        } catch (Exception $e) {
            echo "Erreur lors de l'affichage des entreprises : " . $e->getMessage();
        }
    }

    public function AddressCompagnies() {
        try {
            foreach ($this->model->getCompanies() as $company) {
                $address = $this->model->getAddress($company['id_address']);
                if ($address) {
                    $company['address'] = $address;
                } else {
                    $company['address'] = null;
                }
            }
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des adresses des entreprises : " . $e->getMessage();
        }
    }
}