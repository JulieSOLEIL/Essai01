<?php
require 'base/Dao.php';

class ModelUser {

    public function login() {

        $login = $_POST['login'];

        $dao = new Dao();
        $personne = $dao->getPersonneByLogin($login);

        $_SESSION['user'] = $personne['nom'];
        $vue = 'accueil';
    }

}