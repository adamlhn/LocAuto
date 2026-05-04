<?php
/**
 * Fichier : annonces.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur listant tous les véhicules et gérant leur suppression.
 */
session_start();
$titre = "Gestion des Véhicules - LocAuto Admin";
$racine_path = "../../";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}

require_once '../../Model/AnnonceModel.php';
require_once '../../class/Annonce.php';
$annonceModel = new \model\AnnonceModel();

if (isset($_GET['delete'])) {
    $annonceASupprimer = new \classes\Annonce(['id' => (int)$_GET['delete']]);
    $annonceModel->delete($annonceASupprimer);
    
    header("Location: vehicules");
    exit;
}

$annoncesObjets = $annonceModel->getAll();
$annonces = [];

// Formatage des objets pour la vue
foreach($annoncesObjets as $auto) {
    $annonces[] = [
        'id' => $auto->id,
        'titre' => $auto->titre,
        'photo' => 'View/' . $auto->photo,
        'prix' => $auto->prix_par_jour
    ];
}

include '../View/header.php';
include '../View/annonces.php';
include '../View/footer.php';
?>