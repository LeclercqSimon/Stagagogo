<?php
namespace App\Controllers;

class HomeController extends Controller{

    public function __construct($templateEngine) {
        $this->model = null;
        $this->templateEngine = $templateEngine;
    }

    public function HomePage() {
        echo $this->templateEngine->render('home.twig.html');
        
    }
}