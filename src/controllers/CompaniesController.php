<?php
namespace App\Controllers;
use App\Models\DBcompany;
use App\Models\DBaddress;
use App\Models\DBoffer;
class CompaniesController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBcompany();
        $this->model2 = new DBaddress();
        $this->templateEngine = $templateEngine;
    }

    public function CompaniesPage() {
        echo $this->templateEngine->render('companies.twig.html', [
            //'companies' => $this->model->getCompanies(),
            'address' => $this->model2->addressCompany($this->model->getCompanies()),
            'offers' => $this->model->getCompaniesWithOffers()
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
}