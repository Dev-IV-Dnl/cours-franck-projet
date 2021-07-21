<h1>GOODIES</h1>

<?php

$listeGoodies = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='goodies'
ORDER BY id_produit DESC;")->fetchAll();

foreach ($listeGoodies as $goodies) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($goodies['date_publication']));
    ?>
    <article>
      
        <img class="imageProduit" src="./assets/images/produits/<?php echo $goodies["image_produit"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2><?php echo $goodies["nom_produit"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if(strlen($goodies["description_produit"])>120) {
                        echo substr($goodies["description_produit"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $goodies["description_produit"];
                    }
                    // echo "<br>".strlen($goodies["description"]);
                ?></p>
            </div>

            <p>Le <?php echo $date; ?>.</p>

            <button class="buttonPanier">
                <i class="fas fa-cart-plus"></i>
            </button>
        </div>
    </article>
<?php
}
?>