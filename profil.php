<?php 

$metaDescription="page profil";
$titre="profil";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'gestionAuthentification.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'core'. DIRECTORY_SEPARATOR .'gestionBdd.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'core'. DIRECTORY_SEPARATOR .'gestionErreur.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();  
}
if (!est_connecte()) {
    header("Location: connexion.php");
    die();
}


$pdo = obtenirConnexionBdd();
$utilisateurId =  $_SESSION['utilisateurId'];

try {
   
    $requete = "SELECT uti_pseudo, uti_email FROM t_utilisateur_uti WHERE uti_id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id', $utilisateurId, PDO::PARAM_INT);
    $stmt->execute();

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$utilisateur) {
        echo "Utilisateur introuvable.";
        exit;
    }

} catch (PDOException $e) {
    gererExceptions($e);
    exit("Erreur lors de la récupération du profil.");
}
?>


<link rel="stylesheet" href="assets/styles.css">



<h1>Profil</h1>
   

    <p><strong>Pseudo :</strong> <?= htmlspecialchars($utilisateur['uti_pseudo']) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($utilisateur['uti_email']) ?></p>

    
    <form method="post" action="/framework/gestionDeconnexion.php">
        <button type="submit">Déconnexion</button>
    </form>
    
<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'footer.php';
?>