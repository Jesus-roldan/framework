<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once __DIR__. DIRECTORY_SEPARATOR .'gestionBdd.php';
require_once dirname(__DIR__). DIRECTORY_SEPARATOR .'models'. DIRECTORY_SEPARATOR . 'utilisateursModel.php';

$pdo = obtenirConnexionBdd();

function connecterUtilisateur(PDO $pdo, string $pseudo): void
{
   $utilisateur = obtenirIdUtilisateurParPseudo($pdo, $pseudo);
    if ($utilisateur !== null) {
          $_SESSION['utilisateurId'] = $utilisateur;
        }
}
function estConnecte(){

 return isset($_SESSION['utilisateurId']);

}
function deconnecterUtilisateur(){

 unset($_SESSION['utilisateurId']);
 session_destroy();

}
