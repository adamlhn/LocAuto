<?php
/**
 * Fichier : mentions_legales.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Contrôleur gérant l'affichage de la page des mentions légales, de la politique RGPD et des CGV/CGU.
 */
session_start();
$racine_path = '../'; 
$titre = 'Mentions Légales & CGV - LocAuto';

include($racine_path . 'View/header.php');
include($racine_path . 'View/mentions_legales.php');
include($racine_path . 'View/footer.php');
?>