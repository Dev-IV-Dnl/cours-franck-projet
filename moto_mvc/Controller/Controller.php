<?php

namespace Controller;

class Controller
{
    public function afficherVue($fichier, $parametre = [])
    {
        if(isset($_SESSION["message"])){
            ?>
                <script>
                    setTimeout(supprimeMessage, 3000);
                    function supprimeMessage(){
                        const message = document.querySelector("#message");
                        message.remove();
                    }
                </script>
                <center>
                <div id="message" class="alert alert-dismissible alert-<?php echo $_SESSION["importance_message"] ;?>">
                    <button onclick="supprimeMessage()" type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <h4 class="alert-heading"><?php echo $_SESSION["message"];?></h4>
                </div>
                </center>
            <?php
                unset($_SESSION["message"]);
            }

        extract($parametre);

        //Si le controleur actuel est Controller\produitsControlleur
        //$dossier contiendra "produits"
        $dossier = substr(get_class($this), 11, -10);

        include("View/" . $dossier . "/" . $fichier . ".php");
    }
}
