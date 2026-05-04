<?php
/**
 * Fichier : inscription.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Contrôleur gérant la vérification des données d'inscription, la sécurité CSRF et l'insertion du membre en base de données.
 */
session_start();
$racine_path = '../'; 
$titre = 'Inscription';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    require_once '../Model/UtilisateurModel.php';
    require_once '../class/Membre.php';
    
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if ($password === $password_confirm) {
        $utilisateurModel = new \model\UtilisateurModel();
        
        $userRecherche = new \classes\Membre(['email' => $_POST['email'] ?? '']);
        $existe = $utilisateurModel->getByEmail($userRecherche);
        
        if (!$existe) {
            $nouvelUtilisateur = new \classes\Membre([
                'nom' => $_POST['nom'] ?? '',
                'prenom' => $_POST['prenom'] ?? '',
                'email' => $_POST['email'] ?? '',
                'mot_de_passe' => $password
            ]);
            
            $utilisateurModel->insert($nouvelUtilisateur);
            header('Location: connexion');
            exit;
        } else {
            $erreur = "Cet email est déjà utilisé.";
        }
    } else {
        $erreur = "Les mots de passe ne correspondent pas.";
    }
}

include($racine_path . 'View/header.php');
if ($erreur) {
    echo "<div class='max-w-md mx-auto mb-4 p-4 bg-red-100 text-red-700 rounded-xl text-center font-bold'>$erreur</div>";
}
include($racine_path . 'View/form_inscription.php');
include($racine_path . 'View/footer.php');
?>