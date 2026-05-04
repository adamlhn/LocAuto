<?php
/**
 * Fichier : form_annonce.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue du formulaire de création d'une nouvelle annonce de véhicule.
 */
?>
<div class="max-w-2xl mx-auto">
    <div class="flex items-center mb-8 gap-4">
        <a href="admin/vehicules" class="text-slate-400 hover:text-blue-600 transition text-xl"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="text-3xl font-bold text-slate-800"><?php echo $action; ?> une annonce</h1>
    </div>

    <form method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 space-y-6">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Nom du véhicule</label>
            <input type="text" name="titre" placeholder="Ex: Peugeot 208" required class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Photo du véhicule</label>
            <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:bg-slate-50 transition cursor-pointer relative group">
                <input type="file" name="photo" id="photo-upload" required class="opacity-0 absolute inset-0 cursor-pointer w-full h-full z-10">
                <i class="fa-solid fa-cloud-arrow-up text-3xl text-blue-500 mb-2 group-hover:scale-110 transition"></i>
                <p id="nom-fichier" class="text-blue-600 font-medium">Cliquez pour uploader une image</p>
                <p class="text-xs text-slate-400 mt-1">PNG, JPG jusqu'à 5MB</p>
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
            <textarea name="description" placeholder="Description détaillée du véhicule..." required class="w-full border border-slate-300 rounded-xl p-3 h-32 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"></textarea>
        </div>
        
        <div class="w-1/3">
            <label class="block text-sm font-semibold text-slate-700 mb-2">Prix par jour (€)</label>
            <input type="number" name="prix" step="0.01" placeholder="0.00" required class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nom de l'agence</label>
                <input type="text" name="agence_nom" placeholder="Ex: LocAuto Avignon" required class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Téléphone agence</label>
                <input type="text" name="agence_tel" placeholder="04 90..." required class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Email agence</label>
                <input type="email" name="agence_email" placeholder="agence@mail.com" required class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Lien site agence</label>
                <input type="url" name="agence_lien" placeholder="https://..." required class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
        </div>
        
        <div class="pt-4 flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold shadow-md hover:bg-blue-700 transition flex items-center gap-2">
                <i class="fa-solid fa-check"></i> <?php echo $action; ?> l'annonce
            </button>
        </div>
    </form>
</div>