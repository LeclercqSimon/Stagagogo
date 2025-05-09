<?php

namespace App\Controllers;

use App\Models\DBuser;
use App\Models\DBaddress;
use App\Controllers\Controller;

class LogController extends Controller
{

    public function __construct($templateEngine)
    {
        try {
            $this->model = new DBuser();
            $this->model2 = new DBaddress();
            $this->templateEngine = $templateEngine;
        } catch (\Exception $e) {
            echo "Erreur lors de l'initialisation du contrôleur LogController : " . $e->getMessage();
            exit();
        }
    }

    public function LogPage()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
                $this->Login();
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'signup') {
                $this->Signup();
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'disconnect') {
                $this->logout();
            }
        } catch (\Exception $e) {
            echo "Erreur dans LogPage : " . $e->getMessage();
        }
    }

    public function Login()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $mail = isset($_POST['mail']) ? trim($_POST['mail']) : null;
                $pwd = isset($_POST['pwd']) ? trim($_POST['pwd']) : null;

                $user = $this->model->getUser($mail);
                $isValid = $this->model->verif($mail, $pwd);
                if ($isValid) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    foreach ($user as $key => $value) {
                        $_SESSION[$key] = $value;
                    }
                    header('Location: /?uri=/');
                    exit();
                } else {
                    throw new \Exception("Identifiants incorrects.");
                }
            }
        } catch (\Exception $e) {
            echo "Erreur lors de la connexion : " . $e->getMessage();
        }
    }

    public function Signup()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

                // Vérification que les champs obligatoires sont remplis
                if (empty($name) || empty($firstname) || empty($mail) || empty($pwd) || empty($phone)) {
                    throw new \Exception("Tous les champs obligatoires doivent être remplis.");
                }

                // Hashage sécurisé du mot de passe
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                $idAddress = $this->model2->insertAddress($number, $street, $country, $postalcode, $city);
                if (!$idAddress) {
                    throw new \Exception("Erreur lors de l'insertion de l'adresse.");
                }

                // Insertion de l'utilisateur
                $success = $this->model->insertUser($name, $firstname, $mail, $hashedPwd, $phone, 1, $idAddress);

                if (!$success) {
                    throw new \Exception("Erreur lors de l'insertion de l'utilisateur !");
                }

                // Redirection après inscription
                header('Location: /?uri=/');
                exit();
            }
        } catch (\Exception $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }

    public function logout()
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
                session_unset(); // Supprime toutes les variables de session
                session_destroy(); // Détruit la session
                header('Location: /?uri=/'); // Redirige vers la page d'accueil
                exit();
            }
        } catch (\Exception $e) {
            // Gestion des erreurs lors de la déconnexion
            echo "Erreur lors de la déconnexion : " . $e->getMessage();
        }
    }
}
