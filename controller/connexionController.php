<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionSession.php';
initialiserSession();
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'gestionBdd.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . '/gestionAuthentification.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . '/gestionFormulaire.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . '/utilisateursModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $mdp = $_POST['mdp'] ?? '';

    if (!empty($pseudo) && !empty($mdp)) {
        $pdo = obtenirConnexionBdd();

        if (verifierConnexionUtilisateur($pdo, $pseudo, $mdp)) {
            session_regenerate_id(true);
            connecterUtilisateur($pdo, $pseudo);
            header('Location: ' . BASE_URL . 'profil.php');
            exit;
        } else {
            echo "Pseudo ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>