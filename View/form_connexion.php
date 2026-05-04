<?php
/**
 * Fichier : form_connexion.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Vue affichant le formulaire d'authentification des utilisateurs.
 */

// On lit le cookie s'il existe pour pré-remplir le champ
$saved_email = $_COOKIE['locauto_email'] ?? '';
$is_remembered = !empty($saved_email) ? 'checked' : '';
?>
<div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-10">
    <div class="text-center mb-8">
        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
            <i class="fa-solid fa-user"></i>
        </div>
        <h2 class="text-2xl font-bold text-slate-900">Bienvenue</h2>
        <p class="text-slate-500 mt-2">Connectez-vous à votre compte LocAuto</p>
    </div>
    <form action="connexion" method="POST" class="space-y-5">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
        
        <input type="email" name="email" value="<?php echo htmlspecialchars($saved_email); ?>" placeholder="Adresse e-mail" required class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        
        <input type="password" name="password" placeholder="Mot de passe" required class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        
        <div class="flex items-center">
            <input type="checkbox" id="remember" name="remember" <?php echo $is_remembered; ?> class="w-4 h-4 text-blue-600 bg-slate-50 border-slate-300 rounded focus:ring-blue-500">
            <label for="remember" class="ml-2 text-sm font-medium text-slate-700">Se souvenir de moi</label>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white rounded-xl py-3.5 font-bold shadow-md hover:bg-blue-700 transition transform hover:-translate-y-0.5">
            Se connecter
        </button>
    </form>
    <div class="mt-8 text-center text-sm text-slate-500">
        Nouveau sur LocAuto ? <a href="inscription" class="text-blue-600 font-bold hover:underline">Créer un compte</a>
    </div>
</div>