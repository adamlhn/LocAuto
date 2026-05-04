<?php
/**
 * Fichier Utilisateur.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : classes
 * Description : Classe abstraite représentant un utilisateur générique.
 */

namespace classes;

require_once __DIR__ . '/../interfaces/IUtilisateur.php';

use interfaces\IUtilisateur;

/**
 * Classe abstraite Utilisateur
 * Classe parente pour les Membres et les Administrateurs.
 */
abstract class Utilisateur implements IUtilisateur {
    /** @var int Identifiant unique de l'utilisateur */
    protected int $id;
    /** @var string Nom de famille */
    protected string $nom;
    /** @var string Prénom */
    protected string $prenom;
    /** @var string Adresse e-mail (sert d'identifiant de connexion) */
    protected string $email;
    /** @var string Mot de passe haché */
    protected string $mot_de_passe;

    /**
     * Constructeur d'hydratation
     * @param array $donnees Tableau associatif des attributs
     */
    public function __construct(array $donnees = []) {
        if (!empty($donnees)) {
            $this->id = $donnees['id'] ?? 0;
            $this->nom = $donnees['nom'] ?? '';
            $this->prenom = $donnees['prenom'] ?? '';
            $this->email = $donnees['email'] ?? '';
            $this->mot_de_passe = $donnees['mot_de_passe'] ?? '';
        }
    }

    /**
     * Méthode magique Getter
     * @param string $propriete Nom de l'attribut à récupérer
     * @return mixed Valeur de l'attribut ou null s'il n'existe pas
     */
    public function __get(string $propriete) {
        if (property_exists($this, $propriete)) {
            return $this->$propriete;
        }
        return null;
    }

    /**
     * Méthode magique Setter
     * @param string $propriete Nom de l'attribut à modifier
     * @param mixed $valeur Nouvelle valeur de l'attribut
     */
    public function __set(string $propriete, $valeur): void {
        if (property_exists($this, $propriete)) {
            $this->$propriete = $valeur;
        }
    }

    /**
     * Logique de connexion 
     * @return bool
     */
    public function seConnecter(): bool {
        return true; 
    }
}
?>