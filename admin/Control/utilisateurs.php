<?php
/**
 * Fichier : utilisateurs.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur gérant l'affichage de tous les membres et permettant leur suppression.
 */
session_start();
$titre = "Gestion des Membres - LocAuto Admin";
$racine_path = "../../";

// URL de base absolue pour des redirections infaillibles
$base_url = "/~uapv2503728/Projet_WEB_Loc";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    // CORRECTION 1 : Redirection absolue vers la connexion
    header("Location: " . $base_url . "/connexion");
    exit;
}

$erreur = null; 
$utilisateurs = []; 

try {
    require_once '../../Model/UtilisateurModel.php';
    require_once '../../class/Membre.php';
    require_once '../../class/Admin.php';
    $utilisateurModel = new \model\UtilisateurModel();

    if (isset($_GET['delete'])) {
        $userToDelete = new \classes\Membre(['id' => (int)$_GET['delete']]);
        $utilisateurModel->delete($userToDelete);
        
        // CORRECTION 2 : Redirection absolue vers la belle URL après suppression
        header("Location: " . $base_url . "/admin/utilisateurs");
        exit;
    }

    $usersObjets = $utilisateurModel->getAll();

    foreach($usersObjets as $userObj) {
        $p = !empty($userObj->prenom) ? substr($userObj->prenom, 0, 1) : '?';
        $n = !empty($userObj->nom) ? substr($userObj->nom, 0, 1) : '?';
        
        $utilisateurs[] = [
            'id' => $userObj->id,
            'nom' => $userObj->nom,
            'prenom' => $userObj->prenom,
            'email' => $userObj->email,
            'role' => (get_class($userObj) === 'classes\Admin') ? 'admin' : 'client',
            'initiales' => strtoupper($p . $n)
        ];
    }

} catch (\Exception $e) {
    $erreur = $e->getMessage();
}

include '../View/header.php';
include '../View/utilisateurs.php';
include '../View/footer.php';
?>