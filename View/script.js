/**
 * Fichier : script.js
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Description : Gestion des interactions Front-Office (Affichage agence, bandeau Cookies RGPD et Mode Sombre).
 */

document.addEventListener("DOMContentLoaded", function() {

    // --- 1. GESTION DU BOUTON RÉSERVER (Détail Annonce) ---
    const btnReserver = document.getElementById('btn-reserver');

    if (btnReserver) {
        btnReserver.addEventListener('click', function() {
            const blocAgence = document.getElementById('bloc-agence');
            
            // On bascule l'affichage du bloc agence
            blocAgence.classList.toggle('hidden');
            
            if(!blocAgence.classList.contains('hidden')) {
                // État : Coordonnées affichées
                this.innerHTML = '<i class="fa-solid fa-chevron-up"></i> Masquer les coordonnées';
                this.classList.replace('bg-blue-600', 'bg-slate-800');
                this.classList.replace('hover:bg-blue-700', 'hover:bg-slate-900');
                this.classList.remove('hover:-translate-y-0.5');
                
                // Petit effet de scroll fluide vers les infos
                blocAgence.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } else {
                // État : Coordonnées masquées
                this.innerHTML = '<i class="fa-solid fa-calendar-check text-xl"></i> Réserver ce véhicule';
                this.classList.replace('bg-slate-800', 'bg-blue-600');
                this.classList.replace('hover:bg-slate-900', 'hover:bg-blue-700');
                this.classList.add('hover:-translate-y-0.5');
            }
        });
    }

    // --- 2. GESTION DU BANDEAU COOKIES (RGPD) ---
    const cookieBanner = document.getElementById('cookie-banner');
    const acceptBtn = document.getElementById('accept-cookies');

    // Vérifie si l'utilisateur a déjà accepté via le stockage local
    if (cookieBanner && !localStorage.getItem('cookiesAccepted')) {
        setTimeout(() => {
            cookieBanner.classList.remove('hidden');
            // cookieBanner.classList.add('animate-bounce-in'); // Décommente si tu as une animation CSS
        }, 1000);
    }

    if (acceptBtn) {
        acceptBtn.addEventListener('click', function() {
            cookieBanner.classList.add('hidden');
            localStorage.setItem('cookiesAccepted', 'true');
        });
    }

    // Console logs pour vérifier le statut du PHP (Analytics)
    if (document.cookie.includes('consentement_cookies=oui')) {
        console.log("Consentement accordé : Scripts de suivi activés.");
    } else if (document.cookie.includes('consentement_cookies=non')) {
        console.log("Consentement refusé : Scripts de suivi désactivés.");
    } else {
        console.log("Suivi désactivé (Cookies en attente de choix).");
    }

    // --- 3. GESTION DU MODE SOMBRE (THEME SWITCHER) ---
    const themeToggleBtn = document.getElementById('theme-toggle');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    if (themeToggleBtn && darkIcon && lightIcon) {
        // Affiche la bonne icône selon le thème actuel (déjà initialisé dans le header)
        if (document.documentElement.classList.contains('dark')) {
            lightIcon.classList.remove('hidden');
        } else {
            darkIcon.classList.remove('hidden');
        }

        // Action au clic sur le bouton
        themeToggleBtn.addEventListener('click', function() {
            // Bascule des icônes
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');

            // Bascule du thème
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });
    }
});