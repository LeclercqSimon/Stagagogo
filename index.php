<?php

require "vendor/autoload.php";

use App\Controllers\HomeController;
use App\Controllers\CGUController;
use App\Controllers\CompaniesController;
use App\Controllers\OfferController;
use App\Controllers\ProfilController;
use App\Controllers\WishlistController;

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true
]);

if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];
} else {
    $uri = '/';
}


switch ($uri) {
    case '/':
        $controller = new HomeController($twig);
        $controller->HomePage();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
            $controller->Login();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'signup') {
            $controller->Signup();
        }
        break;
    case 'CGU':
        $controller = new CGUController($twig);
        $controller->CGUPage();
        break;
    case 'Companies':
        $controller = new CompaniesController($twig);
        $controller->CompaniesPage();
        break;
    case 'Profil':
        $controller = new ProfilController($twig);
        $controller->ProfilPage();
        break;
    case 'Offer':
        $controller = new OfferController($twig);
        $controller->OfferPage();
        break;
    case 'Wishlist':
        $controller = new WishlistController($twig);
        $controller->WishlistPage();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
        return;
        break;
}