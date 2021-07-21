<h1>BLOG</h1>

<?php

$listeMotos = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='motos'
ORDER BY id_produit DESC;")->fetchAll();

// $listeArticles = $resultat->fetchAll();

foreach ($listeMotos as $motos) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($motos['date_publication']));
?>
    <a style="text-decoration:none;" href="./index.php?page=article&article=<?php echo $motos["id_produit"];?>">
        <article>

            <img class="imageProduit" src="./assets/images/produits/<?php echo $motos["image_produit"]; ?>" alt="image motoCross" title="Image de MotoCross">

            <div class="produit">
                <h2><?php echo $motos["nom_produit"]; ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if(strlen($motos["description_produit"])>120) {
                            echo '<span>'.substr($motos["description_produit"], 0, 120).'</span>';
                            echo "<br><a href='#'>En lire plus...</a>";
                        } else {
                            echo '<span>'.$motos["description_produit"].'</span>';
                        }
                        // echo "<br>".strlen($article["description"]);
                    ?></p>
                </div>

                <h4><?php echo $motos["prix_produit"]; ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>
                <?php
                if (isset($_SESSION['pseudo'])) {
                ?>
                    <form method="POST">
                        <input type="hidden" name="idArticle" value="<?php echo $motos['id_produit']; ?>">
                        <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </form>
                <?php
                }
                ?>

            </div>
        </article>
    </a>
<?php
}

if (isset($_POST['ajouterAuPanier'])) {
    $ajouteUnArticleAuPanier = "INSERT INTO panier (id_produit, id_utilisateur)
    VALUES (:id_article, :id_utilisateur)";

    $requete = $connexion->prepare($ajouteUnArticleAuPanier);
    $requete->execute([
        ":id_utilisateur" => $_SESSION['id'],
        ":id_article" => $_POST["idArticle"]
    ]);
}
?>