<?php

namespace Application\Model\Cart ;

class CartMapper
{
    protected $carts ;

    public function __construct()
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

        foreach ($data as $cart_data) {
            $cart = new Cart();
            $cart->setId($cart_data['id'])
                ->setNom($cart_data['nom'])
                ->setPhoto($cart_data['photo'])
                ->setPrix($cart_data['prix'])
                ->setQuantite($cart_data['quantite']);

            $this->carts[] = $cart;
        }
    }

    public function fetchAll()
    {
        return $this->carts;
    }
}