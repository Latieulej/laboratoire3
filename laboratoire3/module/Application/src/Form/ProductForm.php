<?php
namespace Application\Form;

 use Zend\Form\Form;

 class ProductForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('catalogue');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'nom',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Nom',
             ),
         ));
         $this->add(array(
             'name' => 'photo',
             'type' => 'file',
             'options' => array(
                 'label' => 'Photo',
             ),
         ));
         $this->add(array(
         'name' => 'description',
         'type' => 'Text',
         'options' => array(
             'label' => 'Description',
         ),
     ));
        $this->add(array(
        'name' => 'prix',
        'type' => 'number',
        'options' => array(
            'label' => 'Prix',
        ),
    ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }