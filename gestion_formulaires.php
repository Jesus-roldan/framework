<?php 
$metaDescription="page contact";
$titre="contact";
require __DIR__ . DIRECTORY_SEPARATOR . 'header.php'
?>
<?php
echo $_GET['nom'];
echo $_GET['prenom'];
echo $_GET['email']; 
echo $_GET['message'];
?>



<?php 
require __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'
?>