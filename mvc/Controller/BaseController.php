<?php

namespace Controller;

class BaseController
{
    public function afficherVue($fichier, $parametre=[])
    {

        extract($parametre);

        //Si le controleur actuel est Controller\ProduitControlleur
        //$dossier contiendra "Produit"
        $dossier = substr(get_class($this), 11, -10);

        include("View/" . $dossier . "/" . $fichier . ".php");
    }
}
