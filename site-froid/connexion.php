<?php

if(isset($_POST['pseudo']) && isset($_POST['mot_de_passe'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mot_de_passe'];

    // $sql = "SELECT * FROM administrateur WHERE pseudo = '$pseudo' AND mot_de passe = '$mdp'";
    $sql = 'SELECT * FROM administrateur WHERE pseudo = "' .$_POST["pseudo"].'" AND mot_de_passe = "'.$_POST["mot_de_passe"].'"';

    // $connexion = new PDO("mysql:host=localhost:3306;dbname=correction-11juin;charset=UTF8", "root", "");

    $resultat = $connexion->query($sql);

    $administrateur = $resultat->fetch();

    if(!$administrateur) {
        echo 'Mauvais login / mot de passe';
    } else {
        $_SESSION['pseudo'] = $pseudo;
        header('Location: index.php?page=ajout-article');

    }
}


?>

<form method="post">
    <input type="text" name="pseudo" autofocus placeholder="Votre pseudo"><br>
    <input type="password" name="mot_de_passe" placeholder="Votre mot de passe"><br>
    <input type="submit" value="Connexion">
</form>