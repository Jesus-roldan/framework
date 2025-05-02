<?php



function creerDossier(string $cheminDossier): bool
{
    if (is_dir($cheminDossier))
    {
        
        return false;
    }
    
    else
    {
        mkdir($cheminDossier);
        return true;
    }
   
}

?>