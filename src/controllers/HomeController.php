<?php
namespace App\Controllers;
use App\Models\DBuser;
use App\Models\DBaddress;
class HomeController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBuser();
        $this->model2 = new DBaddress();
        $this->templateEngine = $templateEngine;
    }

    public function HomePage() {
        echo $this->templateEngine->render('home.twig.html');
    }
    public function Login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs des inputs
            $mail = isset($_POST['mail']) ? trim($_POST['mail']) : null;
            $pwd = isset($_POST['pwd']) ? trim($_POST['pwd']) : null;       
            $this->model->verif($mail, $pwd);
        }
    }
    public function Signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs des inputs
            $name = isset($_POST['name']) ? trim($_POST['name']) : null;
            $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
            $mail = isset($_POST['mail']) ? trim($_POST['mail']) : null;
            $pwd = isset($_POST['pwd']) ? trim($_POST['pwd']) : null;
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
            $country = isset($_POST['country']) ? trim($_POST['country']) : null;
            $city = isset($_POST['city']) ? trim($_POST['city']) : null;
            $postalcode = isset($_POST['postal']) ? trim($_POST['postal']) : null;
            $number = isset($_POST['num']) ? trim($_POST['num']) : null;
            $street = isset($_POST['street']) ? trim($_POST['street']) : null;
            // Appeler la méthode d'insertion
            $this->model2->insertAddress($number,$street,$country,$postalcode,$city);
            $id_address = $this->model2->lastAdress();
            $this->model->insertUser($name, $firstname, $mail, $pwd, $phone,1,$id_address);

        }
    }
}