<?php
/**
 * Fichier : form_contact.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : View
 * Description : Vue affichant le formulaire de contact avec jeton de sécurité CSRF.
 */
?>
<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-10">
    <h2 class="text-2xl font-bold text-slate-900 mb-6 text-center">Envoyez-nous un message</h2>
    <form action="contact" method="POST" class="space-y-5">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
        
        <div class="flex flex-col md:flex-row gap-5">
            <input type="text" name="nom" placeholder="Votre nom" required class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
            <input type="text" name="prenom" placeholder="Votre prénom" required class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        </div>
        <input type="email" name="email" placeholder="Adresse e-mail" required class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        <input type="text" name="objet" placeholder="Sujet de votre demande" required class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
        <textarea name="message" placeholder="Comment pouvons-nous vous aider ?" rows="5" required class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition resize-none"></textarea>
        <button type="submit" class="w-full bg-blue-600 text-white rounded-xl py-4 font-bold shadow-md hover:bg-blue-700 hover:shadow-lg transition transform hover:-translate-y-0.5 mt-2">
            Envoyer le message
        </button>
    </form>
</div>