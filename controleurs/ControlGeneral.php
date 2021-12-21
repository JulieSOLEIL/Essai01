<?php

namespace controleurs;

// require_once 'controleurs/Controleur.php';

class ControlGeneral extends Controleur {

    public function execute($action) {


        $this->creerVue('accueil');
    }
}