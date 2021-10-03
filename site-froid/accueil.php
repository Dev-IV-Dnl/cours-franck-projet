
<?php

// $connexion = new PDO("mysql:host=localhost:3306;dbname=correction-11juin;charset=UTF8", "root", "");

$resultat = $connexion->query("SELECT * FROM article;");

$listeArticles = $resultat->fetchAll();

// var_dump($listeArticles);

foreach($listeArticles as $article) {
?>

<h2><?php echo $article['nom']; ?></h2>

<p><?php echo $article['description']; ?></p>

<legend><?php echo $article['prix']; ?> €.</legend>

<?php
}
?>
