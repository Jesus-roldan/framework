<?php


if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    [$erreur, $valeurs]=traiterFormulaire($_POST);

   if (empty($erreur))
   {
      echo $Message = "<p>Formulaire envoyé avec succès! </p>";
       $valeurs = [];
   }
   else{
    echo $MessageErreur="<p>Le formulaire n'a pas été envoyé ! </p>";
   }
}


function traiterFormulaire($entreeUtilisateur)
{


    $erreur=[];
    $valeurs=[];

  
        $nom = htmlspecialchars(trim($entreeUtilisateur['nom'] ?? ''));
        $email = htmlspecialchars(trim($entreeUtilisateur['email'] ?? ''));
        $message = htmlspecialchars(trim($entreeUtilisateur['message'] ?? ''));
        $prenom = htmlspecialchars(trim($entreeUtilisateur['prenom'] ?? ''));

        if($nom === '')
        {
            $erreur['nom'] = "<p>Le nom est requis!</p>";
        }
        elseif (mb_strlen($nom) < 2 || mb_strlen($nom) > 255)
        {
            $erreur['nom'] = "<p>Le nom doit contenir entre 2 et 255 caractères!</p>";
        }
        
        if($prenom !== '' && (mb_strlen($prenom) < 2 || mb_strlen($prenom) > 255))
        {
            $erreur['prenom'] = "<p>Le prenom doit contenir entre 2 et 255 caractères!</p>";
        }

        if($email == '')
        {
            $erreur['email'] = "<p>L'email est requis!</p>";
        }
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        {
            $erreur['email'] = "<p>L'email n'est pas valide </p>";
        }

        if($message == '')
        {
            $erreur['message'] = "<p>Le message est requit!</p>";
        }
        elseif (mb_strlen($message) < 10 || mb_strlen($message) > 3000)
        {
            $erreur['message'] = "<p>Le message doit contenir entre 10 et 3000 caractères!</p>";
        }

        if (!empty($erreur)) {
            $valeurs['nom'] = $nom;
            $valeurs['email'] = $email;
            $valeurs['message'] = $message;
            $valeurs['prenom'] = $prenom;
        }
        
    return [$erreur, $valeurs];
   
}  

?>



