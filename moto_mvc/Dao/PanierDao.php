<?php

namespace Dao;
use \Dao\ProduitDao;

class PanierDao extends BaseDao
{

    public function findAllPanier($idUtilisateur)
    {
        $connexion = new \ConnexionDb();
        $daoProduit = new ProduitDao();

        $requete = $connexion->query("SELECT nom_produit, image_produit, description_produit, prix_produit, date_publication FROM panier
        INNER JOIN utilisateur USING(id_utilisateur)
        INNER JOIN produit USING(id_produit)
        WHERE id_utilisateur='" . $idUtilisateur . "';");

        $resusltat = $requete->fetchAll();

        $listeModel = [];

        //Pour chaque enregistrement de la table $table (produits, utilisateur, etc..)
        foreach ($resusltat as $ligneResultat) {
            $model = $daoProduit->transformeTableauEnModel($ligneResultat);
            //on ajoute le produits à la liste des produitss
            $listeModel[] = $model;
        }
        return $listeModel;
    }
}