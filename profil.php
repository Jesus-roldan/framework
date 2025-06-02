<?php 

$metaDescription="page profil";
$titre="profil";

require __DIR__ . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'profilController.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();  
}
?>

 <h1>Profil</h1>
   

    <p><strong>Pseudo :</strong> <?= htmlspecialchars($utilisateur['uti_pseudo']) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($utilisateur['uti_email']) ?></p>

    
    <form method="post" action="<?= BASE_URL ?>core/gestionDeconnexion.php">
        <button type="submit">Déconnexion</button>
    </form>
    
<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'footer.php';
?>