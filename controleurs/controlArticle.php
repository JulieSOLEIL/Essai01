<?php

require_once 'controleurs/Controleur.php';

class ControlArticle extends Controleur { // on instancie une class

    public function execute($action){ // on déclare une propriété

        switch ($action) {
            case 'liste':
                require 'modeles/modelArticle.php';
                $modele = new ModelArticle(); // on déclare 
                $param = [];
                $param['articles'] = $modele->listeAllArticle(); //on instancie
                $this->creerVue('liste', $param);
                break;
            case 'nouvelArticle':
                $this->creerVue('formArticle');
                break;
            case 'ajoutArticle':
                require 'modeles/modelArticle.php';
                $modele = new ModelArticle(); // on déclare 
                $modele->nouvelArticle(); // on instancie
                $this->creerVue('formArticle');
                break;

            default:
                # code...
                break;
        }

        // require 'vues/template.php';
    }

}
