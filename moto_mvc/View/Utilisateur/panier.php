<?php
    foreach ($listePanier as $panier) {
        setlocale(LC_TIME, 'fr');
        $date = strftime('%A, %d, %B, %G à %Hh%M', strtotime($panier->getDatePublication()));
    ?>
        <article>

            <img class="imageProduit" src="/moto_mvc/View/assets/images/produits/<?php echo $panier->getImageProduit(); ?>" alt="image produit" title="Image Produit">

            <div class="produit">
                <h2><?php echo $panier->getNomProduit(); ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($panier->getDescriptionProduit()) > 120) {
                            echo substr($panier->getDescriptionProduit(), 0, 120);
                            echo "<br><a href='#'>En lire plus...</a>";
                        } else {
                            echo $panier->getDescriptionProduit();
                        }
                        // echo "<br>".strlen($goodies["description"]);
                        ?></p>
                </div>

                <h4><?php echo $panier->getPrixProduit(); ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>

            </div>
        </article>
    <?php
    }
    ?>