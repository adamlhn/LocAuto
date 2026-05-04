<?php
/**
 * Fichier MessageModel.php
 * * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Description : Modèle gérant les messages du formulaire de contact.
 * Package : model
 */

namespace model;

require_once __DIR__ . '/Connexion.php';
require_once __DIR__ . '/../class/Message.php';

use PDO;
use PDOException;
use classes\Message;

/**
 * Classe MessageModel
 * CRUD et opérations spécifiques aux messages.
 */
class MessageModel {
    /** @var PDO|null L'instance de connexion PDO */
    private ?PDO $pdo;

    public function __construct() {
        $connexion = new Connexion();
        $this->pdo = $connexion->seConnecter();
    }

    /**
     * Insère un nouveau message avec transaction.
     * * @param Message $message L'objet Message à enregistrer
     * @return bool
     */
    public function insert(Message $message): bool {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare("INSERT INTO messages (nom, prenom, email, objet, contenu, date_envoi, lu) VALUES (:nom, :prenom, :email, :objet, :contenu, NOW(), false)");
            $result = $stmt->execute([
                'nom'     => htmlspecialchars($message->nom),
                'prenom'  => htmlspecialchars($message->prenom),
                'email'   => htmlspecialchars($message->email),
                'objet'   => htmlspecialchars($message->objet),
                'contenu' => htmlspecialchars($message->contenu)
            ]);
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }

    /**
     * Récupère tous les messages.
     * * @return Message[]
     */
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM messages ORDER BY date_envoi DESC");
        $messages = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $messages[] = new Message($row);
        }
        return $messages;
    }

    /**
     * Récupère un message ciblé.
     * * @param Message $message Objet contenant l'ID
     * @return Message|null
     */
    public function getById(Message $message): ?Message {
        $stmt = $this->pdo->prepare("SELECT * FROM messages WHERE id = :id");
        $stmt->execute(['id' => $message->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? new Message($row) : null;
    }

    /**
     * Marque un message comme lu avec transaction.
     * * @param Message $message Objet Message contenant l'ID
     * @return bool
     */
    public function markAsRead(Message $message): bool {
        try {
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare("UPDATE messages SET lu = true WHERE id = :id");
            $result = $stmt->execute(['id' => $message->id]);
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw clone $e;
        }
    }
}
?>