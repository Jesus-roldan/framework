<?php

require_once __DIR__. DIRECTORY_SEPARATOR . '/gestionAuthentification.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

deconnecter_utilisateur();

header('Location: connexion.php');
die();

?>