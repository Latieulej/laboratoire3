<?php

namespace Application\Model\Product ;

class Product 
{
    protected $id ;
    protected $nom;
    protected $photo;
    protected $description;
    protected $prix; 

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

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
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

    public function setDescription($description) {
        $this->description = $description ;
        return $this;
    }

    public function setPrix($prix) {
        $this->pris = $prix ; 
        return $this;
    }
}