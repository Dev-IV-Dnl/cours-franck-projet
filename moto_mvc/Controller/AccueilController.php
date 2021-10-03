<?php

namespace Controller;

class AccueilController extends Controller
{
    public function index()
    {
        $daoProduit = new \Dao\ProduitDao();
        $moto = $daoProduit->findLastProducts(1);
        $casque = $daoProduit->findLastProducts(2);
        $tenue = $daoProduit->findLastProducts(3);

        $parametre = compact("moto", "casque", "tenue");
        $this->afficherVue("accueil", $parametre);
    }

    public function nonTrouve()
    {
        $this->afficherVue("nonTrouve");
    }
}