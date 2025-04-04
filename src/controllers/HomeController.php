<?php
namespace App\Controllers;

use App\Models\DBuser;
use App\Models\DBaddress;

class HomeController extends Controller {

    public function __construct($templateEngine) {
        try {
            $this->model = new DBuser();
            $this->model2 = new DBaddress();
            $this->templateEngine = $templateEngine;
        } catch (\Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur HomeController : " . $e->getMessage();
            exit();
        }
    }

    public function HomePage() {
        try {
            session_start();
            $message = isset($_SESSION['message']) ? $_SESSION['message'] : null;
            unset($_SESSION['message']);
            echo $this->templateEngine->render('home.twig.html', ['message' => $message]);
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page d'accueil : " . $e->getMessage();
        }
    }
}