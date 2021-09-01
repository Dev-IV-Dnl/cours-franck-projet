<?php

namespace Dao;

class BaseDao
{
    /**
    Retourne le nom de la table correspondant au dao qui appelle cette méthode
    Exemple : si l'objet qui appelle nomTable() a été créé avec la classe produitsDao,
    alors cette méthode retournera "produits".
     */
    public function nomTable()
    {
        //On récupère le nom de la classe qui a fait le dao actuel (ex : Dao\produitsDao ou Dao\UtilisateurDao, ...)
        // On en déduit le nom de la table correspondante (produits, utilisateur, etc...)
        //Etape 1 On supprime le préfixe "Dao\" et le suffixe "Dao" :
        $table = substr(get_class($this), 4, -3);
        //etape 2 : On écrit le tout en minuscule :
        $table = strtolower($table);
        return $table;
    }
    /**
     * Retourne un objet d'un type selon le DAO appelé
     * exemple : Si c'est un objet créé via la classe produitsDao qui appelle cette méthode,
     * alors l'objet retourné sera du type Model\produits
     * Le modèle retourné aura son id égale au parametre $id
     * 
     * Si aucun enregistrement en bdd ne correspond à l'id passé en paramètre,
     * alors la méthode renverra false
     */
    public function findById($id)
    {
        $table = $this->nomTable();
        $connexion = new \ConnexionDb();
        $requete = $connexion->prepare("SELECT * FROM " . $table . " WHERE id_produit = :id_produit");
        $requete->execute([":id_produit" => $id]);
        $resultat = $requete->fetch();

        if (!$resultat) {
            return false;
        }
        return $this->transformeTableauEnModel($resultat);
    }
    /**
     * Retourne un model correspondant au dao qui appelle cette méthode
     * Si le dao actuel est de type produitsDao, alors le modèle qui sera retourné sera de type :
     * Model\produits
     * Pour chaque index du tableau (ex : "id", "designation", "prenom", etc..), on en déduit le setter correspondant (setId, setDesignation, setPrenom, ...) que l'on appelle en passant la valeur en paramètre.
     */
    public function transformeTableauEnModel($tableau)
    {   //On déduit le nom du modèle via le nom de la table
        // (que l'on avait lui même déduit en se basant sur le type du DAO)
        $nomClasseModel = "\Model\\" . ucfirst($this->nomTable());
        //On crée une nouvelle instance de ce modèle
        //ex : new \Model\produits();
        $model = new $nomClasseModel();
        //Pour chaque colonne dans la bdd,
        //on appelle le setter correspondant en lui passant la valeur en paramètre
        foreach ($tableau as $nomColonne => $valeur) {
            //ex avec la colonne "prix_ht"
            //On remplace les underscores par des espaces (donne "prix ht")
            $nomSetter = str_replace("_", " ", $nomColonne);
            //on ajoute une majuscule à tous les mots (donne "Prix Ht")
            $nomSetter = ucwords($nomSetter);
            //onsupprime les espaces (donne "PrixHt")
            $nomSetter = str_replace(" ", "", $nomSetter);
            //on ajoute le préfice "set" (donne "setPrixHt")
            $nomSetter = "set" . $nomSetter;
            // ou en une seule ligne : 
            // $nomSetter = "set".str_replace(" ", "", ucwords(str_replace("_", " ", $nomColonne)));

            //Si le setter correspondant n'existe pas, on ne l'appelle pas !
            if (\method_exists($model, $nomSetter)) {
                $model->$nomSetter($valeur);
            }
        }
        return $model;
    }

    public function findAll()
    {
        $table = $this->nomTable();

        $connexion = new \ConnexionDb; // on utulise la classe faite dans ConnexionDb.php

        $requete = $connexion->prepare("SELECT * FROM " . $table);

        var_dump($requete);
        $requete->execute();
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
}
