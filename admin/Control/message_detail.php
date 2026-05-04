<?php
/**
 * Fichier : message_detail.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur gérant la lecture détaillée d'un message et déclenchant le statut "lu".
 */
session_start();
$titre = "Lecture du message - LocAuto Admin";
$racine_path = "../../";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}

$id_message = isset($_GET['id']) ? (int)$_GET['id'] : 0;

require_once '../../Model/MessageModel.php';
require_once '../../class/Message.php';
$messageModel = new \model\MessageModel();

$recherche = new \classes\Message(['id' => $id_message]);
$messageObj = $messageModel->getById($recherche);

if (!$messageObj) {
    header("Location: messages.php");
    exit;
}

if (!$messageObj->lu) {
    $messageModel->markAsRead($messageObj);
}

$message_courant = [
    'email' => $messageObj->email,
    'objet' => $messageObj->objet,
    'nom' => $messageObj->nom,
    'contenu' => $messageObj->contenu,
    'date' => date('d/m/Y à H:i', strtotime($messageObj->date_envoi))
];

include '../View/header.php';
include '../View/message_detail.php';
include '../View/footer.php';
?>