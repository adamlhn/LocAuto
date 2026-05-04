<?php
/**
 * Fichier Message.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : classes
 * Description : Entité représentant un message issu du formulaire de contact.
 */

namespace classes;

require_once __DIR__ . '/../interfaces/IMessage.php';

use interfaces\IMessage;

/**
 * Classe Message
 */
class Message implements IMessage {
    /** @var int ID du message */
    private int $id;
    /** @var string Nom de l'expéditeur */
    private string $nom;
    /** @var string Prénom de l'expéditeur */
    private string $prenom;
    /** @var string Email de l'expéditeur */
    private string $email;
    /** @var string Objet du message */
    private string $objet;
    /** @var string Corps du message */
    private string $contenu;
    /** @var string Date d'envoi */
    private string $date_envoi;
    /** @var bool Statut de lecture (true si lu par l'admin) */
    private bool $lu;

    /**
     * Constructeur d'hydratation
     * @param array $donnees
     */
    public function __construct(array $donnees = []) {
        if (!empty($donnees)) {
            $this->id = $donnees['id'] ?? 0;
            $this->nom = $donnees['nom'] ?? '';
            $this->prenom = $donnees['prenom'] ?? '';
            $this->email = $donnees['email'] ?? '';
            $this->objet = $donnees['objet'] ?? '';
            $this->contenu = $donnees['contenu'] ?? '';
            $this->date_envoi = $donnees['date_envoi'] ?? date('Y-m-d H:i:s');
            // Cast explicite en boolean pour sécuriser le typage
            $this->lu = (bool)($donnees['lu'] ?? false);
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
}
?>