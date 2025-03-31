<?php
namespace App\Controllers;

class OfferController extends Controller{

    public function __construct($templateEngine) {
        $this->model = null;
        $this->model2 = null;
        $this->templateEngine = $templateEngine;
    }

    public function OfferPage() {
        echo $this->templateEngine->render('offer.twig.html');
    }
}