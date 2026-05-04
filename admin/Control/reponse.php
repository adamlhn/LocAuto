<?php
/**
 * Fichier : reponse.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur qui traite la requête POST de réponse et déclenche la fonction mail().
 */
session_start();
$titre = "Répondre au message - LocAuto Admin";
$racine_path = "../../";

$base_url = "/~uapv2503728/Projet_WEB_Loc";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . $base_url . "/accueil");
    exit;
}

$destinataire = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$objet_predefini = isset($_GET['objet']) ? htmlspecialchars($_GET['objet']) : '';
$message_statut = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    $message_reponse = $_POST['reponse_contenu'] ?? '';
    
    // Envoi du mail
    $headers = "From: admin@locauto.fr";
    if (mail($destinataire, $objet_predefini, $message_reponse, $headers)) {
        $message_statut = "<div class='mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center font-bold'>Réponse envoyée avec succès à $destinataire !</div>";
    } else {
        $message_statut = "<div class='mb-4 p-4 bg-red-100 text-red-700 rounded-xl text-center font-bold'>Erreur lors de l'envoi de la réponse.</div>";
    }
}

include '../View/header.php';
if ($message_statut) echo "<div class='max-w-2xl mx-auto'>$message_statut</div>";
include '../View/reponse.php';
include '../View/footer.php';
?>