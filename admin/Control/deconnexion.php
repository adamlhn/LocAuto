<?php
/**
 * Fichier : deconnexion.php (ADMIN)
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Détruit la session de l'administrateur et le redirige vers la page de connexion sécurisée.
 */
session_start();

// On vide toutes les variables de session
$_SESSION = array();

// On détruit complètement la session côté serveur
session_destroy();

// Grâce au .htaccess et à la balise <base>, on redirige vers l'URL "admin/connexion"
header("Location: connexion");
exit;