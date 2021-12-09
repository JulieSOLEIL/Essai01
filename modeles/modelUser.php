<?php
require 'base/dao.php';

function login(){
    
    global $vue;
    global $erreur;

// Demande si on est en méthode 'POST', si oui, fais le code suivant...
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$login = $_POST['login'];

    try{
        $personne = getPersonneByLogin($login);

        $_SESSION['user'] = $personne['nom'];
        $vue ='accueil';

        // ici je demande d'arrêter le script au-dessus
    } catch (Exception $e) {
        $erreur = $e->getMessage();
        $vue ='formLogin';
    }
   
} else {

    $vue = 'formLogin';
}
}