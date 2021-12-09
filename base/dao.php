<?php
// session_start();
// try{
$dbConnect = new PDO('mysql:host=localhost;dbname=demo_personne;charset=utf8', 'root', '');
$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // permet de rediriger la page si erreur de connexion, on écrit cette syntaxe
// } catch (PDOException $erreur){

//     // header('Location: index_error.php');
//     $vue = 'index_error';
//     exit();
// }


// on veut faire 2 fonctions: chercher un usager, et chercher des articles:

function getPersonneByLogin($login) {

    global $dbConnect;

    $sql = 'SELECT * FROM personne WHERE nom = \''.$login.'\'';

    $stat_pers = $dbConnect->query($sql);

    if ($stat_pers-> rowCount()== 1){ // si j'ai un login d'un user,
        $pers = $stat_pers-> fetch(PDO::FETCH_ASSOC);
        return $pers;
} else {
    // return false; // si je n'ai pas trouvé de login d'un user.
    $err = new Exception('Login incorrect');
    throw $err;
}
}

function getAllArticle() {

    global $dbConnect; //dans Php, les variables sont locales, il faut toujours déclarer les variables avant dans les fonctions

    $sql = 'SELECT * FROM articles';
    $stat_articles = $dbConnect->query($sql);
    $articles = $stat_articles->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function ajoutArticle($nomArticle, $photo, $prix) {
    global $dbConnect;

    $sql ='INSERT INTO articles VALUES (NULL, :libelle, :photo, :prix);';
    $stat_produit = $dbConnect->prepare($sql);

    $stat_produit->bindParam(':libelle', $nomArticle);
    $stat_produit->bindParam(':photo', $photo);
    $stat_produit->bindParam(':prix', $prix);

    $stat_produit->execute();
}
