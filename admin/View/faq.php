<?php
/**
 * Fichier : faq.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue affichant la liste des questions et réponses fréquentes pour la gestion administrative.
 */
?>
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-slate-800"><i class="fa-solid fa-circle-question text-blue-600 mr-3"></i>Foire aux questions</h1>
</div>

<div class="max-w-4xl mx-auto space-y-4">
    <?php foreach($faqs as $faq): ?>
    <details class="group bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden [&_summary::-webkit-details-marker]:hidden">
        <summary class="flex items-center justify-between cursor-pointer p-6 bg-white hover:bg-slate-50 transition">
            <h2 class="font-bold text-slate-800 flex items-center gap-4 text-lg">
                <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fa-solid fa-chevron-right transition duration-300 group-open:rotate-90"></i>
                </div>
                <?php echo htmlspecialchars($faq['question']); ?>
            </h2>
        </summary>
        <div class="p-6 pt-0 text-slate-600 border-t border-slate-100 bg-slate-50/50">
            <p class="mt-4 leading-relaxed font-medium">
                <i class="fa-solid fa-turn-up fa-rotate-90 text-blue-400 mr-2"></i> 
                <?php echo htmlspecialchars($faq['reponse']); ?>
            </p>
        </div>
    </details>
    <?php endforeach; ?>
</div>