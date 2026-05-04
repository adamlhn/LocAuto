<?php
/**
 * Fichier : messages.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue listant l'ensemble des messages de la boîte de réception administrative.
 */
?>
<h1 class="text-3xl font-bold text-slate-800 mb-8"><i class="fa-solid fa-envelope text-blue-600 mr-3"></i>Boîte de réception</h1>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden max-w-4xl mx-auto">
    <?php foreach($messages as $msg): ?>
    <div class="border-b border-slate-200 hover:bg-slate-50 transition <?php echo !$msg['lu'] ? 'bg-blue-50/30' : 'bg-white'; ?> flex items-center justify-between p-6">
        <a href="admin/messages/lecture/<?php echo $msg['id']; ?>" class="flex gap-4 items-start flex-grow">
            <?php if(!$msg['lu']): ?>
                <div class="w-2 h-2 bg-blue-600 rounded-full mt-2 shrink-0"></div>
            <?php endif; ?>
            <div>
                <h3 class="font-bold text-slate-800"><?php echo htmlspecialchars($msg['nom']); ?> <span class="text-sm font-normal text-slate-500 ml-2">&lt;<?php echo htmlspecialchars($msg['email']); ?>&gt;</span></h3>
                <p class="text-slate-600 font-medium mt-1"><?php echo htmlspecialchars($msg['objet']); ?></p>
                <p class="text-slate-500 text-sm mt-2 line-clamp-1"><?php echo htmlspecialchars($msg['contenu']); ?></p>
            </div>
        </a>
        <a href="admin/messages/repondre?email=<?php echo urlencode($msg['email']); ?>&objet=<?php echo urlencode('RE: ' . $msg['objet']); ?>" class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-5 py-2.5 rounded-lg text-sm font-bold transition flex items-center gap-2 shrink-0 ml-4">
            <i class="fa-solid fa-reply"></i>
        </a>
    </div>
    <?php endforeach; ?>
</div>