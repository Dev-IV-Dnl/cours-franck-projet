<?php

namespace Controller;

use Dao\UtilisateurDao;

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
        header("Location: /moto_mvc/");
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
            if ($utilisateur) {
                if (password_verify($_POST["mot_de_passe"], $utilisateur->getMotDePasse()))
                    $_SESSION["pseudo"] = $utilisateur->getPseudo();
                $_SESSION["message"] = "<center><p>Vous êtes connecté en tant qu'utilisateur.</p></center>";
                $_SESSION["importance_message"] = "info"; // pour définir la couleur via bootswatch (voir BaseController ou est le echo)
                if ($utilisateur->getAdmin()) {
                    $_SESSION["admin"] = $utilisateur->getAdmin();
                    $_SESSION["message"] = "<center><p>Vous êtes connecté en tant qu'administrateur.</p></center>";
                }
                // header("Location: /moto_mvc/");
                echo '<script language="Javascript">
                        <!--
                            setTimeout(function(){ document.location.replace("/moto_mvc/") }, 2000);
                        // -->
                        </script>';
                die();
            } else {
                echo "<h3>Mauvais Pseudo ou Mot de Passe</h3>";
            }
        }
        $this->afficherVue("connexion");
    }
}
