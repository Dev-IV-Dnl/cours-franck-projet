<H1>PANIER</H1>

<?php

$listePanier = $connexion->query("SELECT article.id, nom, image, description, prix, date, id_article, id_utilisateur FROM article
INNER JOIN panier ON article.id=panier.id_article 
INNER JOIN utilisateur ON utilisateur.id=panier.id_utilisateur
WHERE utilisateur.id=$_SESSION['id'];")->fetchAll();

var_dump($_SESSION['id']);

foreach ($listePanier as $panier) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A, %d, %B, %G à %Hh%M', strtotime($panier['date']));
?>
<article>
      
      <img class="imageProduit" src="./assets/images/articles/<?php echo $panier["image"]; ?>" alt="image produit" title="Image Produit">

      <div class="produit">
          <h2><?php echo $panier["nom"]; ?></h2>

          <div class="descriptionProduit">
              <p><?php
                  if(strlen($panier["description"])>120) {
                      echo substr($panier["description"], 0, 120);
                      echo "<br><a href='#'>En lire plus...</a>";
                  } else {
                      echo $panier["description"];
                  }
                  // echo "<br>".strlen($goodies["description"]);
              ?></p>
          </div>

          <p>Le <?php echo $date; ?>.</p>

      </div>
  </article>
<?php
}
?>