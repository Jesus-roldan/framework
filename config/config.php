<?php
define('DEV_MODE', true);

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