<?php

require_once 'controleurs/Controleur.php';

class ControlUser extends Controleur{

    public function execute($action){ // la fonction execute() est indispensable en instanciant la class au-dessus

        switch ($action) {
            case 'login':
                require 'modeles/ModelUser.php';
                $modele = new ModelUser();
                try {
                    $modele->login();
                    $this->creerVue('accueil');
                } catch (Exception $err) {
                    $param = ['erreur' => $err->getMessage()];
                    $this->creerVue('formLogin', $param);
                }
                break;

            case 'connexion':
                // $erreur = '';
                // $vue = 'formLogin';
                $param = ['erreur' => ''];
                $this->creerVue('formLogin', $param);
                break;

            default:
                # code...
                break;
        }
    }
}
