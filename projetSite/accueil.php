<h1>ACCUEIL </h1>

<?php

$resultat = $connexion->query("SELECT * FROM article ORDER BY id DESC LIMIT 1;");

$listeArticles = $resultat->fetchAll();

foreach ($listeArticles as $article) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($article['date']));
    ?>
    <article>
      
        <img class="imageProduit" src="./assets/images/articles/<?php echo $article["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2>MOTO DU MOMENT :<br><?php echo $article["nom"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if(strlen($article["description"])>120) {
                        echo substr($article["description"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $article["description"];
                    }
                    // echo "<br>".strlen($article["description"]);
                ?></p>
            </div>
            
            <h4><?php echo $article["prix"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>

            <button class="buttonPanier">
                <i class="fas fa-cart-plus"></i>
            </button>
        </div>
    </article>
<?php
}
?>