<h1>AJOUT PRODUIT</h1>

<?php
if (!isset($_SESSION["is_admin"])) {
    header('Refresh:3; url=./index.php?page=blog');
    echo "<h3>Vous n'avez pas accès à cette page car vous nêtes pas administrateur.<br>Redirection vers la page de blog...";
} else {
    if (isset($_SESSION["is_admin"])) {
?>

        <form method="POST" class="ajoutArticle" enctype="multipart/form-data">
            <input name="nom" type="text" autofocus placeholder="Nom du produit..."><br>
            <textarea name="description" type="text" placeholder="Description du produit..."></textarea><br>
            <input name="prix" type="text" placeholder="Prix du produit..."><br>
            <input name="image" type="file"><br>
            <input name="categorie" type="text" placeholder="Numéro catégorie..."><br><br>
            <input type="submit">
        </form><br><br><br>

<?php
        if (isset($_POST['nom'])) {
            $nom = $_POST['nom'];
            $image = $_FILES['image']['name'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            if ($nom == "" || $image == "" || $categorie == "" || $description == "" || $prix == "") {
                echo 'Vous devez inscrire quelque chose dans tous les champs';
            } else {
                if ($categorie == "moto") {
                    $categorie = 1;
                } elseif ($categorie == "equipement") {
                    $categorie = 2;
                } elseif ($categorie == "goodies") {
                    $categorie = 3;
                }

                $ajout = "INSERT INTO produits (nom_produit, image_produit, description_produit, prix_produit, id_categorie) VALUES (:nom, :image, :description, :prix, :categorie)";

                $requete = $connexion->prepare($ajout);
                $requete->execute([
                    ':nom' => $nom,
                    ':image' => $image,
                    ':description' => $description,
                    ':prix' => $prix,
                    ':categorie' => $categorie
                ]);
                // header('Refresh:2');
                echo "Vous Venez d'ajouter un produit avec succès !";
            }
        }
    }
}
?>

<h3>Retour à la page d'administration <a href="./index.php?page=administration">ICI</a> !</h3>