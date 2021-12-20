<?php
// session_start();
// try{
class Dao {

    private $dbConnect;

    public function __construct() {

        $this->dbConnect = new PDO('mysql:host=localhost;dbname=demo_personne;charset=utf8', 'root', '');
        $this->dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // permet de rediriger la page si erreur de connexion, on écrit cette syntaxe
    }


    // on veut faire 2 fonctions: chercher un usager, et chercher des articles:

    public function getPersonneByLogin(string $login) {

        $sql = 'SELECT * FROM personne WHERE nom = \'' . $login . '\'';

        $stat_pers = $this->dbConnect->query($sql);

        if ($stat_pers->rowCount() == 1) { // si j'ai un login d'un user,
            $pers = $stat_pers->fetch(PDO::FETCH_ASSOC);
            return $pers;
        } else {
            // return false; // si je n'ai pas trouvé de login d'un user.
            $err = new Exception('Login incorrect');
            throw $err;
        }
    }

    public function getAllArticle() {

        $sql = 'SELECT * FROM articles';
        $stat_articles = $this->dbConnect->query($sql);
        $stat_articles->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Article');
        $articles = $stat_articles->fetchAll();

        return $articles;
    }

    public function ajoutArticle(Article $article) {

        $sql = 'INSERT INTO articles VALUES (NULL, :libelle, :photo, :prix);';
        $stat_produit = $this->dbConnect->prepare($sql);

        $lib= $article->getLibelle();
        $photo=$article->getUrlPhoto();
        $prix= $article->getPrix();

        $stat_produit->bindParam(':libelle', $lib);
        $stat_produit->bindParam(':photo', $photo);
        $stat_produit->bindParam(':prix', $prix);

        $stat_produit->execute();
    }
}
