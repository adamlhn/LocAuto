<?php
/**
 * Fichier IMessage.php
 * Année : 2026
 * Auteurs : LHANI Adam - SLILA Sophiane
 * Package : interfaces
 * Description : Interface définissant l'action d'un message.
 */

namespace interfaces;

/**
 * Interface IMessage
 */
interface IMessage {
    /**
     * Affiche le contenu et les détails d'un message.
     * @return void
     */
    public function afficher(): void;
}
?>