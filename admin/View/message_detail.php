<?php
/**
 * Fichier : message_detail.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue de lecture d'un message reçu. Affiche les détails de l'expéditeur et le contenu du message.
 */
?>
<div class="max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div class="flex items-center gap-4">
            <a href="admin/messages" class="text-slate-400 hover:text-blue-600 transition text-xl bg-white w-10 h-10 flex items-center justify-center rounded-full shadow-sm border border-slate-200">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1 class="text-3xl font-bold text-slate-800">Lecture du message</h1>
        </div>
        <a href="admin/messages/repondre?email=<?php echo urlencode($message_courant['email']); ?>&objet=<?php echo urlencode('RE: ' . $message_courant['objet']); ?>" class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-bold shadow-md hover:bg-blue-700 transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-reply"></i> Répondre au message
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden p-8 md:p-10">
        <div class="border-b border-slate-100 pb-6 mb-6">
            <h2 class="text-2xl font-bold text-slate-900 mb-4"><?php echo htmlspecialchars($message_courant['objet']); ?></h2>
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 text-sm text-slate-500">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-slate-100 text-slate-600 rounded-full flex items-center justify-center font-bold text-lg">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <span class="font-bold text-slate-800 block text-base"><?php echo htmlspecialchars($message_courant['nom']); ?></span>
                        <a href="mailto:<?php echo htmlspecialchars($message_courant['email']); ?>" class="hover:text-blue-600 transition"><?php echo htmlspecialchars($message_courant['email']); ?></a>
                    </div>
                </div>
                <div class="text-slate-400 font-medium">
                    <i class="fa-regular fa-clock mr-1"></i> Reçu le <?php echo $message_courant['date']; ?>
                </div>
            </div>
        </div>
        <div class="text-slate-700 text-lg leading-relaxed whitespace-pre-wrap min-h-[150px]"><?php echo htmlspecialchars($message_courant['contenu']); ?></div>
    </div>
</div>