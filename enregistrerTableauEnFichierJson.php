<?php
function enregistrerTableauEnFichierJson(
    string $cheminfichier,
    array $tableau,
    bool $forcerEcrasement = false
): bool
{
if(!file_exists($cheminfichier) and $forcerEcrasement === false)
{
    $dossier=creerdossier($cheminfichier);
    return false;

    if($dossier===true)
    {
        json_encode($tableau);
        file_put_contents($cheminfichier,$tableau);
    }

}
else
{
    return true;
}





}


?>