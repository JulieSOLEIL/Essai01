<?php
$vue = 'accueil';


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
        require 'controleurs/ControlArticle.php';
        $controleur = new ControlArticle(); // on instancie une méthode
        $controleur->execute($action); // et l'execute avec $action
        break;

    case 'user':
        require 'controleurs/ControlUser.php';
        $controleur = new ControlUser(); // on instancie une méthode
        $controleur->execute($action); // et l'execute avec $action
        break;


    default:
        require 'controleurs/ControlGeneral.php';
        $controleur = new ControlGeneral(); // on instancie une méthode
        $controleur->execute($action); // et l'execute avec $action
        break;

}
} catch(PDOException $err){
    echo $err->getMessage();
    $vue = 'erreur';
    require 'vues/template.php';
}
        

