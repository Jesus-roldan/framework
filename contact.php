<?php 
$metaDescription="page contact";
$titre="contact";

require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'header.php';
?>

<h1>contact</h1>
<form method="post" action="<?= BASE_URL ?>controller/contactController.php">
    <p>
    <label for="nom" class="obligatoire"> Nom :</label>
    <input type="text" name="nom" id="nom" placeholder="Champ obligatoire" required minlength="2" maxlength="255" />
    <?= $erreur['nom'] ?? '' ?>
    </p>
    <p> 
	<label for="prenom">   Prénom : </label>
    <input type="text" name="prenom" id="prenom" minlength="2" maxlength="255"/>
    <?= $erreur['prenom'] ?? '' ?>
	</p>
	<p>
	<label for="email" class="obligatoire">E-Mail : </label>
    <input type="email" name="email" id="email" placeholder="Champ obligatoire" required />
    <?= $erreur['email'] ?? '' ?>
    </p>
    <p>
    <label for="message" class="obligatoire">message</label><br>
    <textarea name="message" id="message" rows="5" minlength="10" maxlength="3000" required></textarea>
    <?= $erreur['message'] ?? '' ?>
    </p>
    <p>
        <input type="submit" value="Envoyer">
    </p>
</form>

<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'footer.php';
?>