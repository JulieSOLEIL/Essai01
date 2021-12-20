<?php

class Article { // instanciation class
//déclaration des propriétés
    private $id_art;
    private $libelle_art;
    private $photo_art;
    private $prix_art;


    public function __construct($nomArticle='', $nomPhoto='', $prixArticle=0.0) {
        
        $this->id_art = NULL;
        // $this->libelle = $nomArticle;
        $this->setLibelle($nomArticle);
        $this->photo_art = $nomPhoto;
        $this->prix_art = $prixArticle;
    }

    public function getId() {
        return $this->id_art;
    }
    public function getLibelle() {
        return $this->libelle_art;
    }
    public function getUrlPhoto() {
        return $this->photo_art;
    }
    public function getPrix() {
        return $this->prix_art;
    }

    public function setLibelle($nomArticle) {

        $this->libelle_art = strtoupper($nomArticle);
    }
}