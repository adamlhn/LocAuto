<?php
/**
 * Fichier : modif_annonce.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 */
session_start();
$titre = "Modifier l'annonce - LocAuto Admin";
$racine_path = "../../";

// L'URL de base absolue pour éviter les bugs de redirection
$base_url = "/~uapv2503728/Projet_WEB_Loc";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . $base_url . "/connexion");
    exit;
}

$id_vehicule = isset($_GET['id']) ? (int)$_GET['id'] : null;
$erreur = null; 

require_once '../../Model/AnnonceModel.php';
$annonceModel = new \model\AnnonceModel();
$rechercheAnnonce = new \classes\Annonce(['id' => $id_vehicule]);

try {
    $annonce_a_modifier_obj = $annonceModel->getById($rechercheAnnonce);
    if (!$annonce_a_modifier_obj) {
        throw new \Exception("Le véhicule demandé n'existe pas.");
    }
} catch (\Exception $e) {
    header("Location: " . $base_url . "/admin/vehicules");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            throw new \Exception("Erreur de sécurité : Token CSRF invalide.");
        }

        $photo = $annonce_a_modifier_obj->photo; 
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $photo = basename($_FILES['photo']['name']);
            move_uploaded_file($_FILES['photo']['tmp_name'], '../../View/' . $photo);
        }
        
        $annonceMaj = new \classes\Annonce([
            'id' => $id_vehicule,
            'titre' => !empty($_POST['titre']) ? $_POST['titre'] : $annonce_a_modifier_obj->titre,
            'description' => !empty($_POST['description']) ? $_POST['description'] : $annonce_a_modifier_obj->description,
            'prix_par_jour' => !empty($_POST['prix']) ? (float)$_POST['prix'] : $annonce_a_modifier_obj->prix_par_jour,
            'photo' => $photo
        ]);
        
        $annonceModel->update($annonceMaj);
        
        header("Location: " . $base_url . "/admin/vehicules");
        exit;

    } catch (\Exception $e) {
        $erreur = $e->getMessage();
    }
}

$annonce_a_modifier = [
    'titre' => $annonce_a_modifier_obj->titre,
    'description' => $annonce_a_modifier_obj->description,
    'prix_par_jour' => $annonce_a_modifier_obj->prix_par_jour,
    'photo_url' => $racine_path . 'View/' . $annonce_a_modifier_obj->photo
];

include '../View/header.php';
include '../View/modif_annonce.php';
include '../View/footer.php';
?>