<h1>CONNEXION</h1>

<?php
if (isset($_SESSION['pseudo'])) {
?>
    <div class="lienQuandUtilisateurConnecte">
        <a href="./index.php?page=equipement">Aller sur la page d'équipements réservée aux utilisateurs.</a>
    </div>
<?php
} else {
?>
    <center>
        <form method='POST'>
            <label for='login'>Entrez votre Pseudo ainsi que votre mot de passe :</label><br><br>
            <input name='pseudo' type="text" placeholder='Pseudo...' autofocus autocomplete='off'><br>
            <input name='mot_de_passe' type='password' placeholder='Mot de Passe...' autocomplete='off'><br><br>
            <input type='submit' value='Connexion'>
        </form>

    <?php
}

if (isset($_POST["pseudo"]) && isset($_POST["mot_de_passe"])) {
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mot_de_passe"];

    $sql = "SELECT * FROM utilisateur WHERE pseudo= :pseudo";
    // (echo $sql)

    // $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //pas besoin car dans l'index fonction Bdd !

    $requete = $connexion->prepare($sql);
    $requete->execute([":pseudo" => $pseudo]);

    $utilisateur = $requete->fetch();

    if (!$utilisateur && !password_verify($mdp, $utilisateur["mot_de_passe"])) {
        echo 'Mauvais pseudo et mdp';
    } else {
        if ($utilisateur["is_admin"]) {
            $_SESSION["is_admin"] = $utilisateur["is_admin"];
        }
        $_SESSION['pseudo'] = $utilisateur['pseudo'];
        $_SESSION['id'] = $utilisateur['id'];
        if (isset($_SESSION['is_admin'])) {
            header('Refresh:2;url=index.php?page=administration');
            echo '<div class="messageConnexion">';
            echo '<h3>Bienvenue administrateur ' . $_SESSION["pseudo"] . '!<br> Redirection vers la page administration,<br>Sinon cliquez <a href="./index.php?page=administration">ICI</a> !</h3>';
            echo '</div>';
        } else {
            header('Refresh:2');
            echo '<div class="messageConnexion">';
            echo "<h3>Bonjour " . $_SESSION["pseudo"] . ", vous êtes bien connecté en tant qu'utilisateur !</h3>";
            echo '</div>';
        }
    }
}

    ?>