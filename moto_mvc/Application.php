<?php
class Application
{
    public static function demarrer()
    {
        //chemmin contient par exemple : /produits/afficher/42
        //si l'utilisateur a renseigné l'URL : localhost/.../produits/afficher/42
        $chemin = $_GET["page"];

        //Si le chemin se finit avec un /, on le supprime.
        $chemin = rtrim($chemin, "/");
        // produits serait alors le CONTROLLER à utiliser
        // aficher serait l'ACTION à effectuer (la méthode du controlleur)
        // 42 serait le paramètre

        //On découpe l'url en plusieurs parties :
        //1 : nom du controller
        //2 : Nom de l'action
        $partieUrl = explode("/", $chemin);
        //Si l'utilisateur a omis la première partie de l'url,
        // alors la controller sera AccueilController (bien lire le if else qui suit):
        if (isset($partieUrl[0]) && $partieUrl[0] != "") {
            //Si $partieUrl[0] contient accueil, $nomController contriendra : AccueilController
            $nomController = "Controller\\" . ucfirst($partieUrl[0]) . "Controller";
        } else {
            $nomController = "Controller\AccueilController";
        }
        //Si l'utilisateur a bien saison la deuxième partie de l'utl,
        //sinon on utilise la méthode index
        if (isset($partieUrl[1])) {
            $nomAction = $partieUrl[1];
        } else {
            $nomAction = "index";
        }
        // bonus version ternaire du isset : 
        //$nomAction = (isset($partieUrl[1]) && $partieUrl[1]!="") ? $partieUrl[1] : "index";

        //si le controller ou la méthode n'existent pas (dans le controller)
        //alors on affiche une page 404.
        if (!method_exists($nomController, $nomAction)) {
            $nomController = "Controller\AccueilController";
            $nomAction = "nonTrouve";
        }

        $parametres = array_slice($partieUrl, 2);

        $controller = new $nomController();
        $controller->$nomAction($parametres);
    }
}
