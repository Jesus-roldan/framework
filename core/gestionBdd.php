<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'core' . DIRECTORY_SEPARATOR . 'gestionErreur.php';

function obtenirConnexionServeur(): PDO
{
    $config = obtenirConfigBdd();

    // Connexion uniquement au serveur, sans base
    $dsn = "mysql:host={$config['serveur']};charset=utf8mb4";

    $pdo = new PDO($dsn, $config['utilisateur'], $config['mdp']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}
function obtenirConnexionBdd(): PDO
{
    // Récupérer la configuration permettant d'établir une connexion à la base de données.
    $config = obtenirConfigBdd();

    // Construire le DSN (Data Source Name).
    $dsn = "mysql:host={$config['serveur']};dbname={$config['bdd']};charset=utf8mb4";

    // Établir connexion à la base de données.
    $pdo = new PDO($dsn, $config['utilisateur'], $config['mdp']);

    // Activer les Exceptions en cas d'erreur.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}
function creerBaseDeDonnees(PDO $pdo): void
{
    try {
        $sql = "CREATE DATABASE IF NOT EXISTS bdd_projet_web CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
        $pdo->exec($sql);
    } catch (PDOException $e) {
        gererExceptions($e);
        die();
    }
}

function creerTableUtilisateur(PDO $pdo): void
{
    try {
        $sql = "CREATE TABLE IF NOT EXISTS t_utilisateur_uti (
            uti_id INT AUTO_INCREMENT PRIMARY KEY,
            uti_pseudo VARCHAR(255) NOT NULL UNIQUE,
            uti_email VARCHAR(255) NOT NULL UNIQUE,
            uti_motdepasse VARBINARY(255) NOT NULL,
            uti_compte_active BOOLEAN NOT NULL DEFAULT 1,
            uti_code_activation CHAR(5) DEFAULT NULL
        ) ENGINE=InnoDB";
        $pdo->exec($sql);
    } catch (PDOException $e) {
        gererExceptions($e);
        die();
    }
}

function insererUtilisateurs(PDO $pdo, array $valeurs): void
{
    try {
        $requete = "
        INSERT INTO t_utilisateur_uti 
        (uti_pseudo, uti_email, uti_motdepasse, uti_compte_active, uti_code_activation) 
        VALUES (:pseudo, :email, :mdp, 1, NULL)";

        $stmt = $pdo->prepare($requete);

    $stmt->execute([
        ':pseudo' => $valeurs['pseudo'],
        ':email' => $valeurs['email'],
        ':mdp' => password_hash($valeurs['mdp'], PASSWORD_DEFAULT) 
    ]);

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

        $stmt->execute([':pseudo' => $pseudo]); 
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultat && isset($resultat['uti_motdepasse'])) {
            return password_verify($mdp, $resultat['uti_motdepasse']);
        }
        return false;  
             
    }catch(PDOException $e) {
        gererExceptions($e);
        return false;
        // die();
    }
}
?>