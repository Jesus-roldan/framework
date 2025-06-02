<?php 
$metaDescription="page inscription";
$titre="inscription";

require_once __DIR__ . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionAuthentification.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'header.php';

if (estConnecte()) {
    header("Location: profil.php");
    die();
}
?>
<h1>inscription</h1>

    <form action="<?= BASE_URL ?>controller/inscriptionController.php" method="POST">

        <input type="hidden" name="type_formulaire" value="inscription">
        <p>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="inscription_pseudo" id="pseudo" required minlength="2" maxlength="255"><br>
        </p>
        <p>
        <label for="email">Email :</label>
        <input type="email" name="inscription_email" id="email" required><br>
        </p>
        <p>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="inscription_motDePasse" id="mdp" required minlength="8" maxlength="72"><br>
        </p>
        <p>
        <label for="mdp_conf">Confirmer le mot de passe :</label>
        <input type="password" name="inscription_motDePasse_confirmation" id="mdp_conf" required minlength="8" maxlength="72"><br>
        </p>
        <button type="submit">S'inscrire</button>
    </form>

<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'footer.php';
?>