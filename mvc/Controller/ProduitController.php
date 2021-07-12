<?php

namespace Controller;

// use Model\Produit;
// use PDO;

class ProduitController
{
    public function index()
    {
        echo "Bienvenue sur la page des produits";
    }

    public function afficherProduit()
    {
        $connexion = new \PDO("mysql:dbname=mvc;host:localhost:3306;charset:UTF8", "root", "");

        $requete = $connexion->prepare("SELECT * FROM produit");
        $requete->execute();
        $resusltat = $requete->fetchAll();

        $listeProduit = [];

        foreach ($resusltat as $ligneResultat) {

            $produit = new \Model\Produit();
            //on change les propriétés du produit en fonction de l'enregistrement dans la bdd
            $produit->setId($ligneResultat["id"]);
            $produit->setDesignation($ligneResultat["designation"]);
            $produit->setPrixHt($ligneResultat["prix_ht"]);
            $produit->setTva($ligneResultat["tva"]);

            //on ajoute le produit à la liste des produits
            $listeProduit[] = $produit;

            include("./View/listeProduit.php");
        }
    }
}
