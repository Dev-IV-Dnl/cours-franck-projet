<?php

namespace Dao;

class UtilisateurDao extends BaseDao
{

    public function creationUtilisateur($pseudo, $motDepasse)
    {


        $inscriptionUtilisateur = "INSERT INTO utilisateur (pseudo, mot_de_passe)
                    VALUES (:pseudo, :mot_de_passe)";

        $connexion = new \ConnexionDb();

        $requete = $connexion->prepare($inscriptionUtilisateur);
        $requete->execute([
                ':pseudo' => $pseudo,
                ':mot_de_passe' => password_hash($motDepasse, PASSWORD_BCRYPT)
            ]);
    }

    public function findByPseudo($pseudo)
    {
        $connexion = new \ConnexionDb();

        $requete = $connexion->prepare(
            "SELECT *
            FROM utilisateur
            WHERE pseudo = :pseudo"
        );

        $requete->execute([
            ":pseudo" => $_POST["pseudo"]
        ]);

        $utilisateur = $requete->fetch();
        //si l'utilisateur existe bien, alors on retourne un objet utilisateur qui le représente
        if ($utilisateur) {
            return $this->transformeTableauEnModel($utilisateur);
        }
        //sinon on retourne false
        return false;
    }
}
