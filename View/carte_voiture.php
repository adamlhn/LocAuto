<?php
/**
 * Fichier : carte_voiture.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Composant d'affichage d'une vignette de véhicule dans le catalogue.
 */
?>
<a href="annonce/<?php echo $id_voiture; ?>" class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
    <div class="relative h-48 bg-slate-200 overflow-hidden">
        <img src="<?php echo $photo_voiture; ?>" alt="<?php echo htmlspecialchars($titre_voiture); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
    </div>
    <div class="p-5 flex flex-col flex-grow">
        <h3 class="text-lg font-bold text-slate-900 mb-1"><?php echo htmlspecialchars($titre_voiture); ?></h3>
        <p class="text-slate-500 text-sm mb-4">Véhicule de tourisme</p>
        <div class="mt-auto flex items-center justify-between">
            <span class="text-2xl font-extrabold text-blue-600"><?php echo $prix_voiture; ?><span class="text-sm font-normal text-slate-400">/j</span></span>
            <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </div>
    </div>
</a>