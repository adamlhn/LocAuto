<?php
/**
 * Fichier : annonces.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Contrôleur gérant l'affichage détaillé d'un véhicule spécifique.
 */
session_start();
$racine_path = '../'; 
$titre = 'Détail de l\'annonce';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

require_once '../Model/AnnonceModel.php';
require_once '../class/Annonce.php';

$annonceModel = new \model\AnnonceModel();

// Création d'un objet juste pour la recherche (TP2)
$recherche = new \classes\Annonce(['id' => $id]);
$voitureObj = $annonceModel->getById($recherche);

if (!$voitureObj) {
    echo "<div class='text-center py-20 text-2xl font-bold'>Véhicule introuvable.</div>";
    exit;
}

// Extraction des données de l'objet pour la vue
$photo_voiture = 'View/' . $voitureObj->photo;
$titre_voiture = $voitureObj->titre;
$description_voiture = $voitureObj->description;
$prix_voiture = $voitureObj->prix_par_jour;
$agence_nom = $voitureObj->agence_nom;
$agence_tel = $voitureObj->agence_tel;
$agence_email = $voitureObj->agence_email;
$agence_lien = $voitureObj->agence_lien;

include($racine_path . 'View/header.php');
include($racine_path . 'View/fiche_voiture.php');
include($racine_path . 'View/footer.php');
?>