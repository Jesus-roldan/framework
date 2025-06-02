<?php
define('DEV_MODE', true);

define('BASE_URL', 'http://localhost/framework/');

function obtenirConfigBdd(): array
{
    return [
        'serveur'     => 'localhost',
        'bdd'         => 'bdd_projet_web',
        'utilisateur' => 'root',
        'mdp'         => ''
    ];
}
?>