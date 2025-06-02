<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

function gererExceptions(Exception $e): void
{
    if (defined('DEV_MODE') && DEV_MODE === true)
    {
        echo "Une erreur est survenue : " . $e->getMessage() . PHP_EOL;
    }
    else
    {
        // Définir le chemin complet vers le fichier de log des erreurs.
        $cheminLog = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'erreurs.log';

        // Construire un message d'erreur contenant la date et l'heure suivies du message de l'exception.
        $message = date('[Y-m-d H:i:s] ') . $e->getMessage() . PHP_EOL;

        // Enregistrer le message dans le fichier de log.
        // Le paramètre "3" indique à error_log() d'écrire dans un fichier personnalisé.
        error_log($message, 3, $cheminLog);
    }
}
?>