<?php
/**
 * Fichier IMembre.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : interfaces
 * Description : Interface définissant les actions spécifiques à un membre client.
 */

namespace interfaces;

/**
 * Interface IMembre
 * Contrat pour les fonctionnalités d'un utilisateur de type client.
 */
interface IMembre {
    /**
     * Permet au membre de modifier ses informations personnelles.
     * @return void
     */
    public function modifierProfil(): void;

    /**
     * Permet au membre de demander la suppression de son compte.
     * @return void
     */
    public function supprimerCompte(): void;
}
?>