<?php
/**
 * Fichier : mentions_legales.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Vue affichant les Mentions Légales, la politique RGPD et les Conditions Générales de Vente (CGV).
 */
?>
<div class="max-w-4xl mx-auto py-10">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-12 text-slate-700 space-y-10 leading-relaxed">
        
        <div class="border-b border-slate-200 pb-6 mb-8 text-center md:text-left">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2">Mentions Légales & Conditions Générales</h1>
            <p class="text-slate-500 font-medium">Dernière mise à jour : 24 Avril 2026</p>
        </div>

        <section class="space-y-4">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center font-bold"><i class="fa-solid fa-scale-balanced"></i></div>
                <h2 class="text-2xl font-bold text-slate-900">1. Éditeur et Hébergement du site</h2>
            </div>
            <p>Le présent site, accessible à l’URL <strong>LocAuto</strong> (le « Site »), est un projet universitaire édité par :</p>
            <ul class="list-disc pl-5 space-y-2 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <li><strong>Directeurs de la publication :</strong> LHANI Adam et SLILA Sophiane</li>
                <li><strong>Statut :</strong> Projet étudiant (Université d'Avignon)</li>
                <li><strong>Contact :</strong> adam.lhani@alumni.univ-avignon.fr - sophiane.slila@alumni.univ-avignon.fr</li>
            </ul>
            <p class="mt-4"><strong>Hébergement :</strong></p>
            <p>Le Site est hébergé par les serveurs pédagogiques de l'Université d'Avignon :<br>
            <em>Université d'Avignon et des Pays de Vaucluse<br>
            74 rue Louis Pasteur, 84000 Avignon (France)</em><br>
            Serveur : <strong>pedago.univ-avignon.fr</strong></p>
        </section>

        <section class="space-y-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">2. Propriété intellectuelle</h2>
            <p>Le Site et chacun des éléments qui le composent (textes, images, illustrations, photographies, bases de données, logiciels, structure de conception) sont protégés par le droit de la propriété intellectuelle.</p>
            <p>Toute reproduction, représentation, modification ou adaptation totale ou partielle du Site, par quelque procédé que ce soit, sans l'autorisation expresse des directeurs de la publication, est strictement interdite et constituerait une contrefaçon sanctionnée par le Code de la propriété intellectuelle.</p>
        </section>

        <section class="space-y-4">
            <div class="flex items-center gap-3 mb-4 mt-8">
                <div class="w-8 h-8 rounded bg-green-100 text-green-600 flex items-center justify-center font-bold"><i class="fa-solid fa-shield-halved"></i></div>
                <h2 class="text-2xl font-bold text-slate-900">3. Protection des Données Personnelles (RGPD)</h2>
            </div>
            <p>Conformément au Règlement Général sur la Protection des Données (RGPD) n°2016/679, LocAuto s'engage à protéger la vie privée de ses utilisateurs.</p>
            <ul class="list-disc pl-5 space-y-2">
                <li><strong>Données collectées :</strong> Nom, prénom, adresse e-mail et mots de passe (hachés de manière sécurisée).</li>
                <li><strong>Finalité du traitement :</strong> Ces données sont strictement nécessaires à la création de votre compte membre, à la gestion de vos demandes via le formulaire de contact, et à la sécurisation de l'accès au site.</li>
                <li><strong>Conservation :</strong> Les données sont conservées pendant toute la durée d'activation de votre compte. En cas de suppression du compte, les données sont immédiatement et définitivement effacées de nos bases de données.</li>
                <li><strong>Partage :</strong> Aucune donnée personnelle n'est revendue, cédée ou partagée à des tiers ou à des fins publicitaires.</li>
            </ul>
            <p class="font-medium text-slate-900 mt-4">Vos droits :</p>
            <p>Vous disposez d'un droit d'accès, de rectification, de portabilité et d'effacement de vos données. Vous pouvez exercer ces droits en toute autonomie en vous rendant sur la page <a href="profil" class="text-blue-600 font-bold hover:underline">Mon Profil</a> (bouton "Supprimer le compte"), ou en contactant l'administrateur via le formulaire de <a href="contact" class="text-blue-600 font-bold hover:underline">Contact</a>.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">4. Politique de gestion des Cookies</h2>
            <p>Le Site utilise des cookies techniques strictement nécessaires à son fonctionnement :</p>
            <ul class="list-disc pl-5 space-y-2">
                <li><strong>Cookies de session (PHPSESSID) :</strong> Indispensables pour maintenir votre connexion sécurisée au site et vous protéger contre les failles CSRF. Ils sont détruits à la fermeture de votre navigateur ou lors de la déconnexion.</li>
                <li><strong>Cookie "Se souvenir de moi" (locauto_remember) :</strong> Optionnel, il n'est déposé que si vous cochez la case correspondante lors de la connexion. Il expire au bout de 30 jours.</li>
                <li><strong>Cookie de consentement (cookie_consent) :</strong> Permet de mémoriser votre choix de masquer le bandeau d'information des cookies.</li>
            </ul>
        </section>

        <section class="space-y-4">
            <div class="flex items-center gap-3 mb-4 mt-8">
                <div class="w-8 h-8 rounded bg-purple-100 text-purple-600 flex items-center justify-center font-bold"><i class="fa-solid fa-file-contract"></i></div>
                <h2 class="text-2xl font-bold text-slate-900">5. Conditions Générales d'Utilisation et de Vente (CGU/CGV)</h2>
            </div>
            
            <h3 class="font-bold text-slate-800">5.1. Nature du service</h3>
            <p>LocAuto agit en qualité de <strong>plateforme d'intermédiation et d'agrégation d'annonces</strong> (vitrine numérique). Le Site permet à des agences partenaires de référencer leurs véhicules, et aux utilisateurs de consulter ces offres.</p>

            <h3 class="font-bold text-slate-800">5.2. Tarifs et Réservations</h3>
            <p>Les tarifs affichés sur le Site (prix par jour) sont <strong>indicatifs</strong> et fournis par les agences partenaires. LocAuto ne procède à aucune transaction financière en ligne. La réservation, l'établissement du contrat de location final, la caution et le paiement s'effectuent directement et exclusivement auprès de l'agence propriétaire du véhicule, dont les coordonnées sont fournies sur la fiche de chaque annonce.</p>

            <h3 class="font-bold text-slate-800">5.3. Responsabilités</h3>
            <p>LocAuto s'efforce de maintenir à jour les informations du catalogue, mais ne saurait garantir l'exactitude absolue ni la disponibilité en temps réel des véhicules figurant sur les annonces. LocAuto décline toute responsabilité quant à l'exécution du contrat de location conclu entre l'utilisateur et l'agence partenaire, ni en cas de litige concernant l'état du véhicule.</p>

            <h3 class="font-bold text-slate-800">5.4. Droit applicable et litiges</h3>
            <p>Les présentes conditions sont soumises au droit français. Tout litige relatif à l'utilisation du Site sera, à défaut d'accord amiable, de la compétence exclusive des tribunaux français.</p>
        </section>

    </div>
</div>