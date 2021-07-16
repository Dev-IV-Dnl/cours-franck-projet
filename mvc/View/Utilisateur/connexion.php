<center>
<h1>Se connecter</h1>
<div class="blocConnexion">
<form action="" method="post">

    <input type="text" placeholder="Pseudo / Email" name="pseudo" value="<?= ($_POST['pseudo'] ?? '' ) ?>" id=""><br>
    <input type="password"  placeholder="Mot de passe" name="mot_de_passe" id=""><br>
    <input type="submit" class="btnConnexion" value="Connexion">
</form>
</div>
</center>