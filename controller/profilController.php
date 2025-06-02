<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionBdd.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionAuthentification.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionErreur.php';

if (!estConnecte()) {
    header('Location: ' . BASE_URL . 'connexion.php');
    exit;
}

$pdo = obtenirConnexionBdd();
$utilisateurId = $_SESSION['utilisateurId'];

try {
    $requete = "SELECT uti_pseudo, uti_email FROM t_utilisateur_uti WHERE uti_id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id', $utilisateurId, PDO::PARAM_INT);
    $stmt->execute();

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$utilisateur) {
        
        die("Utilisateur introuvable.");
    }

} catch (PDOException $e) {
    gererExceptions($e);
    die("Erreur lors de la récupération du profil.");
}

return $utilisateur;