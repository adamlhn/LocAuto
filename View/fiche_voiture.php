<?php
/**
 * Fichier : fiche_voiture.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Vue détaillée d'un véhicule avec coordonnées de l'agence.
 */
?>
<div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row">
    <div class="md:w-1/2 h-64 md:h-auto bg-slate-0">
        <img src="<?php echo $photo_voiture; ?>" alt="<?php echo htmlspecialchars($titre_voiture); ?>" class="w-full h-full object-contain">
    </div>
    <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
        
        <a href="catalogue" class="inline-flex items-center text-slate-400 hover:text-blue-600 font-medium mb-4 transition text-sm">
            <i class="fa-solid fa-arrow-left mr-2"></i> Retour au catalogue
        </a>

        <div class="uppercase tracking-wider text-sm font-semibold text-blue-600 mb-2">Disponible immédiatement</div>
        <h1 class="text-3xl font-extrabold text-slate-900 mb-4"><?php echo htmlspecialchars($titre_voiture); ?></h1>
        <p class="text-slate-600 leading-relaxed mb-8">
            <?php echo htmlspecialchars($description_voiture); ?>
        </p>
        <div class="bg-slate-50 rounded-xl p-4 mb-8 flex justify-between items-center border border-slate-100">
            <span class="text-slate-500">Tarif journalier</span>
            <span class="text-2xl font-bold text-slate-900"><?php echo $prix_voiture; ?> €</span>
        </div>
        
        <button id="btn-reserver" class="w-full bg-blue-600 text-white py-4 rounded-xl text-center font-bold shadow-md hover:bg-blue-700 hover:shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center gap-3">
            <i class="fa-solid fa-calendar-check text-xl"></i> Réserver ce véhicule
        </button>

        <div id="bloc-agence" class="hidden mt-6 bg-blue-50/50 border border-blue-100 rounded-2xl p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2 border-b border-blue-200 pb-3">
                <i class="fa-solid fa-building text-blue-600"></i> Agence : <?php echo htmlspecialchars($agence_nom); ?>
            </h3>
            
            <ul class="space-y-4 text-slate-700">
                <li class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-slate-200 text-blue-600 flex items-center justify-center"><i class="fa-solid fa-phone"></i></div>
                    <a href="tel:<?php echo str_replace(' ', '', $agence_tel); ?>" class="hover:text-blue-600 font-bold transition text-lg"><?php echo htmlspecialchars($agence_tel); ?></a>
                </li>
                <li class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-slate-200 text-blue-600 flex items-center justify-center"><i class="fa-solid fa-envelope"></i></div>
                    <a href="mailto:<?php echo htmlspecialchars($agence_email); ?>" class="hover:text-blue-600 font-medium transition"><?php echo htmlspecialchars($agence_email); ?></a>
                </li>
                <li class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-blue-600 shadow-sm text-white flex items-center justify-center"><i class="fa-solid fa-globe"></i></div>
                    <a href="<?php echo htmlspecialchars($agence_lien); ?>" target="_blank" class="hover:text-blue-800 font-bold transition text-blue-600 flex items-center">
                        Accéder au site web <i class="fa-solid fa-arrow-up-right-from-square text-sm ml-2"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>