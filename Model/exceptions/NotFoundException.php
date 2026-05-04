<?php
namespace model\exceptions;

class NotFoundException extends \Exception {
    public function __construct(string $message = "Donnée non trouvée") {
        parent::__construct($message);
    }
}