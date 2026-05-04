<?php
/**
 * Fichier IAnnonce.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : interfaces
 * Description : Interface définissant les actions de base d'une annonce.
 */

namespace interfaces;

/**
 * Interface IAnnonce
 * Contrat pour la manipulation visuelle et fonctionnelle d'une annonce.
 */
interface IAnnonce {
    /**
     * Gère l'affichage des détails de l'annonce.
     * @return void
     */
    public function afficher(): void;

    /**
     * Prépare les données de l'annonce pour modification.
     * @return void
     */
    public function modifier(): void;

    /**
     * Prépare les données de l'annonce pour suppression.
     * @return void
     */
    public function supprimer(): void;
}
?>