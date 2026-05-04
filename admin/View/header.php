<?php
/**
 * Fichier : header.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : En-tête de l'interface d'administration avec navigation par URLs réécrites.
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($titre) ? $titre : "LocAuto Admin"; ?></title>
    <base href="/~uapv2503728/Projet_WEB_Loc/">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col font-sans selection:bg-blue-200 w-full overflow-x-hidden">
    
    <header class="bg-white shadow-sm border-b-2 border-blue-600 sticky top-0 z-50 mb-8 w-full">
        <div class="w-full px-6 md:px-12 lg:px-24 xl:px-32 py-4 flex items-center justify-between">
            
            <a href="admin/dashboard" class="flex items-center gap-3 group" title="Retour au Dashboard">
                <div class="w-10 h-10 bg-slate-800 text-white rounded-xl flex items-center justify-center shadow-lg group-hover:bg-slate-700 transition">
                    <i class="fa-solid fa-car-side"></i>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900">Loc<span class="text-blue-600">Auto</span> 
                <span class="ml-2 text-xs font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded">ADMIN</span></span>
            </a>
            
            <nav class="flex items-center gap-4 md:gap-8 font-medium text-slate-600 text-sm md:text-base flex-wrap justify-end">
                <a href="admin/dashboard" class="hover:text-blue-600 transition">Dashboard</a>
                <a href="admin/vehicules" class="hover:text-blue-600 transition">Véhicules</a>
                <a href="admin/messages" class="hover:text-blue-600 transition">Messages</a>
                <a href="admin/utilisateurs" class="hover:text-blue-600 transition">Utilisateurs</a>
                <a href="admin/sitemap" class="hover:text-blue-600 transition">Sitemap</a>
                <a href="admin/deconnexion" class="text-red-500 hover:text-red-700 transition font-bold">Déconnexion</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow w-full px-6 md:px-12 lg:px-24 xl:px-32">