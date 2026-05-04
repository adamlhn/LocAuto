<?php
/**
 * Fichier : utilisateurs.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : admin/View
 * Description : Vue présentant le tableau de gestion des utilisateurs inscrits (clients et administrateurs).
 */
?>
<h1 class="text-3xl font-bold text-slate-800 mb-8"><i class="fa-solid fa-users-gear text-blue-600 mr-3"></i>Gestion des Membres</h1>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden max-w-5xl mx-auto">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-600 text-sm uppercase tracking-wider border-b border-slate-200">
                    <th class="p-5 font-bold">Nom Prénom</th>
                    <th class="p-5 font-bold">Email</th>
                    <th class="p-5 font-bold text-center">Rôle</th>
                    <th class="p-5 font-bold text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach($utilisateurs as $user): ?>
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-5 font-bold text-slate-800">
                        <?php echo htmlspecialchars($user['nom'] . ' ' . $user['prenom']); ?>
                    </td>
                    <td class="p-5 text-slate-600"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td class="p-5 text-center">
                        <?php if($user['role'] === 'admin'): ?>
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm">Admin</span>
                        <?php else: ?>
                            <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-bold border border-slate-200">Client</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-5 text-right">
                        <?php if($user['role'] !== 'admin'): ?>
                        <a href="admin/utilisateurs?delete=<?php echo $user['id']; ?>" 
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?');"
                           class="p-2 text-slate-400 hover:text-red-600 transition inline-block">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>