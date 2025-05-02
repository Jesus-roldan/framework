<?php

function confirmerEcrasementFichier(string $cheminFichier): ?bool
{
    if (!file_exists($cheminFichier))
    {
        return null;
    }

    $reponse = readline ("Le fichier $cheminFichier existe déjà. Voulez-vous l\'écraser? (oui/non) :");

    $reponse = strtolower(trim($reponse));

    if ($reponse === "oui")
    {
        
        return true;
    }
     elseif ($reponse === "non")
    {
        return false;
    }
    else 
    {
        echo "Réponse non valide";
        return false;
    }
}


?>