<?php
/**
 * Fichier : crea_annonce.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/Control
 * Description : Contrôleur gérant la création d'une nouvelle annonce et l'upload sécurisé de son image.
 */
session_start();
$titre = "Ajouter un véhicule - LocAuto Admin";
$racine_path = "../../";
$action = "Créer";

$base_url = "/~uapv2503728/Projet_WEB_Loc";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . $base_url . "/accueil");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur de sécurité : Token CSRF invalide.");
    }

    require_once '../../Model/AnnonceModel.php';
    require_once '../../class/Annonce.php';
    $annonceModel = new \model\AnnonceModel();
    
    // --- NOUVEAU TRAITEMENT DE L'IMAGE SÉCURISÉ ---
    $photo_bdd = ''; 

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        
        $extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        
        // Sécurité : On vérifie que c'est bien une image
        $extensions_autorisees = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($extension, $extensions_autorisees)) {
            die("Erreur : Seules les images JPG, PNG et WEBP sont autorisées.");
        }

        $nom_unique = uniqid('auto_') . '.' . $extension;
        
        // Chemin absolu vers le dossier View (racine du projet/View)
        $dossier_destination = realpath(__DIR__ . '/../../View');
        $chemin_complet = $dossier_destination . '/' . $nom_unique;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_complet)) {
            $photo_bdd = $nom_unique;
        } else {
            die("Erreur : Impossible d'écrire dans le dossier View. Vérifiez les permissions CHMOD sur le serveur Pedago.");
        }
    } else {
        die("Erreur : Aucun fichier reçu ou erreur de transmission (Code: " . $_FILES['photo']['error'] . "). L'image est obligatoire.");
    }
    // ----------------------------------------------
    
    $nouvelleAnnonce = new \classes\Annonce([
        'titre' => $_POST['titre'] ?? '',
        'description' => $_POST['description'] ?? '',
        'prix_par_jour' => $_POST['prix'] ?? 0.0,
        'photo' => $photo_bdd, // On utilise le nouveau nom unique
        'agence_nom' => $_POST['agence_nom'] ?? '',
        'agence_tel' => $_POST['agence_tel'] ?? '',
        'agence_email' => $_POST['agence_email'] ?? '',
        'agence_lien' => $_POST['agence_lien'] ?? ''
    ]);
    
    $annonceModel->insert($nouvelleAnnonce);
    
    header("Location: " . $base_url . "/admin/vehicules");
    exit;
}

include '../View/header.php';
include '../View/form_annonce.php';
include '../View/footer.php';
?>