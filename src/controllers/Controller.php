<?php

namespace App\Controllers;

use Twig\Environment;
use App\models\DataBase;

class Controller {
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function HomePage() {
        echo $this->twig->render('home.twig.html');
        //$pdo = new DataBase();
        //$jobOffers = $pdo->getJobOffers();
    }
}