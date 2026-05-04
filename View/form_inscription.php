<?php
/**
 * Fichier : form_inscription.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Vue affichant le formulaire d'inscription avec intégration du token CSRF.
 */
?>
<div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-10">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Créer un compte</h2>
        <p class="text-slate-500 mt-2">Rejoignez LocAuto dès aujourd'hui</p>
    </div>
    <form action="inscription" method="POST" class="space-y-5">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
        
        <div class="flex gap-4">
            <input type="text" name="nom" placeholder="Nom" required class="w-1/2 bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
            <input type="text" name="prenom" placeholder="Prénom" required class="w-1/2 bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        </div>
        <input type="email" name="email" placeholder="Adresse e-mail" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        <input type="password" name="password" placeholder="Mot de passe" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        <input type="password" name="password_confirm" placeholder="Confirmer le mot de passe" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        <button type="submit" class="w-full bg-blue-600 text-white rounded-xl py-3.5 font-bold shadow-md hover:bg-blue-700 transition transform hover:-translate-y-0.5">
            S'inscrire
        </button>
    </form>
    <div class="mt-6 text-center text-sm text-slate-500">
        Déjà un compte ? <a href="connexion.php" class="text-blue-600 font-bold hover:underline">Se connecter</a>
    </div>
</div>