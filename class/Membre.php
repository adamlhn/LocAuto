<?php
/**
 * Fichier Membre.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : classes
 * Description : Classe représentant un client inscrit (Membre).
 */

namespace classes;

require_once __DIR__ . '/../interfaces/IMembre.php';

use interfaces\IMembre;

/**
 * Classe Membre
 * Hérite de Utilisateur et implémente IMembre.
 */
class Membre extends Utilisateur implements IMembre {
    /** @var string Date d'inscription du membre au format SQL DATETIME */
    private string $date_inscription;

    /**
     * Constructeur
     * @param array $donnees Tableau d'hydratation
     */
    public function __construct(array $donnees = []) {
        parent::__construct($donnees); 
        $this->date_inscription = $donnees['date_inscription'] ?? date('Y-m-d H:i:s');
    }

    /**
     * Modifie le profil de l'utilisateur.
     * @return void
     */
    public function modifierProfil(): void {}

    /**
     * Supprime le compte de l'utilisateur.
     * @return void
     */
    public function supprimerCompte(): void {}
}
?>