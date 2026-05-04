<?php
/**
 * Fichier : modification.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Contrôleur gérant la mise à jour et la suppression des données du membre connecté via session.
 */
session_start();
$racine_path = '../'; 
$titre = 'Modifier mon profil';

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

require_once '../Model/UtilisateurModel.php';
require_once '../class/Membre.php';

$utilisateurModel = new \model\UtilisateurModel();
$userRecherche = new \classes\Membre(['id' => $_SESSION['user_id']]);
$userObj = $utilisateurModel->getById($userRecherche);

if (!$userObj) {
    header("Location: deconnexion");
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    if (isset($_POST['delete_account'])) {
        $utilisateurModel->delete($userObj);
        header("Location: deconnexion");
        exit;
    }

    $password_new = $_POST['password_new'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if ($password_new !== '' && $password_new !== $password_confirm) {
        $message = "<div class='mb-4 p-4 bg-red-100 text-red-700 rounded-xl text-center font-bold'>Les mots de passe ne correspondent pas.</div>";
    } else {
        $userMaj = new \classes\Membre([
            'id' => $userObj->id,
            'nom' => $_POST['nom'] ?? $userObj->nom,
            'prenom' => $_POST['prenom'] ?? $userObj->prenom,
            'email' => $_POST['email'] ?? $userObj->email,
            'mot_de_passe' => $password_new
        ]);
        
        $utilisateurModel->update($userMaj);
        $_SESSION['user_nom'] = $userMaj->prenom . ' ' . $userMaj->nom;
        $userObj = $utilisateurModel->getById($userRecherche); 
        
        $message = "<div class='mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center font-bold'>Profil mis à jour avec succès.</div>";
    }
}

$user = [
    'id' => $userObj->id,
    'nom' => $userObj->nom,
    'prenom' => $userObj->prenom,
    'email' => $userObj->email
];

include($racine_path . 'View/header.php');
if ($message) echo "<div class='max-w-2xl mx-auto'>$message</div>";
include($racine_path . 'View/form_modification.php');
include($racine_path . 'View/footer.php');
?>