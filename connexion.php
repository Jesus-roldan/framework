<?php 
$metaDescription="page inscription";
$titre="inscription";
require __DIR__ . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionAuthentification.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'header.php';

if (estConnecte()) {
    header('Location:'. BASE_URL .'profil.php');
    die();
}
?>
<div id="connexion">
<h1>Connexion</h1>
    <form action="<?= BASE_URL ?>controller/connexionController.php" method="POST">
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

    <p>Pas encore inscrit ? <a href="<?= BASE_URL ?>inscription.php">Créer un compte</a></p>
</div>    
<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'footer.php';
?>