<?php

namespace Controller;

class AccueilController extends BaseController
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
