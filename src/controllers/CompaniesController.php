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
        echo $this->templateEngine->render('companies.twig.html');
    }
}