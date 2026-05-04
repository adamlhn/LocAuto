<?php
/**
 * Fichier Annonce.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : classes
 * Description : Entité représentant un véhicule en location.
 */

namespace classes;

use interfaces\IAnnonce;

/**
 * Classe Annonce
 * Modèle objet d'une annonce automobile.
 */
class Annonce implements IAnnonce {
    /** @var int ID de l'annonce */
    private int $id;
    /** @var string Titre (ex: Peugeot 208) */
    private string $titre;
    /** @var string Description complète du véhicule */
    private string $description;
    /** @var string Nom ou chemin du fichier image */
    private string $photo;
    /** @var float Tarif de location à la journée */
    private float $prix_par_jour;
    /** @var string Nom de l'agence propriétaire */
    private string $agence_nom;
    /** @var string Numéro de téléphone de l'agence */
    private string $agence_tel;
    /** @var string E-mail de l'agence */
    private string $agence_email;
    /** @var string Site web de l'agence */
    private string $agence_lien;

    /**
     * Constructeur d'hydratation
     * @param array $donnees Tableau contenant les données de l'annonce
     */
    public function __construct(array $donnees = []) {
        if (!empty($donnees)) {
            $this->id = $donnees['id'] ?? 0;
            $this->titre = $donnees['titre'] ?? '';
            $this->description = $donnees['description'] ?? '';
            $this->photo = $donnees['photo'] ?? '';
            $this->prix_par_jour = (float)($donnees['prix_par_jour'] ?? 0.0);
            $this->agence_nom = $donnees['agence_nom'] ?? '';
            $this->agence_tel = $donnees['agence_tel'] ?? '';
            $this->agence_email = $donnees['agence_email'] ?? '';
            $this->agence_lien = $donnees['agence_lien'] ?? '';
        }
    }

    /**
     * Getter magique
     * @param string $propriete
     * @return mixed
     */
    public function __get(string $propriete) {
        if (property_exists($this, $propriete)) {
            return $this->$propriete;
        }
        return null;
    }

    /**
     * Setter magique
     * @param string $propriete
     * @param mixed $valeur
     */
    public function __set(string $propriete, $valeur): void {
        if (property_exists($this, $propriete)) {
            $this->$propriete = $valeur;
        }
    }

    /** @return void */
    public function afficher(): void {}
    /** @return void */
    public function modifier(): void {}
    /** @return void */
    public function supprimer(): void {}
}
?>