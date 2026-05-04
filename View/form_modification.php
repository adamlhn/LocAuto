<?php
/**
 * Fichier : form_modification.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Vue affichant le formulaire de modification et de suppression de profil (avec CSRF).
 */
?>
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-10">
    <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-2xl font-bold uppercase">
            <?php echo substr($user['prenom'], 0, 1) . substr($user['nom'], 0, 1); ?>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Mon Profil</h2>
            <p class="text-slate-500">Gérez vos informations personnelles</p>
        </div>
    </div>
    <form action="profil" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-600 ml-1">Prénom</label>
                <input type="text" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-600 ml-1">Nom</label>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-600 ml-1">Adresse e-mail</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
        </div>
        <div class="pt-6 border-t border-slate-100 space-y-6">
            <h3 class="font-bold text-slate-900">Sécurité</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="password" name="password_new" placeholder="Nouveau mot de passe" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <input type="password" name="password_confirm" placeholder="Confirmer mot de passe" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
        </div>
        <div class="pt-6 flex justify-end gap-4">
            <button type="submit" name="delete_account" class="px-6 py-3 text-red-600 font-bold hover:bg-red-50 rounded-xl transition" onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?');">
                Supprimer le compte
            </button>
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold shadow-md hover:bg-blue-700 transition transform hover:-translate-y-0.5">
                Sauvegarder
            </button>
        </div>
    </form>
</div>