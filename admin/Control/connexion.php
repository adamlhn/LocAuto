<?php
/**
 * Fichier : connexion.php (ADMIN)
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Gère l'authentification des ADMINISTRATEURS uniquement.
 */
session_start();

// On remonte de deux dossiers (admin/Control -> admin -> racine) pour inclure les classes
require_once '../../Model/UtilisateurModel.php';
require_once '../../class/Membre.php';
require_once '../../class/Admin.php';

$titre = 'Connexion Administration';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    // AJOUT : On vérifie si la case "Se souvenir de moi" est cochée
    $remember = isset($_POST['remember']); 

    $utilisateurModel = new \model\UtilisateurModel();
    $userRecherche = new \classes\Membre(['email' => $email]);
    $userObj = $utilisateurModel->getByEmail($userRecherche);

    if ($userObj && password_verify($password, $userObj->mot_de_passe)) {
        
        // CONDITION : Si c'est un Membre classique, on lui refuse l'accès au Back-Office
        if (get_class($userObj) === 'classes\Membre') {
            $erreur = "Accès refusé : Vous n'avez pas les droits d'administration.";
        } else {
            // C'est bien un Admin !
            $_SESSION['user_id'] = $userObj->id;
            $_SESSION['user_role'] = 'admin';
            $_SESSION['user_nom'] = $userObj->prenom . ' ' . $userObj->nom;

            // AJOUT : Gestion du cookie spécifique à l'admin
            if ($remember) {
                setcookie('locauto_admin_email', $userObj->email, time() + (86400 * 30), "/"); 
            } else {
                setcookie('locauto_admin_email', '', time() - 3600, "/");
            }

            // REDIRECTION : On l'envoie vers le dashboard admin et non l'accueil
            header("Location: dashboard"); 
            exit;
        }
    } else {
        $erreur = "Identifiants incorrects.";
    }
}

// Inclusion du header public (ou d'un header admin si tu en as un)
include('../../View/header.php');

if ($erreur) {
    echo "<div class='max-w-md mx-auto mt-8 mb-4 p-4 bg-red-100 text-red-700 rounded-xl text-center font-bold'>$erreur</div>";
}

include('../View/form_connexion.php');

include('../../View/footer.php');