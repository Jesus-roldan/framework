

<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription?>">
    <title><?=$titre?></title>
    <link rel="stylesheet" href="C:\laragon\www\framework\assets\css\styles.css">
</head>
<body>
    <h1>hola</h1>
    <header>
        <nav>
            <ul>
                <?php 
                require __DIR__ . DIRECTORY_SEPARATOR . 'menu.php';
                echo genererMenu($items); 
                ?>
            </ul>
        </nav>

        <!-- <pre><?php print_r($_SERVER); ?></pre> -->

    </header>
   <main>