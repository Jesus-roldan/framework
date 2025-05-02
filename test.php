<?php 

require __DIR__ . DIRECTORY_SEPARATOR . 'creerdossier.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'ecrasementfichier.php';

$cheminDossier =__DIR__ . DIRECTORY_SEPARATOR . 'creerdossier.php';
$resul = creerDossier($cheminDossier);

if ($resul === false) {
    echo "Le fichier existe.";
} 
else 
{
    echo "ha sido creado";
} 
 

$cheminFichier= $cheminDossier ;
$resultat= confirmerEcrasementFichier($cheminFichier);

if ($resultat === true) {
    echo "Le fichier sera écrasé.";
} elseif ($resultat === false) {
    echo "Le fichier ne sera pas écrasé.";
} else {
    echo "Le fichier n'existe pas, aucune action requise.";
}

?>


