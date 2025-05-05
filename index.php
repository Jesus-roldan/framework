<?php 
$metaDescription="page accueil";
$titre="accueil";
require __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'config/config.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'core/gestionBdd.php';
?>

<link rel="stylesheet" href="assets/styles.css">

<!-- <?php
$pdo=obtenirConnexionServeur();
creerBaseDeDonnees($pdo);
$pdoconnexion=obtenirConnexionBdd();
creerTableUtilisateur($pdoconnexion);

?> -->

<h1>accueil</h1>

<h2>Bienvenue sur votre site web !</h2>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime recusandae, enim voluptate ea optio iusto incidunt. Vel vero accusamus eligendi ab dolores, in doloremque, eveniet ipsa numquam eaque suscipit minus?</p>
<p>Modi ex consequatur aperiam, assumenda officiis quae neque laboriosam. Veniam quod laudantium ratione facilis, quidem unde quis consequatur! Cupiditate eaque vero asperiores dolorem cum rerum nam, voluptatem suscipit exercitationem fuga?</p>



<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'footer.php';
?>