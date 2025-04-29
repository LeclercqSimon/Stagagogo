<?php
namespace App\Controllers;

class FooterController extends Controller {

    public function __construct($templateEngine) {
        try {
            $this->model = null;
            $this->model2 = null;
            $this->templateEngine = $templateEngine;
        } catch (\Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur FooterController : " . $e->getMessage();
            exit();
        }
    }

    public function CGUPage() {
        try {
            echo $this->templateEngine->render('footer/cgu.twig.html');
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page CGU : " . $e->getMessage();
        }
    }

    public function ConfidentialitePage() {
        try {
            echo $this->templateEngine->render('footer/confidentialite.twig.html');
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page Confidentialité : " . $e->getMessage();
        }
    }

    public function CookiesPage() {
        try {
            echo $this->templateEngine->render('footer/cookies.twig.html');
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page Cookies : " . $e->getMessage();
        }
    }

    public function AboutPage() {
        try {
            echo $this->templateEngine->render('footer/about.twig.html');
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page À propos : " . $e->getMessage();
        }
    }
}