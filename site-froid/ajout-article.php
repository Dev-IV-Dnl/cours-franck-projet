<?php

if(!isset($_SESSION['pseudo'])) {
    header('refresh: 5; url=./index.php?page=connexion');
?>

    <p>Vous allez être rédirigé vers la page de connexion, si ça n'est pas le cas, cliquez <a href="./index.php?page=connexion">ici</a> !</p>

<?php
} else {
    
    echo 'Bienvenue administrateur '.$_SESSION['pseudo'].' !';
?>


<br><a href="./index.php?page=deconnexion">
    Deconnexion
</a>

<?php


    if(isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['prix'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];

        if($nom!="" && $description!="" && $prix!="") {

            $sql = "INSERT INTO article (nom, description, prix) VALUES ('$nom', '$description', '$prix')";

            // $connexion = new PDO("mysql:host=localhost:3306;dbname=correction-11juin;charset=UTF8", "root", "");

            $connexion->query($sql);
        } else {
            echo '<h3>Tous les champs doivent être remplis !</h3>' ;
        }
    }
    ?>

    <form method="POST">
        <input type="text" name="nom" placeholder="Nom" autofocus><br>
        <input type="text" name="description" placeholder="Description"><br>
        <input type="text" name="prix" placeholder="Prix"><br>
        <input type="submit">
    </form>

<?php    
}
?>
