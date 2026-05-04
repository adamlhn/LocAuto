<?php
/**
 * Fichier FAQModel.php
 * * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Description : Modèle de la Foire Aux Questions.
 * Package : model
 */

namespace model;

require_once __DIR__ . '/Connexion.php';
require_once __DIR__ . '/../class/FAQ.php';

use PDO;
use PDOException;
use classes\FAQ;

/**
 * Classe FaqModel
 * Gère la récupération des questions/réponses.
 */
class FaqModel {
    /** @var PDO|null L'instance de connexion PDO */
    private ?PDO $pdo;

    public function __construct() {
        $connexion = new Connexion();
        $this->pdo = $connexion->seConnecter();
    }

    /**
     * Récupère toutes les entrées de la FAQ.
     * * @return FAQ[]
     */
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM faq ORDER BY id ASC");
        $faqs = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $faqs[] = new FAQ($row);
        }
        return $faqs;
    }
}
?>