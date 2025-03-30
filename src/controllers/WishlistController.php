<?php
namespace App\Controllers;

class WishlistController extends Controller{

    public function __construct($templateEngine) {
        $this->model = null;
        $this->model2 = null;
        $this->templateEngine = $templateEngine;
    }

    public function WishlistPage() {
        echo $this->templateEngine->render('wishlist.twig.html');
    }
}