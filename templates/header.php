<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'menu.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription?>">
    <title><?=$titre?></title>
    <link rel="stylesheet" href="/framework/assets/styles.css">
</head>
<body>
    <header>
        <nav>    
             <?php        
            echo genererMenu($items);
             ?>               
        </nav>

    </header>
   <main>