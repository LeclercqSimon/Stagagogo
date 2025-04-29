<?php

namespace App\Controllers;

use App\Models\DBwishlist;

class WishlistController extends Controller
{

    public function __construct($templateEngine)
    {
        try {
            $this->model = new DBwishlist();
            $this->model2 = null;
            $this->templateEngine = $templateEngine;
        } catch (\Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur WishlistController : " . $e->getMessage();
            exit();
        }
    }

    public function WishlistPage()
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $userId = $_SESSION['id_user'] ?? null;

            if (!$userId) {
                echo "Utilisateur non connecté.";
                return;
            }

            $wishlist = $this->model->getOffers($userId);

            echo $this->templateEngine->render('wishlist.twig.html', [
                'wishlist' => $wishlist,
            ]);
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page Wishlist : " . $e->getMessage();
        }
    }


    public function addToWishlist()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['id_user'] ?? null;
        if (!$id_user) {
            echo json_encode(['error' => 'User not logged in']);
            return;
        }

        if (preg_match('#^/wishlist/add/(\d+)$#', $_SERVER['REQUEST_URI'], $matches)) {
            $id_offer = intval($matches[1]);
        } else {
            echo json_encode(['error' => 'Offer ID not found']);
            return;
        }
        $this->model->addOffer($id_user, $id_offer);

        echo json_encode(['success' => 'Added to wishlist']);
    }

    public function removeFromWishlist()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id_user = $_SESSION['id_user'] ?? null;
        if (!$id_user) {
            echo json_encode(['error' => 'User not logged in']);
            return;
        }

        if (preg_match('#^/wishlist/remove/(\d+)$#', $_SERVER['REQUEST_URI'], $matches)) {
            $id_offer = intval($matches[1]);
        } else {
            echo json_encode(['error' => 'Offer ID not found']);
            return;
        }

        $result = $this->model->removeOffer($id_user, $id_offer);

        if ($result) {
            echo json_encode(['success' => 'Offre supprimée de la wishlist']);
        } else {
            echo json_encode(['error' => 'Échec de la suppression']);
        }
    }
}
