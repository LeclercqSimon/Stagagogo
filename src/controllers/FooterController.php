<?php
namespace App\Controllers;

class FooterController extends Controller{

    public function __construct($templateEngine) {
        $this->model = null;
        $this->model2 = null;
        $this->templateEngine = $templateEngine;
    }

    public function CGUPage() {
        echo $this->templateEngine->render('footer/cgu.twig.html');
    }
    public function ConfidentialitePage() {
        echo $this->templateEngine->render('footer/confidentialite.twig.html');
    }
    public function CookiesPage() {
        echo $this->templateEngine->render('footer/cookies.twig.html');
    }
    public function AboutPage() {
        echo $this->templateEngine->render('footer/about.twig.html');
    }
}