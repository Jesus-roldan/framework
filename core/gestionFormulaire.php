<?php
function traiterFormulaireContact($entreeUtilisateur)
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

        if($email === '')
        {
            $erreur['email'] = "<p>L'email est requis!</p>";
        }
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        {
            $erreur['email'] = "<p>L'email n'est pas valide </p>";
        }

        if($message === '')
        {
            $erreur['message'] = "<p>Le message est requit!</p>";
        }
        elseif (mb_strlen($message) < 10 || mb_strlen($message) > 3000)
        {
            $erreur['message'] = "<p>Le message doit contenir entre 10 et 3000 caractères!</p>";
        }

        $valeurs = [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'message' => $message
        ];
        
    return [$erreur, $valeurs];
   
}  
function traiterFormulaireInscription(array $entreeUtilisateur): array
{
    $erreurs = [];
    $valeurs = [];

    $pseudo = htmlspecialchars(trim($entreeUtilisateur['inscription_pseudo'] ?? ''));
    $email = htmlspecialchars(trim($entreeUtilisateur['inscription_email'] ?? ''));
    $motDePasse = $entreeUtilisateur['inscription_motDePasse'] ?? '';
    $motDePasseConfirmation = $entreeUtilisateur['inscription_motDePasse_confirmation'] ?? '';

    if ($pseudo === '') {
        $erreurs['pseudo'] = "Le pseudo est requis.";
    } elseif (mb_strlen($pseudo) < 2 || mb_strlen($pseudo) > 255) {
        $erreurs['pseudo'] = "Le pseudo doit contenir entre 2 et 255 caractères.";
    }

    if ($email === '') {
        $erreurs['email'] = "L'email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "L'email n'est pas valide.";
    }

    if ($motDePasse === '') {
        $erreurs['motDePasse'] = "Le mot de passe est requis.";
    } elseif (mb_strlen($motDePasse) < 8 || mb_strlen($motDePasse) > 72) {
        $erreurs['motDePasse'] = "Le mot de passe doit contenir entre 8 et 72 caractères.";
    }

    if ($motDePasseConfirmation === '') {
        $erreurs['motDePasse_confirmation'] = "La confirmation est requise.";
    } elseif ($motDePasse !== $motDePasseConfirmation) {
        $erreurs['motDePasse_confirmation'] = "Les mots de passe ne correspondent pas.";
    }

    $valeurs = [
        'pseudo' => $pseudo,
        'email' => $email,
        'mdp' => $motDePasse
    ];

    return [$erreurs, $valeurs];
}
?>



