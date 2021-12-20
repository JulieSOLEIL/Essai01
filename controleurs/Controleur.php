<?php

abstract class Controleur {

    abstract protected function execute($action);

    public function creerVue($vue, $param = []) {

        extract($param);

        require 'vues/template.php';
    }
}