<?php
/**
 * Fichier deconnexion.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Détruit la session active et supprime les cookies de connexion.
 */

session_start();

// On vide toutes les variables de session
session_unset();

// On détruit la session côté serveur
session_destroy();

// On supprime le cookie "Se souvenir de moi" en lui donnant une date d'expiration passée
setcookie('locauto_remember', '', time() - 3600, "/");

// On redirige vers l'accueil public
header("Location: accueil");
exit;
?>