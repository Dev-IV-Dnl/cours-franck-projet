<h1>GOODIES</h1>

<?php

$resultat = $connexion->query("SELECT * FROM goodies ORDER BY id DESC;");

$listeGoodies = $resultat->fetchAll();

foreach ($listeGoodies as $goodies) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($goodies['date']));
    ?>
    <article>
      
        <img class="imageProduit" src="./assets/images/goodies/<?php echo $goodies["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2><?php echo $goodies["nom"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if(strlen($goodies["description"])>120) {
                        echo substr($goodies["description"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $goodies["description"];
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