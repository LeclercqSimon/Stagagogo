<?php
namespace App\Controllers;
use App\Models\DBuser;
use App\Models\DBaddress;
use App\Models\DBcompany;
class ProfilController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBuser();
        $this->templateEngine = $templateEngine;
        $this->model2 = new DBaddress();
        $this->model3 = new DBcompany();
    }

public function ProfilPage() {
    session_start();
    $userInfo = [
        'name' => $_SESSION['name_user'] ?? 'Nom inconnu',
        'firstname' => $_SESSION['firstname_user'] ?? 'Prénom inconnu',
        'mail' => $_SESSION['mail_user'] ?? 'Email inconnu',
        'phone' => $_SESSION['phone_user'] ?? 'Téléphone inconnu',
        'status' => $_SESSION['status_user'] ?? 'Statut inconnu',
        'num_address' => $_SESSION['num_address'] ?? 'Numéro d\'adresse inconnu',
        'street_address' => $_SESSION['street_address'] ?? 'Rue inconnue',
        'postal_address' => $_SESSION['postal_address'] ?? 'Code postal inconnu',
        'city_address' => $_SESSION['city_address'] ?? 'Ville inconnue',
        'country_address' => $_SESSION['country_address'] ?? 'Pays inconnu'
    ];
    // Récupère tous les utilisateurs si l'utilisateur est administrateur
    $users = [];
    if ($userInfo['status'] == '3') { // Vérifie si l'utilisateur est administrateur
        $users = $this->getAllUser(); 
    }
    echo $this->templateEngine->render('profil.twig.html', [
        'user' => $userInfo,
        'users' => $users,
    ]);
}

public function getAllUser() {
    $user = $this->model->getAllUser();
    return $user;
}

public function handleAddOffer() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_offer') {
        // Récupère les données du formulaire
        $companyName = $_POST['company_name'] ?? null;
        $companyCity = $_POST['company_city'] ?? null;
        $companySector = $_POST['company_sector'] ?? null;
        $companyEmail = $_POST['company_email'] ?? null;
        $companyPhone = $_POST['company_phone'] ?? null;
        $companySiret = $_POST['company_siret'] ?? null;
        $companyDescription = $_POST['company_description'] ?? null;

        $companyNumAddress = $_POST['company_num_address'] ?? null;
        $companyStreetAddress = $_POST['company_street_address'] ?? null;
        $companyPostalAddress = $_POST['company_postal_address'] ?? null;
        $companyCountryAddress = $_POST['company_country_address'] ?? null;
        $companyCityAddress = $_POST['company_city'] ?? null;
        
        $offerTitle = $_POST['offer_title'] ?? null;
        $offerDescription = $_POST['offer_description'] ?? null;
        $offerSalary = $_POST['offer_salary'] ?? null;
        $offerContract = $_POST['offer_contract'] ?? null;
        $offerSector = $_POST['offer_sector'] ?? null;
        $offerDate = date('Y-m-d'); // Date actuelle
        $offerViews =0;
        $offerStatus = "ouvert"; 
        $offerCandidates = 0;

        // Insère les informations de l'entreprise
        $addressId= $this->model2->insertAddress($companyNumAddress, $companyStreetAddress, $companyCountryAddress, $companyPostalAddress, $companyCityAddress);
        $companyId = $this->model3->insertCompany($companyName, $companyCity, $companySector, $companyEmail, $companyPhone, $companyDescription, $companySiret, $this->model2->lastadress());

        // Insère les informations de l'offre
        if ($companyId) {
            $this->model->insertOffer($offerTitle, $offerDescription, $offerSalary, $offerContract, $offerSector, $companyId , $offerDate, $offerViews, $offerStatus, $offerCandidates);
            echo "Offre ajoutée avec succès.";
            header('Location: /?uri=Profil');
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'entreprise.";
        }
    }
}
}