<?php

namespace Controller;

use Dao\ProduitDao;
use Dao\UtilisateurDao;

class ProduitController extends baseController
{
    public function index()
    {
        echo "Bienvenue sur la page des produits";
    }

    /**
     * Méthode accessible via l'url localhost/coursfranck/mvc/produit/afficherProduit/XXX
     * Où XX est égale à l'id du produit à afficher
     */
    public function afficherProduit($parametres){
        //Si la troisième partie de l'url existe bien
        if(isset($parametres[0])){
            //on crée une instance de produit doa pour récupérer la produit dans la bdd
            $dao = new ProduitDao();
            //On récupère le produit ayant l'id passée en 3ème partie de l'url
            $produit = $dao->findById($parametres[0]);
            
            if($produit){
                $parametre = compact("produit");
                $this->afficherVue("afficherProduit", $parametre);
            } else {
                echo "Le produit n'existe pas";
            }

        } else {
            echo "Il manque l'id du produit dans l'url ...";
        }
    }

    public function afficherListeProduits()
    {
        $daoUtilisateur = new UtilisateurDao();
        $listeUtilisateur = $daoUtilisateur->findAll();
        // \var_dump($daoUtilisateur->findAll());

        // $parametre = [
        //     "listeProduit" => $listeProduit,
        //     "listeUtilisateur" => $listeUtilisateur
        // ] voir ci-dessous :
        

        $dao = new ProduitDao();
        $listeProduit = $dao->findAll();

        $parametre = compact(["listeUtilisateur", "listeProduit"]);

        $this->afficherVue("listeProduit", $parametre);
    }
}
