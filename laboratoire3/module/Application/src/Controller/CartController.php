<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Cart\CartMapper;

class CartController extends AbstractActionController
{
    /*public function indexAction()
    {
        $data = [
            1 => [
                'id' => '1',
                'nom' => "nom du produit",
                'photo' => 'img1.jpg',
                'prix' => '250',
                'quantite' => '3',
            ],
            2 => [
                'id' => '2',
                'nom' => 'Hello Wolrd',
                'photo' => 'img2.jpg',
                'prix' => '400',
                'quantite' => '1',
            ],
        ] ;

        $carts = [] ;

        foreach ($data as $cart_data) {
            $cart = new \Application\Model\Cart\Cart();
            $cart->setId($cart_data['id'])
                ->setNom($cart_data['nom'])
                ->setPhoto($cart_data['photo'])
                ->setPrix($cart_data['prix'])
                ->setQuantite($cart_data['quantite']);

            $carts[] = $cart ; 
        }

        return new ViewModel([
            'carts' => $carts,
        ]);
    }*/

    private $cartMapper;

    public function __construct(CartMapper $cartMapper) 
    {
        $this->cartMapper = $cartMapper ;
    }

    public function indexAction()
    {
        $carts = $this->cartMapper->fetchAll();

        return new ViewModel([
            'carts' => $carts,
        ]);
    }
}
