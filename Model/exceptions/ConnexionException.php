<?php
namespace model\exceptions;

class ConnexionException extends \Exception {
    public function __construct(string $message = "Erreur de connexion à la base de données") {
        parent::__construct($message);
    }
}

