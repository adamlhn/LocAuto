<?php
/**
 * Fichier UtilisateurModel.php
 * * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Description : Modèle pour la gestion des utilisateurs (Membres et Admins).
 * Package : model
 */

namespace model;

require_once __DIR__ . '/Connexion.php';
require_once __DIR__ . '/../class/Utilisateur.php';
require_once __DIR__ . '/../class/Membre.php';
require_once __DIR__ . '/../class/Admin.php';

use PDO;
use PDOException;
use classes\Utilisateur;
use classes\Membre;
use classes\Admin;

/**
 * Classe UtilisateurModel
 * Gère les requêtes liées aux utilisateurs.
 */
class UtilisateurModel {
    /** @var PDO|null L'instance de connexion PDO */
    private ?PDO $pdo;

    public function __construct() {
        $connexion = new Connexion();
        $this->pdo = $connexion->seConnecter();
    }

    /**
     * Instancie la bonne classe (Membre ou Admin) selon le rôle récupéré.
     */
    private function _hydraterUtilisateur(array $row): Utilisateur {
        if ($row['role'] === 'admin') {
            return new Admin($row);
        }
        return new Membre($row);
    }

    /**
     * Récupère un utilisateur via son objet.
     * * @param Utilisateur $user Objet Utilisateur contenant l'ID
     * @return Utilisateur|null Un objet Membre ou Admin, ou null
     */
    public function getById(Utilisateur $user): ?Utilisateur {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $stmt->execute(['id' => $user->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? $this->_hydraterUtilisateur($row) : null;
    }

    /**
     * Récupère un utilisateur via son email.
     * * @param Utilisateur $user Objet Utilisateur contenant l'email
     * @return Utilisateur|null
     */
    public function getByEmail(Utilisateur $user): ?Utilisateur {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->execute(['email' => $user->email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? $this->_hydraterUtilisateur($row) : null;
    }

    /**
     * Insère un nouvel utilisateur avec transaction.
     * * @param Utilisateur $user L'objet Utilisateur à insérer
     * @return bool
     */
    public function insert(Utilisateur $user): bool {
        try {
            $this->pdo->beginTransaction();
            $hash = password_hash($user->mot_de_passe, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) VALUES (:nom, :prenom, :email, :mot_de_passe, 'client')");
            $result = $stmt->execute([
                'nom' => htmlspecialchars($user->nom),
                'prenom' => htmlspecialchars($user->prenom),
                'email' => htmlspecialchars($user->email),
                'mot_de_passe' => $hash
            ]);
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }

    /**
     * Met à jour un utilisateur avec transaction.
     * * @param Utilisateur $user L'objet contenant les modifications
     * @return bool
     */
    public function update(Utilisateur $user): bool {
        try {
            $this->pdo->beginTransaction();
            if ($user->mot_de_passe !== '') {
                $hash = password_hash($user->mot_de_passe, PASSWORD_DEFAULT);
                $stmt = $this->pdo->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, mot_de_passe = :mot_de_passe WHERE id = :id");
                $result = $stmt->execute([
                    'nom' => htmlspecialchars($user->nom),
                    'prenom' => htmlspecialchars($user->prenom),
                    'email' => htmlspecialchars($user->email),
                    'mot_de_passe' => $hash,
                    'id' => $user->id
                ]);
            } else {
                $stmt = $this->pdo->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id");
                $result = $stmt->execute([
                    'nom' => htmlspecialchars($user->nom),
                    'prenom' => htmlspecialchars($user->prenom),
                    'email' => htmlspecialchars($user->email),
                    'id' => $user->id
                ]);
            }
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }

    /**
     * Supprime un utilisateur avec transaction.
     * * @param Utilisateur $user Objet contenant l'ID à supprimer
     * @return bool
     */
    public function delete(Utilisateur $user): bool {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id = :id");
            $result = $stmt->execute(['id' => $user->id]);
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }

        public function countAll(): int {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM utilisateurs");
        return (int) $stmt->fetchColumn();
    }

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM utilisateurs ORDER BY role ASC, nom ASC");
        $utilisateurs = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = $this->_hydraterUtilisateur($row);
        }
        return $utilisateurs;
    }
}
?>