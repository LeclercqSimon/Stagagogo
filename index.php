<?php

require "vendor/autoload.php";

use App\Controllers\HomeController;
use App\Controllers\CGUController;
use App\Controllers\CompaniesController;
use App\Controllers\OfferController;
use App\Controllers\ProfilController;
use App\Controllers\WishlistController;
use App\Controllers\FooterController;

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
    case 'About':
        $controller = new FooterController($twig);
        $controller->AboutPage();
        break;
    case 'Cookies':
        $controller = new FooterController($twig);
        $controller->CookiesPage();
        break;
    case 'Confidentialite':
        $controller = new FooterController($twig);
        $controller->ConfidentialitePage();
        break;
    case 'CGU':
        $controller = new FooterController($twig);
        $controller->CGUPage();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
        return;
        break;
}