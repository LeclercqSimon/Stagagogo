<?php
namespace App\Controllers;
use App\Models\DBoffer;
use App\Models\DBcompany;
class OfferController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBoffer();
        $this->templateEngine = $templateEngine;
    }

    public function OfferPage() {
        echo $this->templateEngine->render('offer.twig.html',[
            'offers' => $this->model->companiesOffers()
        ]);
    }
    public function Offerpost($id_offer) {
        $candidates = $this->model->candidatesOffer($id_offer);
        $nb_post = $nb_post = isset($candidates['candidates_offer']) ? $candidates['candidates_offer'] : 0;
        $nb_post++;
        return $this->model->updateCandidates($id_offer, $nb_post);
    }
}