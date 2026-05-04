<?php
/**
 * Fichier : catalogue.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : Control
 * Description : Contrôleur gérant la récupération et l'affichage de tous les véhicules disponibles.
 */
session_start();
$racine_path = '../'; 
$titre = 'Catalogue';

$voitures = []; 
$erreur_client = null; 

try {
    require_once '../Model/AnnonceModel.php';
    $annonceModel = new \model\AnnonceModel();
    
    // Le modèle retourne un tableau d'objets Annonce
    $voituresObjets = $annonceModel->getAll();

    if ($voituresObjets === false) {
        throw new \Exception("Impossible de charger les véhicules.");
    }
    
    // Formatage pour ta vue d'origine
    foreach($voituresObjets as $vObj) {
        $voitures[] = [
            'id' => $vObj->id,
            'photo' => $vObj->photo,
            'titre' => $vObj->titre,
            'prix_par_jour' => $vObj->prix_par_jour
        ];
    }

} catch (\Exception $e) {
    $erreur_client = "Notre catalogue est momentanément indisponible.";
}

include($racine_path . 'View/header.php');

if ($erreur_client !== null) {
    echo '<div class="max-w-3xl mx-auto my-12 bg-blue-50 border border-blue-100 p-8 rounded-2xl shadow-sm text-center">';
    echo '  <i class="fa-solid fa-car-burst text-5xl text-blue-300 mb-4"></i>';
    echo '  <h2 class="text-2xl font-bold text-slate-800 mb-2">Véhicules indisponibles</h2>';
    echo '  <p class="text-slate-600">' . htmlspecialchars($erreur_client) . '</p>';
    echo '</div>';

} elseif (empty($voitures)) {
    echo '<div class="text-center my-12 text-slate-500">';
    echo '  <p class="text-xl">Aucun véhicule n\'est disponible à la location pour le moment.</p>';
    echo '</div>';

} else {
    echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 xl:gap-8">';
    foreach($voitures as $v) {
        $id_voiture = $v['id'];
        $photo_voiture = 'View/' . $v['photo']; 
        $titre_voiture = $v['titre'];
        $prix_voiture = $v['prix_par_jour'] . ' €';
        
        include($racine_path . 'View/carte_voiture.php');
    }
    echo '</div>';
}

include($racine_path . 'View/footer.php');
?>