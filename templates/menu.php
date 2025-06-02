<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config'. DIRECTORY_SEPARATOR . 'config.php';

$items = [
    'index.php' => 'Accueil',
    'contact.php' => 'Contact',
    'inscription.php' => 'Inscription',
    'connexion.php' => 'Connexion',
    'profil.php' => 'Profil'
];


function genererMenu($items) {
    ob_start();

    $page_actuelle = basename($_SERVER['PHP_SELF']);

    echo'<ul>';

    foreach ($items as $url => $nom) {
        if (empty($url) || empty($nom)) continue;
        $classe_active = ($page_actuelle == $url) ? 'class="active"' : '';
        $full_url = BASE_URL . $url;
        echo "<li $classe_active><a href=\"$full_url\">$nom</a></li>";
    }

    echo'</ul>';

    return ob_get_clean(); 
}


?>