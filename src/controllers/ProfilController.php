<?php
namespace App\Controllers;
use App\Models\DBuser;
class ProfilController extends Controller{

    public function __construct($templateEngine) {
        $this->model = new DBuser();
        $this->model2 = null;
        $this->templateEngine = $templateEngine;
    }

public function ProfilPage() {
    session_start();
    $userInfo = [
        'name' => $_SESSION['name_user'] ?? 'Nom inconnu',
        'firstname' => $_SESSION['firstname_user'] ?? 'Prénom inconnu',
        'mail' => $_SESSION['mail_user'] ?? 'Email inconnu',
        'phone' => $_SESSION['phone_user'] ?? 'Téléphone inconnu',
        'status' => $_SESSION['status_user'] ?? 'Statut inconnu',
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
}