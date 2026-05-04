<?php
namespace model\exceptions;

class InsertException extends \Exception {
    public function __construct(string $message = "Erreur lors de l'insertion") {
        parent::__construct($message);
    }
}