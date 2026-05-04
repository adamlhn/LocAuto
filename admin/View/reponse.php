<?php
/**
 * Fichier : reponse.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue du formulaire permettant de rédiger une réponse à un message client.
 */
?>
<div class="max-w-2xl mx-auto">
    <div class="flex items-center mb-8 gap-4">
        <a href="admin/messages" class="text-slate-400 hover:text-blue-600 transition text-xl"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="text-3xl font-bold text-slate-800">Répondre au message</h1>
    </div>

    <form method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 space-y-6">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Destinataire (Email)</label>
            <input type="email" value="<?php echo $destinataire; ?>" class="w-full border border-slate-300 rounded-xl p-3 bg-slate-50 text-slate-500 focus:outline-none" readonly>
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Objet</label>
            <input type="text" value="<?php echo $objet_predefini; ?>" class="w-full border border-slate-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Votre message</label>
            <textarea name="reponse_contenu" placeholder="Saisissez votre réponse ici..." required class="w-full border border-slate-300 rounded-xl p-3 h-48 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"></textarea>
        </div>
        
        <div class="pt-4 flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold shadow-md hover:bg-blue-700 transition flex items-center gap-2">
                <i class="fa-solid fa-paper-plane"></i> Envoyer la réponse
            </button>
        </div>
    </form>
</div>