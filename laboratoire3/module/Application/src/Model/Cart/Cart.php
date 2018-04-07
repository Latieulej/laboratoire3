<?php

namespace Application\Model\Cart ;

class Cart 
{
    protected $id ;
    protected $nom;
    protected $photo;
    protected $prix;
    protected $quantite; 

    //-- GETTERS
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getTotal() {
        return $this->prix * $this->quantite ;
    }

    //-- SETTERS
    public function setId($id) {
        $this->id = $id ;
        return $this;
    }

    public function setNom($nom) {
        $this->nom = $nom ;
        return $this ;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this; 
    }

    public function setPrix($prix) {
        $this->prix = $prix ; 
        return $this;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite ;
        return $this;
    }
}