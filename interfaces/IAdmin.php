<?php
/**
 * Fichier IAdmin.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : interfaces
 * Description : Interface définissant les actions d'administration du site LocAuto.
 */

namespace interfaces;

/**
 * Interface IAdmin
 * Contrat pour les fonctionnalités exclusives au rôle d'administrateur.
 */
interface IAdmin {
    /**
     * Gère les annonces du site (validation, suppression, etc.).
     * @return void
     */
    public function gererAnnonces(): void;

    /**
     * Gère les utilisateurs inscrits sur la plateforme.
     * @return void
     */
    public function gererUtilisateurs(): void;

    /**
     * Envoie un e-mail depuis le back-office.
     * @return void
     */
    public function envoyerMail(): void;

    /**
     * Gère les questions et réponses de la Foire Aux Questions.
     * @return void
     */
    public function gererFAQ(): void;

    /**
     * Permet de répondre à un message reçu via le formulaire de contact.
     * @return void
     */
    public function repondreMessage(): void;
}
?>