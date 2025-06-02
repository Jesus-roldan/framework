<?php 
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionBdd.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . '/gestionAuthentification.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . '/gestionFormulaire.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . '/utilisateursModel.php';

 
 
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$erreurs, $valeurs] = traiterFormulaireInscription($_POST);

    if (empty($erreurs)) {
        try {
            $pdo = obtenirConnexionBdd();
            insererUtilisateurs($pdo, $valeurs); 
            echo "Inscription réussie !";
        } catch (PDOException $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    } else {
        echo "Le formulaire d'inscription contient des erreurs.";
    }
}    
?>