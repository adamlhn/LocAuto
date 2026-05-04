<?php
/**
 * Fichier : accueil.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Vue de la page d'accueil présentant les services de LocAuto.
 */
?>
<div class="flex flex-col items-center justify-center space-y-12 py-10">
    <div class="w-full bg-gradient-to-br from-blue-600 to-indigo-800 rounded-3xl p-12 md:p-20 text-center shadow-2xl relative overflow-hidden">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6">
            La route vous appartient
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10">
            Découvrez notre flotte de véhicules haut de gamme pour tous vos déplacements. Simple, rapide et au meilleur prix.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="catalogue" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold shadow-lg hover:bg-slate-50 transition transform hover:-translate-y-1">
                Voir les véhicules
            </a>
            <a href="contact" class="bg-blue-700 text-white border border-blue-500 px-8 py-4 rounded-xl font-bold hover:bg-blue-800 transition">
                Nous contacter
            </a>
        </div>
    </div>
</div>