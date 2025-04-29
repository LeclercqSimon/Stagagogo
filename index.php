<?php

require "vendor/autoload.php";

use App\Controllers\HomeController;
use App\Controllers\CompaniesController;
use App\Controllers\OfferController;
use App\Controllers\ProfilController;
use App\Controllers\WishlistController;
use App\Controllers\FooterController;
use App\Controllers\LogController;

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true
]);

if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];
} else {
    $uri = '/';
}

error_log("Requested URI: " . $_SERVER['REQUEST_URI']); // Log l'URL demandée

if ($_SERVER['REQUEST_METHOD'] === 'POST' && preg_match('#^/wishlist/add/(\d+)$#', $_SERVER['REQUEST_URI'], $matches)) {
    $controller = new WishlistController($twig);
    $controller->addToWishlist();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && preg_match('#^/wishlist/remove/(\d+)$#', $_SERVER['REQUEST_URI'], $matches)) {
    $controller = new WishlistController($twig);
    $controller->removeFromWishlist();
    exit();
}



try {
    switch ($uri) {
        case '/':
            try {
                $controller = new HomeController($twig);
                $controller->HomePage();
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage de la page d'accueil : " . $e->getMessage();
            }
            break;

        case 'Companies':
            try {
                $controller = new CompaniesController($twig);
                $controller->CompaniesPage();
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage de la page des entreprises : " . $e->getMessage();
            }
            break;

        case 'Profil':
            try {
                $controller = new ProfilController($twig);
                $controller->handleAddOffer();
                $controller->ProfilPage();
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage ou de la gestion de la page Profil : " . $e->getMessage();
            }
            break;

        case 'Offer':
            try {
                $controller = new OfferController($twig);
                $controller->OfferPage();
                if (isset($_GET['cv'])) {
                    $id_offer = $_GET['cv'];
                    $controller->uploadfile();
                }
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage ou de la gestion de la page des offres : " . $e->getMessage();
            }
            break;

            case 'Wishlist':
                try {
                    $controller = new WishlistController($twig);
                    $controller->WishlistPage();
                } catch (\Exception $e) {
                    echo "Erreur lors de l'affichage de la page Wishlist : " . $e->getMessage();
                }
                break;

        case 'About':
            try {
                $controller = new FooterController($twig);
                $controller->AboutPage();
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage de la page À propos : " . $e->getMessage();
            }
            break;

        case 'Cookies':
            try {
                $controller = new FooterController($twig);
                $controller->CookiesPage();
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage de la page Cookies : " . $e->getMessage();
            }
            break;

        case 'Confidentialite':
            try {
                $controller = new FooterController($twig);
                $controller->ConfidentialitePage();
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage de la page Confidentialité : " . $e->getMessage();
            }
            break;

        case 'CGU':
            try {
                $controller = new FooterController($twig);
                $controller->CGUPage();
            } catch (\Exception $e) {
                echo "Erreur lors de l'affichage de la page CGU : " . $e->getMessage();
            }
            break;

        case 'Log':
            try {
                $controller = new LogController($twig);
                $controller->LogPage();
            } catch (\Exception $e) {
                echo "Erreur lors de la gestion de la page Log : " . $e->getMessage();
            }
            break;

        default:
            header("HTTP/1.0 404 Not Found");
            echo '404 Not Found';
            break;
    }
} catch (\Exception $e) {
    echo "Une erreur inattendue est survenue : " . $e->getMessage();
}
