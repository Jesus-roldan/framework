

<?php
function envoyeremail ($valeurs){

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
        <head>
            <title>$sujet</title>
        </head>
        <body>
            <h2>Nouveau message du formulaire de contact</h2>
            <p><strong>Nom :</strong> <?=$nom?></p>
            <p><strong>Email :</strong> <?$expediteur?></p>
            <p><strong>Sujet :</strong> <?$sujet?></p>
            <p><strong>Message :</strong></p>
            <p><?$message?></p>
        </body>
        </html>"
    <?php
    $message = ob_get_clean();
    $message = quoted_printable_encode($message);

    if (mail($destinataire, $sujet, $message, $entetes))
    {
        echo "Le courriel a été envoyé avec succès.";
    }
    else
    {
        echo "L'envoi du courriel a échoué.";
    }

}
     

?>