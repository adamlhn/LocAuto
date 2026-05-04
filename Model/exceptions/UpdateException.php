<?php
namespace model\exceptions;

class UpdateException extends \Exception {
    public function __construct(string $message = "Erreur lors de la modification") {
        parent::__construct($message);
    }
}