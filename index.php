<?php
/**
 * Fichier : index.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Root
 * Description : Point d'entrée principal du site (Front-Office). Affiche la page d'accueil.
 */
session_start();
$racine_path = '';
$titre = "Accueil - LocAuto";

include('View/header.php');
include('View/accueil.php');
include('View/footer.php');
?>