<h1>ACCUEIL </h1>

<?php

$resultat = $connexion->query("SELECT * FROM categories INNER JOIN produits USING(id_categorie) WHERE nom_categorie='motos' ORDER BY id_produit DESC LIMIT 1;");

$listeProduits = $resultat->fetchAll();

foreach ($listeProduits as $produits) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($produits['date_publication']));
?>
    <article>

        <img class="imageProduit" src="./assets/images/produits/<?php echo $produits["image_produit"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2>MOTO DU MOMENT :<br><?php echo $produits["nom_produit"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if (strlen($produits["description_produit"]) > 120) {
                        echo substr($produits["description_produit"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $produits["description_produit"];
                    }
                    // echo "<br>".strlen($article["description"]);
                    ?></p>
            </div>

            <h4><?php echo $produits["prix_produit"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>

            <button class="buttonPanier">
                <i class="fas fa-cart-plus"></i>
            </button>
        </div>
    </article>
<?php
}

$resultat = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='equipements'
ORDER BY id_produit DESC LIMIT 1;");

$listeProduits = $resultat->fetchAll();

foreach ($listeProduits as $produits) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($produits['date_publication']));
?>
    <article>

        <img class="imageProduit" src="./assets/images/produits/<?php echo $produits['image_produit']; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2>EQUIPEMENT DU MOMENT :<br><?php echo $produits["nom_produit"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if (strlen($produits["description_produit"]) > 120) {
                        echo substr($produits["description_produit"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $produits["description_produit"];
                    }
                    // echo "<br>".strlen($article["description"]);
                    ?></p>
            </div>

            <h4><?php echo $produits["prix_produit"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>

            <button class="buttonPanier">
                <i class="fas fa-cart-plus"></i>
            </button>
        </div>
    </article>
<?php
}

$resultat = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='goodies'
ORDER BY id_produit DESC LIMIT 1;");

$listeProduits = $resultat->fetchAll();

foreach ($listeProduits as $produits) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($produits['date_publication']));
?>
    <article>

        <img class="imageProduit" src="./assets/images/produits/<?php echo $produits['image_produit']; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2>EQUIPEMENT DU MOMENT :<br><?php echo $produits["nom_produit"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if (strlen($produits["description_produit"]) > 120) {
                        echo substr($produits["description_produit"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $produits["description_produit"];
                    }
                    // echo "<br>".strlen($article["description"]);
                    ?></p>
            </div>

            <h4><?php echo $produits["prix_produit"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>

            <button class="buttonPanier">
                <i class="fas fa-cart-plus"></i>
            </button>
        </div>
    </article>
<?php
}
?>