<?php
/**
 * Fichier FAQ.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : classes
 * Description : Entité d'une question-réponse pour la Foire Aux Questions.
 */

namespace classes;

require_once __DIR__ . '/../interfaces/IFAQ.php';

use interfaces\IFAQ;

/**
 * Classe FAQ
 */
class FAQ implements IFAQ {
    /** @var int Identifiant unique */
    private int $id;
    /** @var string Intitulé de la question */
    private string $question;
    /** @var string Contenu de la réponse */
    private string $reponse;

    /**
     * Constructeur d'hydratation
     * @param array $donnees 
     */
    public function __construct(array $donnees = []) {
        if (!empty($donnees)) {
            $this->id = $donnees['id'] ?? 0;
            $this->question = $donnees['question'] ?? '';
            $this->reponse = $donnees['reponse'] ?? '';
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
    public function ajouter(): void {}
    /** @return void */
    public function supprimer(): void {}
    /** @return void */
    public function afficher(): void {}
}
?>