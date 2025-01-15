<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription?>">
    <title><?=$titre?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="active"><a href="/index.php">Accueil</a></li>
                <li class="active"><a href="/contact.php">Contact</a></li>
            </ul>
        </nav>
        <pre>
        <?php
echo $_SERVER;
print_r($_SERVER);
?>
        </pre>




    </header>
   