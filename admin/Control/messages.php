<?php
/**
 * Fichier : messages.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur listant tous les messages reçus depuis le Front-Office.
 */
session_start();
$titre = "Boîte de réception - LocAuto Admin";
$racine_path = "../../";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}

require_once '../../Model/MessageModel.php';
require_once '../../class/Message.php';
$messageModel = new \model\MessageModel();

$messagesObjets = $messageModel->getAll();
$messages = [];

foreach($messagesObjets as $mObj) {
    $messages[] = [
        'id' => $mObj->id,
        'nom' => $mObj->nom,
        'email' => $mObj->email,
        'objet' => $mObj->objet,
        'contenu' => $mObj->contenu,
        'lu' => $mObj->lu
    ];
}

include '../View/header.php';
include '../View/messages.php';
include '../View/footer.php';
?>