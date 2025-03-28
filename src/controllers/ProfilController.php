<?php
namespace App\Controllers;

class ProfilController extends Controller{

    public function __construct($templateEngine) {
        $this->model = null;
        $this->templateEngine = $templateEngine;
    }

    public function ProfilPage() {
        echo $this->templateEngine->render('profil.twig.html');
    }
}