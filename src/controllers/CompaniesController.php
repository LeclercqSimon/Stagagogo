<?php
namespace App\Controllers;

class CompaniesController extends Controller{

    public function __construct($templateEngine) {
        $this->model = null;
        $this->templateEngine = $templateEngine;
    }

    public function CompaniesPage() {
        echo $this->templateEngine->render('companies.twig.html');
    }
}