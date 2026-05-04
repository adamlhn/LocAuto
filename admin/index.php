<?php
/**
 * Fichier : index.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin
 * Description : Point d'entrée du Back-Office. Affiche les statistiques globales.
 */
session_start();
$titre = "Dashboard - LocAuto Admin";
$racine_path = "../";

// Sécurisation stricte de l'accès au Back-Office
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: connexion");
    exit;
}

require_once '../Model/AnnonceModel.php';
require_once '../Model/UtilisateurModel.php';

$annonceModel = new \model\AnnonceModel();
$utilisateurModel = new \model\UtilisateurModel();

$nb_annonces = $annonceModel->countAll();
$nb_membres = $utilisateurModel->countAll();

include 'View/header.php';
include 'View/dashboard.php';
include 'View/footer.php';
?>