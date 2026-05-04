<?php
/**
 * Fichier : annonces.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue affichant la liste des véhicules sous forme de grille. 
 * Permet d'accéder aux formulaires de modification et de déclencher la suppression.
 */
?>
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-slate-800"><i class="fa-solid fa-car-side text-blue-600 mr-3"></i>Véhicules</h1>
    <a href="admin/vehicules/ajouter" class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-bold shadow-md hover:bg-blue-700 transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Ajouter une annonce
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <?php foreach($annonces as $auto): ?>
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-lg transition flex flex-col group">
        <div class="h-48 bg-slate-100 overflow-hidden relative">
            <img src="<?php echo $auto['photo']; ?>" alt="<?php echo htmlspecialchars($auto['titre']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <div class="p-6 flex-grow flex flex-col justify-between">
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-2"><?php echo htmlspecialchars($auto['titre']); ?></h3>
                <p class="text-blue-600 font-extrabold text-lg mb-6"><?php echo $auto['prix']; ?> € <span class="text-sm text-slate-500 font-normal">/ jour</span></p>
            </div>
            <div class="flex gap-2">
                <a href="admin/vehicules/modifier/<?php echo $auto['id']; ?>" class="flex-1 text-center bg-blue-50 text-blue-700 py-2.5 rounded-lg font-bold hover:bg-blue-100 transition">
                    <i class="fa-solid fa-pen mr-1"></i> Modifier
                </a>
                <a href="admin/vehicules?delete=<?php echo $auto['id']; ?>" onclick="return confirm('Supprimer ce véhicule ?');" class="bg-red-50 text-red-600 px-4 py-2.5 rounded-lg hover:bg-red-100 transition flex items-center justify-center" title="Supprimer">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>