<?php
// Dao : Data Acces Objets

namespace Dao;

class ProduitDao extends BaseDao
{
    public function findAllByCategorie($categorie)
    {
        $table = $this->nomTable();

        $connexion = new \ConnexionDb; // on utulise la classe faite dans ConnexionDb.php

        $requete = $connexion->prepare("SELECT * FROM " . $table." INNER JOIN categorie USING(id_categorie) WHERE nom_categorie = ?");

        // var_dump($requete);
        $requete->execute(
            [
                $categorie
            ]
        );
        $resusltat = $requete->fetchAll();

        $listeModel = [];

        //Pour chaque enregistrement de la table $table (produits, utilisateur, etc..)
        foreach ($resusltat as $ligneResultat) {
            $model = $this->transformeTableauEnModel($ligneResultat);
            //on ajoute le produits à la liste des produitss
            $listeModel[] = $model;
        }
        return $listeModel;
    }

    public function findLastProducts($categorie)
    {
        $table = $this->nomTable();

        $connexion = new \ConnexionDb; // on utulise la classe faite dans ConnexionDb.php

        $requete = $connexion->prepare("SELECT * FROM ". $table." WHERE id_categorie = ? ORDER BY date_publication DESC LIMIT 1");

        $requete->execute(
            [
                $categorie
            ]
        );
        $resusltat = $requete->fetch();
        return $resusltat ? $this->transformeTableauEnModel($resusltat):false;
    }
}