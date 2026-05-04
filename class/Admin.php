<?php
/**
 * Fichier Admin.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : classes
 * Description : Classe représentant l'administrateur du site.
 */

namespace classes;

require_once __DIR__ . '/../interfaces/IAdmin.php';

use interfaces\IAdmin;

/**
 * Classe Admin
 * Hérite de Utilisateur et implémente IAdmin. Possède tous les droits.
 */
class Admin extends Utilisateur implements IAdmin {
    
    /**
     * Constructeur
     * @param array $donnees Tableau d'hydratation
     */
    public function __construct(array $donnees = []) {
        parent::__construct($donnees);
    }

    /** @return void */
    public function gererAnnonces(): void {}
    
    /** @return void */
    public function gererUtilisateurs(): void {}
    
    /** @return void */
    public function envoyerMail(): void {}
    
    /** @return void */
    public function gererFAQ(): void {}
    
    /** @return void */
    public function repondreMessage(): void {}
}
?>