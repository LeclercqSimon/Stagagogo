<?php
namespace App\Controllers;

use App\Models\DBoffer;
use App\Models\DBcompany;

class OfferController extends Controller {

    public function __construct($templateEngine) {
        try {
            $this->model = new DBoffer();
            $this->model2 = null;
            $this->templateEngine = $templateEngine;
        } catch (\Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur OfferController : " . $e->getMessage();
            exit();
        }
    }

    public function OfferPage() {
        try {
            echo $this->templateEngine->render('offer.twig.html', [
                'offers' => $this->model->companiesOffers()
            ]);
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page des offres : " . $e->getMessage();
        }
    }

    public function Offerpost($id_offer) {
        try {
            $candidates = $this->model->candidatesOffer($id_offer);
            $nb_post = isset($candidates['candidates_offer']) ? $candidates['candidates_offer'] : 0;
            $nb_post++;
            return $this->model->updateCandidates($id_offer, $nb_post);
        } catch (\Exception $e) {
            echo "Erreur lors de la mise à jour des candidats : " . $e->getMessage();
        }
    }

    public function uploadfile() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['cv'])) {
                $uploadDir = __DIR__ . '/../../upload/'; // Chemin vers le dossier /upload
                $fileName = basename($_FILES['cv']['name']); // Nom du fichier
                $uploadFile = $uploadDir . $fileName; // Chemin complet du fichier

                // Vérifiez si le dossier /upload existe, sinon créez-le
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Déplacez le fichier uploadé
                if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadFile)) {
                    echo "Le fichier a été uploadé avec succès.";
                } else {
                    throw new \Exception("Erreur lors de l'upload du fichier.");
                }
            } else {
                throw new \Exception("Aucun fichier n'a été uploadé.");
            }
        } catch (\Exception $e) {
            echo "Erreur lors de l'upload du fichier : " . $e->getMessage();
        }
    }
}