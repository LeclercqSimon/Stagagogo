<?php
namespace App\Controllers;
use App\Models\DBcompany;
class CompaniesController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBcompany();
        $this->model2 = null;
        $this->templateEngine = $templateEngine;
    }

    public function CompaniesPage() {
        echo $this->templateEngine->render('companies.twig.html', [
            'companies' => $this->model->getCompanies()
        ]);
    }

    public function AddressCompagnies() {
        foreach ($this->model->getCompanies() as $company) {
            $address = $this->model->getAddress($company['id_address']);
            if ($address) {
                $company['address'] = $address;
            } else {
                $company['address'] = null;
            }
        }
    }

    public function getCompany($companyId) {
        $company = $this->model->getCompany($companyId);
        if ($company) {
            echo json_encode($company);
        } else {
            echo json_encode(['error' => 'Company not found']);
        }
    }
}