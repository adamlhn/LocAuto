<?php
/**
 * Fichier : contact.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Contrôleur gérant la réception du message, son enregistrement en BDD et l'envoi d'un mail d'alerte à l'administrateur.
 */
session_start();
$racine_path = '../'; 
$titre = 'Contact';

// Génération du token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$message_statut = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification de sécurité
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    require_once '../Model/MessageModel.php';
    require_once '../class/Message.php';
    $messageModel = new \model\MessageModel();

    // Hydratation de l'objet Message
    $nouveauMessage = new \classes\Message([
        'nom' => $_POST['nom'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'email' => $_POST['email'] ?? '',
        'objet' => $_POST['objet'] ?? '',
        'contenu' => $_POST['message'] ?? ''
    ]);

    // Insertion en base via le Modèle
    if ($messageModel->insert($nouveauMessage)) {
        
        // --- ENVOI DU MAIL ---
        $destinataire = "adam.lhani@alumni.univ-avignon.fr";
        
        $sujet = "Nouveau contact LocAuto : " . $nouveauMessage->objet;
        $corps = "Vous avez reçu un nouveau message sur le site LocAuto.\n\n";
        $corps .= "Expéditeur : {$nouveauMessage->prenom} {$nouveauMessage->nom}\n";
        $corps .= "Email : {$nouveauMessage->email}\n\n";
        $corps .= "Contenu du message :\n{$nouveauMessage->contenu}\n\n";
        $corps .= "Vous pouvez répondre à ce client depuis l'espace Administration.";
        
        $headers = "From: no-reply@locauto-pedago.fr";

        // Exécution de l'envoi
        mail($destinataire, $sujet, $corps, $headers);

        $message_statut = "<div class='max-w-xl mx-auto mb-4 p-4 bg-green-100 text-green-700 rounded-xl text-center font-bold'>Votre message a été envoyé avec succès. Nous vous répondrons très vite.</div>";
    } else {
        $message_statut = "<div class='max-w-xl mx-auto mb-4 p-4 bg-red-100 text-red-700 rounded-xl text-center font-bold'>Erreur lors de l'envoi du message.</div>";
    }
}

include($racine_path . 'View/header.php');
if ($message_statut) echo $message_statut;
include($racine_path . 'View/form_contact.php');
include($racine_path . 'View/footer.php');
?>