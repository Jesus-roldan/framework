<?php 
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionBdd.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . '/gestionAuthentification.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . '/gestionFormulaire.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . '/utilisateurModel.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'envoyerEmail.php';
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$erreurs, $valeurs] = traiterFormulaireContact($_POST);

    if (empty($erreurs)) {
        if (envoyerEmail($valeurs)) {
            echo "<p>Formulaire de contact envoyé avec succès !</p>";
        } else {
            echo "<p>Une erreur est survenue lors de l'envoi de l'e-mail.</p>";
        }
    } else {
        echo "<p>Le formulaire de contact contient des erreurs.</p>";
    }
}  

function envoyerEmail($valeurs){

    $nom = $valeurs['nom'];
    $expediteur = $valeurs['email'];
    $destinataire = "jesus.roldan82@hotmail.com";
    $sujet = "Projet Framework - Formulaire de contact";
    $message = $valeurs['message'];
    
    $entetes = [
        "From" => $expediteur,
        "MIME-Version" => "1.0",
        "Content-Type" => "text/html; charset=\"UTF-8\"",
        "Content-Transfer-Encoding" => "quoted-printable"
    ];

    ob_start();
    ?>
     <html>
        <head><title><?= htmlspecialchars($sujet) ?></title></head>
        <body>
            <h2>Nouveau message du formulaire de contact</h2>
            <p><strong>Nom :</strong> <?= htmlspecialchars($nom) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($expediteur) ?></p>
            <p><strong>Sujet :</strong> <?= htmlspecialchars($sujet) ?></p>
            <p><strong>Message :</strong><br><?= nl2br(htmlspecialchars($message)) ?></p>
        </body>
        </html>"
    <?php
    $message = ob_get_clean();
    $message = quoted_printable_encode($message);

     return mail($destinataire, $sujet, $message, implode("\r\n", $entetes));
}


?>