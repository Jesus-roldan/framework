<?php 
$metaDescription="page contact";
$titre="contact";
require __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
?>

<h1>contact</h1>
<form method="post" action="/gestion_formulaires.php">
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
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!empty($nom) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL))
    {

    $expediteur = "bot@imosup.waf.be";
    $destinataire = "jesus.roldan82@hotmail.com";
    $sujet = "Projet Framework - Formulaire de contact";
    // $message = "Contenu du courriel...";

    $contenu = "<html><body>";
    $contenu .= "<h2>Nouveau message de contact</h2>";
    $contenu .= "<p><strong>Nom:</strong> " . htmlspecialchars($nom) . "</p>";
    $contenu .= "<p><strong>Prénom:</strong> " . htmlspecialchars($prenom) . "</p>";
    $contenu .= "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    $contenu .= "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
    $contenu .= "</body></html>";

    $entetes = [
        "From" => $expediteur,
        "MIME-Version" => "1.0",
        "Content-Type" => "text/html; charset=\"UTF-8\"",
        "Content-Transfer-Encoding" => "quoted-printable"
    ];

        if (mail($destinataire, $sujet, $message, $entetes))
        {
            echo "Le courriel a été envoyé avec succès.";
        }
        else
        {
            echo "L'envoi du courriel a échoué.";
        }
    }
    else
    {
            echo "<p>Veuillez remplir tous les champs obligatoires correctement.</p>";
    }
}
?>

<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'footer.php';
?>