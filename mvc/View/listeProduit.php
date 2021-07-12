<?php
foreach ($listeProduit as $Produit) {
?>

  <div class="card border-primary mb-3" style="max-width: 20rem;">
    <div class="card-header"><?php echo $produit->donnePrixTtc(); ?> €</div>
    <div class="card-body">
      <h4 class="card-title"><?php echo $produit->getDesignation(); ?></h4>
      <p class="card-text">TVA à <?php echo $produit->getTva(); ?> %.
    </div>
  </div>

<?php
}
?>