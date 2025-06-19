<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'gestionSession.php'; 
require_once __DIR__. DIRECTORY_SEPARATOR . '/gestionAuthentification.php';

initialiserSession();

deconnecterUtilisateur();

detruireSession(); 

header('Location: '. BASE_URL .'connexion.php');
die();

?>