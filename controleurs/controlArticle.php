<?php

switch ($action) {
    case 'liste':
        require 'modeles/modelArticle.php';
        $articles = listeAllArticle();
        $vue = 'liste';
        break;
    case 'creerArticle':
        $vue = 'formArticle';
        break;
    case 'ajoutArticle':
        require 'modeles/modelArticle.php';
        nouvelArticle();
        $vue = 'formArticle';
        break;
    
    default:
        # code...
        break;
}