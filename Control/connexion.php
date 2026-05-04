<?php
/**
 * Fichier : connexion.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Gère l'authentification des MEMBRES uniquement. 
 * Les administrateurs doivent se connecter via l'interface dédiée du Back-Office.
 */
session_start();
$racine_path = '../'; 
$titre = 'Connexion';

// Génération du token CSRF s'il n'existe pas encore
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du jeton CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    require_once '../Model/UtilisateurModel.php';
    require_once '../class/Membre.php';
    require_once '../class/Admin.php';
    
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']); 

    $utilisateurModel = new \model\UtilisateurModel();
    
    // Création d'un objet temporaire pour la recherche
    $userRecherche = new \classes\Membre(['email' => $email]);
    $userObj = $utilisateurModel->getByEmail($userRecherche);

    // 1. On vérifie si l'utilisateur existe et si le mot de passe est bon
    if ($userObj && password_verify($password, $userObj->mot_de_passe)) {
        
        // 2. CONDITION CRUCIALE : On vérifie que ce n'est PAS un Admin
        // Si l'objet retourné est une instance de la classe Admin, on refuse.
        if (get_class($userObj) === 'classes\Admin') {
            $erreur = "Identifiants incorrects ou accès non autorisé ici.";
        } else {
            // C'est bien un Membre (Client), on ouvre la session
            $_SESSION['user_id'] = $userObj->id;
            $_SESSION['user_role'] = 'client';
            $_SESSION['user_nom'] = $userObj->prenom . ' ' . $userObj->nom;

            // Gestion sécurisée du cookie "Se souvenir de moi" (on stocke l'email)
            if ($remember) {
                setcookie('locauto_email', $userObj->email, time() + (86400 * 30), "/"); 
            } else {
                setcookie('locauto_email', '', time() - 3600, "/");
            }

            header("Location: accueil"); 
            exit;
        }
    } else {
        $erreur = "Identifiants incorrects.";
    }
}

include($racine_path . 'View/header.php');

if ($erreur) {
    echo "<div class='max-w-md mx-auto mb-4 p-4 bg-red-100 text-red-700 rounded-xl text-center font-bold'>$erreur</div>";
}

include($racine_path . 'View/form_connexion.php');
include($racine_path . 'View/footer.php');