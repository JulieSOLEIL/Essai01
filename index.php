<?php
$vue = '';


if (empty($_GET)){
    $entite = '';
    $action = 'accueil';
} else {
    $entite = $_GET['entite'];
    $action = $_GET['action'];
}
try{
switch ($entite) {
    case 'article':
        require 'controleurs/controlArticle.php';
        break;

    case 'user':
        require 'controleurs/controlUser.php';
        break;


    default:
        $vue = 'accueil';
        break;

}
} catch(PDOException $err){
    $vue = 'index_error';
}
        
require 'vues/template.php';
