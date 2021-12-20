<?php

require 'base/Dao.php';
require 'entites/Article.php'; // ajout du fichier

class ModelArticle { //on instancie une class

    private $dao; // on declare une propriété

    public function __construct(){ // on instancie la propriété dans un constructeur
        $this->dao = new Dao();
    }

    public function listeAllArticle() {

        $produits = $this->dao->getAllArticle(); // on écrit qu'on souhaite récupérer cette propriété et dans cette propriété, on veut get la fonction

        return $produits;
    }
    public function nouvelArticle() {
        
            $libelle = filter_input(INPUT_POST,'libelle');
            $photo = $_FILES['photo']['name'];
            $prix = filter_input(INPUT_POST,'prix');
            $article =new Article($libelle, $photo, $prix);
            // $param = explode('.', $photo);
            // $photo = uniqid() . '.' .array_pop($param); 

            $param = pathinfo($photo); //fonction retournant infos sur un fichier
            //var_dump($param); echo '<br>';
            $photo = uniqid() . '.' .$param['extension'];
            //var_dump($photo);die();

            $this->dao->ajoutArticle($article); // la mm chose

            move_uploaded_file($_FILES['photo']['tmp_name'], './upload/'.$photo);
    }
}