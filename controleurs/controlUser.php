<?php

$erreur= '';

switch ($action) {
    case 'login':
        require 'modeles/modelUser.php';
        login();
       
        break;

    case 'connexion': 
        $vue = 'formLogin';
        break;
    
    default:
        # code...
        break;
}