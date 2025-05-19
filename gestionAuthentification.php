<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once __DIR__. DIRECTORY_SEPARATOR .'core' . DIRECTORY_SEPARATOR . 'gestionBdd.php';

$pdo = obtenirConnexionBdd();

function connecter_utilisateur(PDO $pdo, string $pseudo): void
{
    try {
        $requete = "SELECT uti_id FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo";
        $stmt = $pdo->prepare($requete);
        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
          $_SESSION['utilisateurId'] = $utilisateur['uti_id'];
        }

    } catch (PDOException $e) {
        gererExceptions($e);
    }
}
function est_connecte(){

 return isset($_SESSION['utilisateurId']);

}
function deconnecter_utilisateur(){

 unset($_SESSION['utilisateurId']);
 session_destroy();

}
