<?php
/**
 * Fichier IFAQ.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : interfaces
 * Description : Interface définissant les actions de la FAQ.
 */

namespace interfaces;

/**
 * Interface IFAQ
 * Contrat pour la gestion d'un élément de la foire aux questions.
 */
interface IFAQ {
    /**
     * Ajoute une nouvelle question/réponse.
     * @return void
     */
    public function ajouter(): void;

    /**
     * Supprime une question/réponse existante.
     * @return void
     */
    public function supprimer(): void;

    /**
     * Affiche la question et sa réponse.
     * @return void
     */
    public function afficher(): void;
}
?>