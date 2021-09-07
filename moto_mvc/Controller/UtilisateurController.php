<?php

namespace Controller;

use Dao\UtilisateurDao;
use Dao\ProduitDao;
use Dao\PanierDao;

class UtilisateurController extends Controller
{
    public function inscription()
    {
        if (isset($_POST['pseudo'])) {
            if ($_POST['pseudo'] != "" && $_POST['mot_de_passe'] != "" && $_POST['confirmation_mot_de_passe'] != "") {
                $pseudo = $_POST['pseudo'];
                $motDePasse = $_POST['mot_de_passe'];
                $confirmationMotDePasse = $_POST['confirmation_mot_de_passe'];

                if ($motDePasse != $confirmationMotDePasse) {
                    echo '<h3>Confirmez bien le même mot de passe, recommencez SVP !</h3>';
                } else {
                    $dao = new UtilisateurDao();
                    $dao->creationUtilisateur($pseudo, $motDePasse, $confirmationMotDePasse);
                    header("Location: /moto_mvc/utilisateur/connexion");
                }
            }
        }
        $this->afficherVue("inscription");
    }

    public function deconnexion()
    {
        session_destroy();
        echo '<script language="Javascript">
                        <!--
                            setTimeout(function(){ document.location.replace("/moto_mvc/") }, 2000);
                        // -->
                        </script>';
        echo '<br><h3>Vous vous êtes déconnecté avec succès, retour à la pager d\'accueil ou cliquez <a href="/moto_mvc/">ICI</a> !</h3>';
    }

    public function connexion()
    {
        //Si l'utilisateur a validé le formulaire
        if (isset($_POST["pseudo"])) {
            //On vérifie que l'utilisateur existe bien dans la bdd
            $dao = new UtilisateurDao();
            $utilisateur = $dao->findByPseudo(
                $_POST["pseudo"]
            );

            //s'il existe bien, mettre
            //s'il existe bien, mettre
            if ($utilisateur && password_verify($_POST["mot_de_passe"], $utilisateur->getMotDePasse())) {
                $_SESSION["pseudo"] = $utilisateur->getPseudo();
                $_SESSION["message"] = "<center><p>Vous êtes connecté en tant qu'utilisateur.</p></center>";
                $_SESSION["importance_message"] = "info"; // pour définir la couleur via bootswatch (voir Controller ou est le echo)
                    if ($utilisateur->getAdmin()) {
                        $_SESSION["admin"] = $utilisateur->getAdmin();
                        $_SESSION["message"] = "<center><p>Vous êtes connecté en tant qu'administrateur.</p></center>";
                    }
                    header("Location: /moto_mvc/");
                    die();
                
            } else {
                echo "Mauvais Pseudo ou Mot de Passe";
            }
        }
        $this->afficherVue("connexion");
    }

    public function panier()
    {
        if (!isset($_SESSION['pseudo'])) {
?>
            <h1 style="margin-bottom: 60px;">VOTRE PANIER</h1>
            <h3>Vous devez être inscrit en tant qu'utilisateur et connecté sur ce site pour avoir un panier !<br>Lancez-vous <a href="/moto_mvc/View/Utilisateur/connexion">ICI</a> !</h3>
        <?php
        } else {
        ?>
            <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?> !<br>Finalise ta commande ici !</h1>
<?php
            $dao = new PanierDao();
            $listePanier = $dao->findAllPanier($_SESSION['id_utilisateur']);
            $parametre = compact(["listePanier"]);
            $this->afficherVue("panier", $parametre);
        }
    }
}
