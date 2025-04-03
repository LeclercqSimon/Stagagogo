<?php
namespace App\Controllers;
use App\Models\DBuser;
use App\Models\DBaddress;
class HomeController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBuser();
        $this->model2 = new DBaddress();
        $this->templateEngine = $templateEngine;
    }

    public function HomePage() {
        session_start();
        $message = isset($_SESSION['message']) ? $_SESSION['message'] : null;
        unset($_SESSION['message']);
        echo $this->templateEngine->render('home.twig.html',['message' => $message]);
    }
}