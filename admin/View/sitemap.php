<?php
/**
 * Fichier : sitemap.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue affichant l'arborescence complète du site.
 */
?>
<h1 class="text-3xl font-bold text-slate-800 mb-8"><i class="fa-solid fa-sitemap text-blue-600 mr-3"></i>Plan du site (Sitemap HTML)</h1>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden max-w-4xl mx-auto p-8">
    <ul class="space-y-4 text-lg text-slate-700">
        <li><i class="fa-solid fa-globe text-blue-500 mr-2"></i> <strong>Front-Office (Site Public)</strong>
            <ul class="pl-8 mt-2 space-y-2 border-l-2 border-slate-100 text-base">
                <li><a href="accueil" class="hover:text-blue-600 transition">- Accueil</a></li>
                <li><a href="catalogue" class="hover:text-blue-600 transition">- Catalogue des véhicules</a></li>
                <li><a href="contact" class="hover:text-blue-600 transition">- Contact</a></li>
                <li><a href="connexion" class="hover:text-blue-600 transition">- Connexion / Inscription</a></li>
                <li><a href="mentions-legales" class="hover:text-blue-600 transition">- Mentions Légales & CGV</a></li>
            </ul>
        </li>
        <li class="mt-6"><i class="fa-solid fa-lock text-slate-800 mr-2"></i> <strong>Back-Office (Administration)</strong>
            <ul class="pl-8 mt-2 space-y-2 border-l-2 border-slate-100 text-base">
                <li><a href="admin/dashboard" class="hover:text-blue-600 transition">- Dashboard</a></li>
                <li><a href="admin/vehicules" class="hover:text-blue-600 transition">- Gestion des véhicules</a></li>
                <li><a href="admin/messages" class="hover:text-blue-600 transition">- Boîte de réception</a></li>
                <li><a href="admin/utilisateurs" class="hover:text-blue-600 transition">- Gestion des membres</a></li>
                <li><a href="admin/faq" class="hover:text-blue-600 transition">- FAQ</a></li>
            </ul>
        </li>
    </ul>
</div>