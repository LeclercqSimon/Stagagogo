<?php
namespace App\Controllers;

use App\Models\DBwishlist;

class WishlistController extends Controller {

    public function __construct($templateEngine) {
        try {
            $this->model = new DBwishlist();
            $this->model2 = null;
            $this->templateEngine = $templateEngine;
        } catch (\Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur WishlistController : " . $e->getMessage();
            exit();
        }
    }

    public function WishlistPage() {
        try {
            session_start();
            $userId = $_SESSION['id_user'] ?? null;

            if ($userId) {
                $wishlist = $this->model->getOffers($userId);
            } else {
                $wishlist = [];
            }

            echo $this->templateEngine->render('wishlist.twig.html', [
                'wishlist' => $wishlist,
            ]);
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page Wishlist : " . $e->getMessage();
        }
    }
}