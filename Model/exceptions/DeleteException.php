<?php
namespace model\exceptions;

class DeleteException extends \Exception {
    public function __construct(string $message = "Erreur lors de la suppression") {
        parent::__construct($message);
    }
}