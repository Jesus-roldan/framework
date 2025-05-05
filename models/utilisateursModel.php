<?php

require __DIR__ . DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionBdd.php';

function selectionnerUtilisateurParSonEmail($email)
{
    try
    {
        
        $pdo = obtenirConnexionBdd();
        
        $email = strtolower($email);

        $requete = "SELECT * FROM t_utilisateur_uti WHERE uti_email = :email";
    
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
        gererExceptions($e);
    }
    finally
    {
        $pdo = null;
    }
}
function ajouterUtilisateur($nom,$email,$prenom=null){

    try{

    $pdo = obtenirConnexionBdd();

    $email = strtolower($email);

    $requete = "INSERT INTO t_utilisateur_uti (uti_nom, uti_prenom, uti_email) VALUES (:nom, :prenom, :email)";
        
    $stmt = $pdo->prepare($requete);

    $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Retourner l'ID du dernier utilisateur ajouté
        return $pdo->lastInsertId();
    } else {
        return false;
    }
    }
        catch(PDOException $e){
            gererExceptions($e);
        }
        finally{
            $pdo = null;
        }
}
?>