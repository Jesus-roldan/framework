<?php 
$metaDescription="page inscription";
$titre="inscription";
require __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
?>

<link rel="stylesheet" href="assets/styles.css">



<h1>Connexion</h1>
    <form action="gestion_formulaires.php" method="POST">
    <input type="hidden" name="type_formulaire" value="connexion">
        <p>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" required minlength="2" maxlength="255"><br>
        </p>
        <p>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required minlength="8" maxlength="72"><br>
        </p>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore inscrit ? <a href="inscription.php">Créer un compte</a></p>

    
<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'footer.php';
?>