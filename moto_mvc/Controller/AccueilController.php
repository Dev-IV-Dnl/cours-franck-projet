<?php

namespace Controller;

class AccueilController extends Controller
{
    public function index()
    {
        $this->afficherVue("accueil");
    }

    public function nonTrouve()
    {
        $this->afficherVue("nonTrouve");
    }
}
