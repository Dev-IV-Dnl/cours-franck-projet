<h1>RECHERCHE</h1>

<?php
// ici je construis mon Select pour rechercher les fichier dans la BDD.
$maRechercheArticles = "SELECT * FROM article WHERE nom LIKE :maRecherche OR description LIKE :maRecherche";
// Je prépare ici ma requête et je la sécurise
$requeteArticles = $connexion->prepare($maRechercheArticles);
$requeteArticles->execute([
    ':maRecherche' => '%' . $_GET["maRecherche"] . '%'
]);

$listeRechercheArticles = $requeteArticles->fetchAll();
// Et ici j'affiche les résultats de recherches dans la table article grâce au foreach()!
foreach ($listeRechercheArticles as $rechercheArticles) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($rechercheArticles['date']));
?>

    <article>
        <img class="imageProduit" src="./assets/images/articles/<?php echo $rechercheArticles["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2><?php echo $rechercheArticles["nom"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if(strlen($rechercheArticles["description"])>120) {
                        echo substr($rechercheArticles["description"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $rechercheArticles["description"];
                    }
                    // echo "<br>".strlen($rechercheArticles["description"]);
                ?></p>
            </div>

            <h4><?php echo $rechercheArticles["prix"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>

            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <form method="POST">
                    <input type="hidden" name="idArticle" value="<?php echo $article['id']; ?>">
                    <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </form>
            <?php

            }
            ?>
        </div>
    </article>

<?php
}
// ET ENSUITE j'effectue la même opération pour les autres tables avec un foreach().
//deuxième code de table equipement ici :

$maRechercheEquipements = "SELECT * FROM equipement WHERE nom LIKE :maRecherche OR description LIKE :maRecherche";
// Je prépare ici ma requête et je la sécurise
$requeteEquipements = $connexion->prepare($maRechercheEquipements);
$requeteEquipements->execute([
    ':maRecherche' => '%' . $_GET["maRecherche"] . '%'
]);

$listeRechercheEquipements = $requeteEquipements->fetchAll();
// Et ici j'affiche les résultats de recherches dans la table equipement grâce au foreach()!
foreach ($listeRechercheEquipements as $rechercheEquipements) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($rechercheEquipements['date']));
?>

    <article>

        <img class="imageProduit" src="./assets/images/equipement/<?php echo $rechercheEquipements["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2><?php echo $rechercheEquipements["nom"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if(strlen($rechercheEquipements["description"])>120) {
                        echo substr($rechercheEquipements["description"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $rechercheEquipements["description"];
                    }
                ?></p>
            </div>

            <h4><?php echo $rechercheEquipements["prix"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>

            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <form method="POST">
                    <input type="hidden" name="idArticle" value="<?php echo $article['id']; ?>">
                    <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </form>
            <?php

            }
            ?>
        </div>
    </article>

<?php
}

//troisième code de table goodies ici :

$maRechercheGoodies = "SELECT * FROM goodies WHERE nom LIKE :maRecherche OR description LIKE :maRecherche";
// Je prépare ici ma requête et je la sécurise
$requeteGoodies = $connexion->prepare($maRechercheGoodies);
$requeteGoodies->execute([
    ':maRecherche' => '%' . $_GET["maRecherche"] . '%'
]);

$listeRechercheGoodies = $requeteGoodies->fetchAll();
// Et ici j'affiche les résultats de recherches dans la table equipement grâce au foreach()!
foreach ($listeRechercheGoodies as $rechercheGoodies) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($rechercheGoodies['date']));
?>

    <article>
    <img style="width:200px;" src="./assets/images/goodies/<?php echo $rechercheGoodies["image"]; ?>" alt="image motoCross" title="Image de MotoCross">
        <div class="produit">
            <h2><?php echo $rechercheGoodies["nom"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php
                    if(strlen($rechercheGoodies["description"])>120) {
                        echo substr($rechercheGoodies["description"], 0, 120);
                        echo "<br><a href='#'>En lire plus...</a>";
                    } else {
                        echo $rechercheGoodies["description"];
                    }
                ?></p>
            </div>

            <p>Le <?php echo $date; ?>.</p>
        </div>
    </article>

<?php
}


?>