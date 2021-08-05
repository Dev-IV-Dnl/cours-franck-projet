<h1>MODIFIER PRODUIT</h1>


<?php
if (!isset($_SESSION["is_admin"])) {
    header('Refresh:3; url=./index.php?page=blog');
    echo "<h3>Vous n'avez pas accès à cette page car vous nêtes pas administrateur.<br>Redirection vers la page de Blog...";
} else {
    echo '<br><h3>Bienvenue ' . $_SESSION["pseudo"] . ' !';
}
?>

<br><br>
<h3>Retour à la page d'administration <a href="./index.php?page=administration">ICI</a> !</h3>