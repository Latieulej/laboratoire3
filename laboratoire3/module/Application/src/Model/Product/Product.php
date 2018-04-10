<?php

namespace Application\Model\Product ;

use Application\Model\Cart\Cart;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class Product implements InputFilterAwareInterface
{
    protected $id ;
    protected $nom;
    protected $photo;
    protected $description;
    protected $prix; 
    protected $inputFilter; 

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

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->nom = (isset($data['nom'])) ? $data['nom'] : null;
        $this->photo = (isset($data['photo'])) ? $data['photo'] : null;
        $this->description = (isset($data['description'])) ? $data['description'] : null;
        $this->prix = (isset($data['prix'])) ? $data['prix'] : null;
    }



     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'description',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 300,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'nom',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 50,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }

 }
