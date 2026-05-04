<?php
/**
 * Fichier : footer.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Pied de page de l'interface d'administration. Inclut les liens vers la FAQ et le retour au site public.
 */
?>
</main>
    <footer class="bg-slate-900 text-slate-400 mt-20 py-10 w-full">
        <div class="w-full px-6 md:px-12 lg:px-24 xl:px-32 flex flex-col md:flex-row items-center justify-between">
            <div class="text-sm">
                &copy; 2026 LocAuto Administration. 
                <a href="admin/faq" class="hover:text-white transition ml-4"><i class="fa-solid fa-circle-question mr-1"></i>FAQ</a>
            </div>
            <div class="flex items-center space-x-6 text-sm mt-4 md:mt-0">
                <a href="accueil" class="hover:text-white transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Retour au site public
                </a>
            </div>
        </div>
    </footer>
    <script src="View/script.js"></script>
</body>
</html>