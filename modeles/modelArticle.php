<?php

require 'base/dao.php';

function listeAllArticle() {

    $produits = getAllArticle();

    return $produits;
}
function nouvelArticle() {
    
        $libelle = filter_input(INPUT_POST,'libelle');
        $prix = filter_input(INPUT_POST,'prix');
        $photo = $_FILES['photo']['name'];
        $param = explode('.', $photo);
        $photo = uniqid() . '.' .array_pop($param); 

        ajoutArticle($libelle, $photo, $prix);

        move_uploaded_file($_FILES['photo']['tmp_name'], './upload/'.$photo);
}