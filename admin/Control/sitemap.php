<?php
/**
 * Fichier : sitemap.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur gérant l'affichage du plan du site (Sitemap HTML) pour l'administrateur.
 */
session_start();
$titre = "Plan du site - LocAuto Admin";

$base_url = "/~uapv2503728/Projet_WEB_Loc";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . $base_url . "/accueil");
    exit;
}

include '../View/header.php';
include '../View/sitemap.php';
include '../View/footer.php';
?>