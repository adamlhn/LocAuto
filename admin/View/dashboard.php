<?php
/**
 * Fichier : dashboard.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue principale du panneau d'administration présentant les indicateurs clés (compteurs).
 */
?>
<h1 class="text-3xl font-bold text-slate-800 mb-8"><i class="fa-solid fa-chart-pie text-blue-600 mr-3"></i>Vue d'ensemble</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
    <a href="admin/vehicules" class="bg-white p-10 rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-center items-center hover:shadow-lg hover:border-blue-300 transition group cursor-pointer">
        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition transform duration-300">
            <i class="fa-solid fa-car"></i>
        </div>
        <h2 class="text-slate-500 font-medium mb-2 uppercase tracking-wide text-sm group-hover:text-blue-600 transition">Annonces en ligne</h2>
        <p class="text-6xl font-black text-slate-800"><?php echo $nb_annonces; ?></p>
    </a>

    <a href="admin/utilisateurs" class="bg-white p-10 rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-center items-center hover:shadow-lg hover:border-blue-300 transition group cursor-pointer">
        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition transform duration-300">
            <i class="fa-solid fa-users"></i>
        </div>
        <h2 class="text-slate-500 font-medium mb-2 uppercase tracking-wide text-sm group-hover:text-blue-600 transition">Membres inscrits</h2>
        <p class="text-6xl font-black text-slate-800"><?php echo $nb_membres; ?></p>
    </a>
</div>