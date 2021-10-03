<center>
<h1>S'inscrire</h1>
<div class="blocInscription">
<form action="" method="post">

    <input type="text" placeholder="Pseudo / Email" name="pseudo" value="<?= ($_POST['pseudo'] ?? '' ) ?>" id=""><br>
    <input type="password"  placeholder="Mot de passe" name="mot_de_passe" id=""><br>
    <input type="password"  placeholder="Confirmer mot de passe" name="confirmation_mot_de_passe" id=""><br>
    <input type="submit" class="btnConnexion" value="Connexion">
</form>
</div>
</center>