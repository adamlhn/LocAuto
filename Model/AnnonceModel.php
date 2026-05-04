<?php
/**
 * Fichier AnnonceModel.php
 * * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Description : Modèle pour la gestion des annonces (véhicules) en base de données.
 * Package : model
 */

namespace model;

require_once __DIR__ . '/Connexion.php';
require_once __DIR__ . '/../interfaces/IAnnonce.php';
require_once __DIR__ . '/../class/Annonce.php';

use PDO;
use PDOException;
use classes\Annonce; 

/**
 * Classe AnnonceModel
 * Gère les opérations CRUD pour les objets Annonce en base de données.
 */
class AnnonceModel {
    /**
     * @var PDO|null L'instance de connexion à la base de données
     */
    private ?PDO $pdo;

    /**
     * Constructeur : Initialise la connexion à la base de données.
     */
    public function __construct() {
        $connexion = new Connexion();
        $this->pdo = $connexion->seConnecter();
    }

    /**
     * Récupère toutes les annonces sous forme d'objets.
     * * @return Annonce[] Un tableau contenant des objets Annonce
     */
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM annonces");
        $annonces = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $annonces[] = new Annonce($row);
        }
        return $annonces;
    }

    /**
     * Récupère une annonce spécifique via son ID encapsulé dans un objet.
     * * @param Annonce $annonce Un objet Annonce contenant l'ID recherché
     * @return Annonce|null L'objet Annonce hydraté ou null si non trouvé
     */
    public function getById(Annonce $annonce): ?Annonce {
        $stmt = $this->pdo->prepare("SELECT * FROM annonces WHERE id = :id");
        $stmt->execute(['id' => $annonce->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? new Annonce($row) : null;
    }

    /**
     * Supprime une annonce avec utilisation d'une transaction.
     * * @param Annonce $annonce L'objet Annonce à supprimer
     * @return bool True si la suppression a réussi
     * @throws PDOException En cas d'erreur lors de la suppression
     */
    public function delete(Annonce $annonce): bool {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare("DELETE FROM annonces WHERE id = :id");
            $result = $stmt->execute(['id' => $annonce->id]);
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }

    /**
     * Insère une nouvelle annonce avec transaction.
     * * @param Annonce $annonce L'objet Annonce à insérer
     * @return bool True si l'insertion a réussi
     * @throws PDOException
     */
    public function insert(Annonce $annonce): bool {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare("INSERT INTO annonces (titre, description, prix_par_jour, photo, agence_nom, agence_tel, agence_email, agence_lien) VALUES (:titre, :description, :prix, :photo, :nom, :tel, :email, :lien)");
            $result = $stmt->execute([
                'titre'       => htmlspecialchars($annonce->titre),
                'description' => htmlspecialchars($annonce->description),
                'prix'        => $annonce->prix_par_jour,
                'photo'       => htmlspecialchars($annonce->photo),
                'nom'         => htmlspecialchars($annonce->agence_nom),
                'tel'         => htmlspecialchars($annonce->agence_tel),
                'email'       => htmlspecialchars($annonce->agence_email),
                'lien'        => htmlspecialchars($annonce->agence_lien)
            ]);
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }

    /**
     * Met à jour une annonce existante avec transaction.
     * * @param Annonce $annonce L'objet Annonce contenant les données à jour
     * @return bool True si la mise à jour a réussi
     * @throws PDOException
     */
    public function update(Annonce $annonce): bool {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare("UPDATE annonces SET titre = :titre, description = :description, prix_par_jour = :prix, photo = :photo WHERE id = :id");
            $result = $stmt->execute([
                'titre'       => htmlspecialchars($annonce->titre),
                'description' => htmlspecialchars($annonce->description),
                'prix'        => $annonce->prix_par_jour,
                'photo'       => htmlspecialchars($annonce->photo),
                'id'          => $annonce->id
            ]);
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }

        public function countAll(): int {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM annonces");
        return (int) $stmt->fetchColumn();
    }
}
?>