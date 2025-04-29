<?php

namespace App\Controllers;

use App\Models\DBuser;
use App\Models\DBaddress;
use App\Models\DBcompany;
use App\Models\DBoffer;

class ProfilController extends Controller
{
    private $userModel;
    private $addressModel;
    private $companyModel;
    private $offerModel;
    protected $templateEngine;

    public function __construct($templateEngine)
    {
        try {
            $this->userModel = new DBuser();
            $this->addressModel = new DBaddress();
            $this->companyModel = new DBcompany();
            $this->offerModel = new DBoffer();
            $this->templateEngine = $templateEngine;
        } catch (\Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur ProfilController : " . $e->getMessage();
            exit();
        }
    }

    private function getUserFromDB($id_user)
    {
        return $this->userModel->getUserById($id_user);
    }

    public function ProfilPage()
    {
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['id_user'])) {
                header('Location: /?uri=Log');
                exit();
            }

            $userData = $this->getUserFromDB($_SESSION['id_user']);

            if (!$userData) {
                throw new \Exception("Utilisateur non trouvé.");
            }

            $userInfo = [
                'name' => $userData['name_user'],
                'firstname' => $userData['firstname_user'],
                'mail' => $userData['mail_user'],
                'phone' => $userData['phone_user'],
                'status' => $userData['status_user'],
                'num_address' => $userData['num_address'],
                'street_address' => $userData['street_address'],
                'postal_address' => $userData['postal_address'],
                'city_address' => $userData['city_address'],
                'country_address' => $userData['country_address'],
            ];

            $users = [];
            if ($userData['status_user'] == 3) {
                $users = $this->userModel->getAllUser();
            }
            
            echo $this->templateEngine->render('profil.twig.html', [
                'user' => $userInfo,
                'users' => $users,
            ]);
        } catch (\Exception $e) {
            echo "Erreur lors de l'affichage de la page Profil : " . $e->getMessage();
        }
    }

    public function getAllUsers()
    {
        try {
            return $this->userModel->getAllUser();
        } catch (\Exception $e) {
            echo "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
            return [];
        }
    }

    public function handleAddOffer()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_offer') {
                // Récupérer les données du formulaire
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

                $offerPublication = date('Y-m-d'); // Date actuelle
                $offerViews = 0;
                $offerCandidates = 0;
                $offerStatus = 'ouvert';

                // Insertion de l'adresse de l'entreprise
                $addressId = $this->addressModel->insertAddress(
                    $companyNumAddress,
                    $companyStreetAddress,
                    $companyCountryAddress,
                    $companyPostalAddress,
                    $companyCityAddress
                );

                if (!$addressId) {
                    throw new \Exception("Échec de l'insertion de l'adresse.");
                }

                // Insertion de l'entreprise
                $companyId = $this->companyModel->insertCompany(
                    $companyName,
                    $companyCity,
                    $companySector,
                    $companyEmail,
                    $companyPhone,
                    $companyDescription,
                    $companySiret,
                    $addressId
                );

                if (!$companyId) {
                    throw new \Exception("Erreur lors de l'ajout de l'entreprise.");
                }

                // Insertion de l'offre
                $offerInserted = $this->offerModel->insertOffer(
                    $offerPublication,
                    $offerTitle,
                    $offerDescription,
                    $offerSalary,
                    $offerStatus,
                    $offerContract,
                    $offerSector,
                    $offerViews,
                    $offerCandidates,
                    $companyId
                );

                if (!$offerInserted) {
                    throw new \Exception("Erreur lors de l'ajout de l'offre.");
                }

                header('Location: /?uri=Profil');
                exit();
            }
        } catch (\Exception $e) {
            echo "Erreur lors de l'ajout de l'offre : " . $e->getMessage();
        }
    }
}
