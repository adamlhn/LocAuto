<?php
/**
 * Fichier : header.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Fichier d'en-tête de l'application Front-Office.
 * Gère l'initialisation des sessions, la sécurité CSRF, le bandeau de consentement 
 * des cookies (avec personnalisation) et la barre de navigation.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Génération du Token CSRF s'il n'existe pas pour sécuriser les formulaires
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Gestion de la bannière de consentement des cookies (Logique serveur)
$duree_cookie = time() + (86400 * 30); // Valable 30 jours

if (isset($_GET['accepter_cookies'])) {
    setcookie('consentement_cookies', 'tout_accepte', $duree_cookie, "/");
    setcookie('cookie_stats', 'oui', $duree_cookie, "/");
    setcookie('cookie_marketing', 'oui', $duree_cookie, "/");
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // Nettoie l'URL
    exit;
}

if (isset($_GET['refuser_cookies'])) {
    setcookie('consentement_cookies', 'tout_refuse', $duree_cookie, "/");
    setcookie('cookie_stats', 'non', $duree_cookie, "/");
    setcookie('cookie_marketing', 'non', $duree_cookie, "/");
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}

// Traitement du formulaire de personnalisation des cookies
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sauvegarder_cookies'])) {
    $stats = isset($_POST['cookie_stats']) ? 'oui' : 'non';
    $marketing = isset($_POST['cookie_marketing']) ? 'oui' : 'non';
    
    setcookie('consentement_cookies', 'personnalise', $duree_cookie, "/");
    setcookie('cookie_stats', $stats, $duree_cookie, "/");
    setcookie('cookie_marketing', $marketing, $duree_cookie, "/");
    
    header("Location: " . $_SERVER["REQUEST_URI"]);
    exit;
}

$is_connected = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($titre) ? htmlspecialchars($titre) : "LocAuto"; ?></title>
    <base href="/~uapv2503728/Projet_WEB_Loc/">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="View/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col font-sans selection:bg-blue-200 w-full overflow-x-hidden">
    
    <?php if (!isset($_COOKIE['consentement_cookies'])): ?>
        <div id="cookie-banner" class="fixed bottom-6 left-6 right-6 md:left-auto md:right-12 md:max-w-md bg-slate-900 text-white p-6 rounded-2xl shadow-2xl z-[100] border border-slate-700">
            <div class="flex items-start gap-4">
                <div class="bg-blue-600 p-3 rounded-xl text-white shrink-0">
                    <i class="fa-solid fa-cookie-bite text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg">Cookies & Confidentialité</h4>
                    <p class="text-slate-400 text-sm mt-1">
                        Nous utilisons des cookies pour assurer le bon fonctionnement du site et améliorer votre expérience.
                    </p>
                    <div class="mt-4 flex flex-wrap items-center gap-3">
                        <a href="?accepter_cookies=1" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-bold text-sm transition text-center">
                            Tout accepter
                        </a>
                        <button type="button" onclick="document.getElementById('cookie-modal').classList.remove('hidden')" class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition text-center">
                            Personnaliser
                        </button>
                        <a href="?refuser_cookies=1" class="text-slate-400 hover:text-white text-sm underline font-medium ml-1">
                            Tout refuser
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="cookie-modal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
            <div class="bg-white text-slate-800 w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                    <h3 class="font-bold text-xl">Préférences des cookies</h3>
                    <button type="button" onclick="document.getElementById('cookie-modal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600 transition">
                        <i class="fa-solid fa-xmark text-2xl"></i>
                    </button>
                </div>
                
                <form method="POST" action="" class="p-6 space-y-6">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h4 class="font-bold text-slate-800 flex items-center gap-2">
                                Cookies Essentiels <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full font-bold">Requis</span>
                            </h4>
                            <p class="text-sm text-slate-500 mt-1">Nécessaires au bon fonctionnement du site (sécurité, session). Ils ne peuvent pas être désactivés.</p>
                        </div>
                        <input type="checkbox" checked disabled class="w-5 h-5 accent-blue-600 cursor-not-allowed mt-1">
                    </div>
                    
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h4 class="font-bold text-slate-800">Cookies Statistiques</h4>
                            <p class="text-sm text-slate-500 mt-1">Nous permettent de comprendre comment vous naviguez sur LocAuto pour améliorer nos services.</p>
                        </div>
                        <input type="checkbox" name="cookie_stats" id="cookie_stats" class="w-5 h-5 accent-blue-600 cursor-pointer mt-1">
                    </div>
                    
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h4 class="font-bold text-slate-800">Cookies Marketing</h4>
                            <p class="text-sm text-slate-500 mt-1">Utilisés pour vous proposer des annonces de véhicules pertinentes en dehors de notre site.</p>
                        </div>
                        <input type="checkbox" name="cookie_marketing" id="cookie_marketing" class="w-5 h-5 accent-blue-600 cursor-pointer mt-1">
                    </div>
                    
                    <div class="pt-4 border-t border-slate-100">
                        <button type="submit" name="sauvegarder_cookies" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold shadow-md transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-floppy-disk"></i> Enregistrer mes choix
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <header class="bg-white shadow-sm sticky top-0 z-40 mb-8 w-full border-b border-slate-100">
        <div class="w-full px-6 md:px-12 lg:px-24 xl:px-32 py-4 flex items-center justify-between">
            <a href="accueil" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center shadow-lg group-hover:bg-blue-700 transition">
                    <i class="fa-solid fa-car-side"></i>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900">Loc<span class="text-blue-600">Auto</span></span>
            </a>
            
            <nav class="flex items-center gap-4 md:gap-8 font-medium text-slate-600 text-sm md:text-base flex-wrap justify-end">
                <a href="catalogue" class="hover:text-blue-600 transition">Catalogue</a>
                <a href="contact" class="hover:text-blue-600 transition">Contact</a>
                
                <?php if ($is_connected): ?>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <a href="admin/dashboard" class="text-indigo-600 font-bold hover:text-indigo-800 transition">Administration</a>
                    <?php endif; ?>
                    <a href="profil" class="bg-indigo-50 text-indigo-600 px-3 py-1.5 md:px-5 md:py-2 rounded-lg hover:bg-indigo-100 transition whitespace-nowrap">Mon Profil</a>
                    <a href="deconnexion" class="text-red-500 hover:text-red-700 transition font-bold">Déconnexion</a>
                <?php else: ?>
                    <a href="connexion" class="bg-blue-50 text-blue-600 px-3 py-1.5 md:px-5 md:py-2 rounded-lg hover:bg-blue-100 transition whitespace-nowrap">Connexion</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="flex-grow w-full px-6 md:px-12 lg:px-24 xl:px-32 relative">