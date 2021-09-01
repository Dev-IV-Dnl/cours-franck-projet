<?php

namespace Controller;

class Controller
{
    public function afficherVue($fichier, $parametre = [])
    {

        extract($parametre);

        //Si le controleur actuel est Controller\produitsControlleur
        //$dossier contiendra "produits"
        $dossier = substr(get_class($this), 11, -10);

        include("View/" . $dossier . "/" . $fichier . ".php");
    }
}
