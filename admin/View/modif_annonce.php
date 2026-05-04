<?php
/**
 * Fichier : modif_annonce.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue du formulaire permettant d'éditer les informations d'un véhicule existant.
 */
?>
<div class="max-w-2xl mx-auto">
    <div class="flex items-center mb-8 gap-4">
        <a href="admin/vehicules" class="text-slate-400 hover:text-blue-600 transition text-xl"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="text-3xl font-bold text-slate-800">Modifier l'annonce</h1>
    </div>

    <?php if (isset($erreur) && $erreur !== null): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
        <p class="font-bold">Erreur</p>
        <p><?php echo htmlspecialchars($erreur); ?></p>
    </div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        
        <div class="mb-6">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Nom du véhicule</label>
            <input type="text" name="titre" value="<?php echo htmlspecialchars($annonce_a_modifier['titre']); ?>" class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Photo actuelle</label>
            
            <div class="mb-4 h-48 bg-slate-100 rounded-xl overflow-hidden border border-slate-200">
                <img src="View/<?php echo basename($annonce_a_modifier['photo_url']); ?>" alt="Photo actuelle" class="w-full h-full object-contain">
            </div>

            <div class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:bg-slate-50 transition cursor-pointer relative group">
                <input type="file" name="photo" class="opacity-0 absolute inset-0 cursor-pointer w-full h-full z-10">
                <i class="fa-solid fa-cloud-arrow-up text-2xl text-blue-500 mb-2 group-hover:scale-110 transition"></i>
                <p class="text-blue-600 font-medium text-sm">Cliquez pour remplacer l'image</p>
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
            <textarea name="description" class="w-full border border-slate-300 rounded-xl p-3 h-32 focus:ring-2 focus:ring-blue-500 outline-none transition resize-none"><?php echo htmlspecialchars($annonce_a_modifier['description']); ?></textarea>
        </div>
        
        <div class="w-1/3 mb-6">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Prix / Jour (€)</label>
            <input type="number" name="prix" step="0.01" value="<?php echo htmlspecialchars($annonce_a_modifier['prix_par_jour']); ?>" class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none transition font-bold text-blue-600">
        </div>
        
        <div class="pt-4 flex justify-end border-t border-slate-100 mt-6">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold shadow-md hover:bg-blue-700 transition flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square"></i> Modifier l'annonce
            </button>
        </div>
    </form>
</div>