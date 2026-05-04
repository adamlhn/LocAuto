<?php
/**
 * Fichier : faq.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur gérant l'affichage de la Foire Aux Questions dans le back-office.
 */
session_start();
$titre = "Gestion de la FAQ - LocAuto Admin";
$racine_path = "../../";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}

require_once '../../Model/FAQModel.php';
require_once '../../class/FAQ.php';
$faqModel = new \model\FaqModel();

$faqsObjets = $faqModel->getAll();
$faqs = [];

foreach($faqsObjets as $faqObj) {
    $faqs[] = [
        'question' => $faqObj->question,
        'reponse' => $faqObj->reponse
    ];
}

include '../View/header.php';
include '../View/faq.php';
include '../View/footer.php';
?>