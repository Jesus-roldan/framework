<?php

function genererMenu($items) {
    ob_start();

    $page_actuelle = basename($_SERVER['PHP_SELF']);

    foreach ($items as $url => $nom) {
        
        $classe_active = ($page_actuelle == $url) ? 'class="active"' : '';
        echo "<li $classe_active><a href='$url'>$nom</a></li>";
    }

    return ob_get_clean(); 
}

$items = [
    'index.php' => 'Accueil',
    'contact.php' => 'Contact'
];

?>