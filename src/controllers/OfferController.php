<?php
namespace App\Controllers;
use App\Models\DBoffer;
class OfferController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBoffer();
        $this->model2 = null;
        $this->templateEngine = $templateEngine;
    }

    public function OfferPage() {
        echo $this->templateEngine->render('offer.twig.html',[
            'offers' => $this->model->getOffers()
        ]);
    }

}