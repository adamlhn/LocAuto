<?php
/**
 * Fichier de gestion de la connexion à la base de données.
 * * Ce fichier contient la classe Connexion permettant d'établir une liaison
 * sécurisée avec la base de données PostgreSQL via l'extension PDO.
 * * @author LHANI Adam - SLILA Sophiane
 * @year 2026
 * @package model
 */

namespace model;

use \PDO;
use \PDOException;
use model\exceptions\ConnexionException;

/**
 * Classe Connexion
 * Gère l'instance unique de connexion à la base de données (Pattern Singleton simplifié).
 */
class Connexion {
    /**
     * @var PDO|null Instance de connexion PDO
     */
    private ?PDO $pdo = null;
    
    private string $host = 'pedago01c.univ-avignon.fr';
    private string $dbname = 'etd';
    private string $user = 'uapv2503728';
    private string $password = 'ylxKBY';

    /**
     * Établit la connexion à la base de données.
     * * @return PDO|null Retourne l'objet PDO si la connexion réussit.
     * @throws ConnexionException Si la connexion échoue.
     */
    public function seConnecter(): ?PDO {
        if ($this->pdo === null) {
            try {
                $dsn = "pgsql:host={$this->host};dbname={$this->dbname}";
                $this->pdo = new PDO($dsn, $this->user, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // On peut utiliser votre exception personnalisée ici
                throw new ConnexionException("Erreur de connexion : " . $e->getMessage());
            }
        }
        return $this->pdo;
    }

    /**
     * Ferme la connexion à la base de données.
     * * @return void
     */
    public function seDeconnecter(): void {
        $this->pdo = null;
    }
}
?>