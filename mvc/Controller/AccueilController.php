<?php

namespace Controller;

class AccueilController{
    public function index(){
        echo "Bienvenue sur la page d'accueil";
    }

    public function nonTrouve(){
        echo "La page n'existe pas";
    }
}