<?php
/**
 * Fichier : modification.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur gérant la modification du profil personnel de l'administrateur connecté.
 */
session_start();
$titre = "Modifier mon profil Admin - LocAuto";
$racine_path = "../../"; // On remonte de admin/Control/ vers la racine

// 1. Sécurité : Vérifier que c'est bien un administrateur connecté
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}

require_once '../../Model/UtilisateurModel.php';
require_once '../../class/Admin.php';

$utilisateurModel = new \model\UtilisateurModel();
$adminRecherche = new \classes\Admin(['id' => $_SESSION['user_id']]);
$userObj = $utilisateurModel->getById($adminRecherche);

if (!$userObj) {
    header("Location: ../../Control/deconnexion.php");
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 2. Vérification CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    $password_new = $_POST['password_new'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if ($password_new !== '' && $password_new !== $password_confirm) {
        $message = "<div class='mb-4 p-4 bg-red-100 text-red-700 rounded-xl text-center font-bold'>Les mots de passe ne correspondent pas.</div>";
    } else {
        // 3. Hydratation de l'objet Admin pour la mise à jour
        $adminMaj = new \classes\Admin([
            'id' => $userObj->id,
            'nom' => $_POST['nom'] ?? $userObj->nom,
            'prenom' => $_POST['prenom'] ?? $userObj->prenom,
            'email' => $_POST['email'] ?? $userObj->email,
            'mot_de_passe' => $password_new
        ]);
        
        $utilisateurModel->update($adminMaj);
        
        $_SESSION['user_nom'] = $adminMaj->prenom . ' ' . $adminMaj->nom;
        $userObj = $utilisateurModel->getById($adminRecherche); 
        
        $message = "<div class='mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center font-bold'>Profil administrateur mis à jour avec succès.</div>";
    }
}

// Formatage pour la vue
$user = [
    'id' => $userObj->id,
    'nom' => $userObj->nom,
    'prenom' => $userObj->prenom,
    'email' => $userObj->email
];

include '../View/header.php';

if ($message) {
    echo "<div class='max-w-2xl mx-auto mt-8'>$message</div>";
}


include '../View/form_modification.php'; 

include '../View/footer.php';
?>