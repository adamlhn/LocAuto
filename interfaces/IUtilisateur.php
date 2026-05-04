<?php
/**
 * Fichier IUtilisateur.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : interfaces
 * Description : Interface définissant l'action de base de tout utilisateur.
 */

namespace interfaces;

/**
 * Interface IUtilisateur
 * Contrat de base pour un utilisateur (visiteur, membre ou admin).
 */
interface IUtilisateur {
    /**
     * Gère le processus de connexion au compte.
     * @return bool True si la connexion réussit, False sinon.
     */
    public function seConnecter(): bool;
}
?>