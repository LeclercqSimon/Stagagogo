<?php
namespace App\Controllers;

class CGUController extends Controller{

    public function __construct($templateEngine) {
        $this->model = null;
        $this->model2 = null;
        $this->templateEngine = $templateEngine;
    }

    public function CGUPage() {
        echo $this->templateEngine->render('cgu.twig.html');
    }
}