<?php

if (!isset($_SESSION['pseudo'])) {
?>
    <h1 style="margin-bottom: 60px;">CAROUSEL<br>Articles du moment</h1>
<?php
} else if($parametres[0]=="moto") {
?>
    <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?> !<br>Jette un oeil sur les motos !</h1>
<?php
} else if($parametres[0]=="equipement") {
    ?>
        <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?> !<br>Jette un oeil sur les équipements !</h1>
    <?php
} else if($parametres[0]=="goodie") {
    ?>
        <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?> !<br>Jette un oeil sur les tenues !</h1>
    <?php
}

foreach ($listeProduit as $produit) {
  setlocale(LC_TIME, 'fr');
  $date = strftime('%A %d %B %G à %Hh%M', strtotime($produit->getDatePublication()));
?>
<a style="text-decoration:none;" href="/moto_mvc/produit/afficherProduit/<?php echo $produit->getIdProduit();?>">
        <article>

            <img class="imageProduit" src="/moto_mvc/View/assets/images/produits/<?php echo $produit->getImageProduit(); ?>" alt="image motoCross" title="Image de MotoCross">

            <div class="produit">
                <h2><?php echo $produit->getNomProduit(); ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($produit->getDescriptionProduit()) > 120) {
                            echo '<span>' . substr($produit->getDescriptionProduit(), 0, 120) . '</span>';
                        ?>
                            <br><a class='enLirePlus' href='/moto_mvc/produit/afficherProduit/<?php echo $produit->getIdProduit();?>'>En lire plus...</a>
                        <?php
                        } else {
                            echo '<span>' . $produit->getDescriptionProduit() . '</span>';
                        }
                        ?>
                    </p>
                </div>

                <h4><?php echo $produit->getPrixProduit(); ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>
                <div class="modifPanier">
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                        <form method="POST" title="Ajouter au panier">
                            <input type="hidden" name="idArticle" value="<?php echo $motos['id_produit']; ?>">
                            <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    <?php
                    }
                    if (isset($_SESSION['pseudo']) && isset($_SESSION['is_admin'])) {
                    ?>
                        <a class="buttonPanier" href="./index.php?page=modifier-produit&produit=<?php echo $motos['id_produit']; ?>" title="Modifier produit">
                            <i class="fas fa-wrench"></i>
                        </a>
                        <form method="POST" title="Supprimer produit">
                            <input type="hidden" name="idProduit" value="<?php echo $motos['id_produit']; ?>">
                            <button name="supprimerProduit" type="submit" class="buttonPanier">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </article>
    </a>

<?php
}
?>