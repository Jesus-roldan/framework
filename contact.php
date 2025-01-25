<?php 
$metaDescription="page contact";
$titre="contact";
require __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
?>
<link rel="stylesheet" href="/assets/styles.css">

<h1>contac</h1>
<form method="get" action="/gestion_formulaires.php">
    <p>
    <label for="nom" class="obligatoire"> Nom :</label>
    <input type="text" name="nom" id="nom" placeholder="Champ obligatoire" required minlength="2" maxlength="255" />
    </p>
    <p> 
	<label for="prenom">   Prénom : </label>
    <input type="text" name="prenom" id="prenom" minlength="2" maxlength="255"/>
	</p>
	<p>
	<label for="email" class="obligatoire">E-Mail : </label>
    <input type="email" name="email" id="email" placeholder="Champ obligatoire" required />
    </p>
    <p>
        <label for="message" class="obligatoire">message</label><br>
        <textarea name="message" id="message" rows="5" minlength="10" maxlength="3000" required></textarea>
    </p>
</form>

<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'gestion_formulaires.php';
?>


<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'footer.php';
?>