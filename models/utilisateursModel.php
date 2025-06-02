<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionBdd.php';

obtenirConnexionBdd();
function insererUtilisateurs(PDO $pdo, array $valeurs): void
{
    try {
        $requete = "
        INSERT INTO t_utilisateur_uti 
        (uti_pseudo, uti_email, uti_motdepasse, uti_compte_active, uti_code_activation) 
        VALUES (:pseudo, :email, :mdp, 1, NULL)";

        $stmt = $pdo->prepare($requete);

        $stmt->bindValue(':pseudo', $valeurs['pseudo'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $valeurs['email'], PDO::PARAM_STR);
        $stmt->bindValue(':mdp', password_hash($valeurs['mdp'], PASSWORD_DEFAULT), PDO::PARAM_STR);

        $stmt->execute();

    } catch (PDOException $e) {
        gererExceptions($e);
        die();
    }
}
function verifierConnexionUtilisateur(PDO $pdo, string $pseudo, string $mdp): bool
{
    try{
        $requete = "SELECT uti_motdepasse FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo";

        $stmt = $pdo-> prepare($requete);

        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        $stmt->execute();
         
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultat && isset($resultat['uti_motdepasse'])) {
            return password_verify($mdp, $resultat['uti_motdepasse']);
        }
        return false;  
             
    }catch(PDOException $e) {
        gererExceptions($e);
        return false;
    }
}
function obtenirIdUtilisateurParPseudo(PDO $pdo, string $pseudo): ?int {
    try {
        $requete = "SELECT uti_id FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo";
        $stmt = $pdo->prepare($requete);
        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        return $utilisateur ? (int)$utilisateur['uti_id'] : null;
    
    } catch (PDOException $e) {
        gererExceptions($e);
        return null;
    }
}
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