<h1>EQUIPEMENT</h1>

<?php

$listeEquipements = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='equipements'
ORDER BY id_produit DESC;")->fetchAll();

foreach ($listeEquipements as $equipement) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($equipement['date_publication']));
?>
    <article>

        <img class="imageProduit" src="./assets/images/equipement/<?php echo $equipement["image_produit"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2><?php echo $equipement["nom_produit"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if (strlen($equipement["description_produit"]) > 120) {
                        echo substr($equipement["description_produit"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $equipement["description_produit"];
                    }
                    // echo "<br>".strlen($equipement["description"]);
                    ?></p>
            </div>

            <h4><?php echo $equipement["prix_produit"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>

            <button class="buttonPanier">
                <i class="fas fa-cart-plus"></i>
            </button>
        </div>
    </article>
<?php
}
?>