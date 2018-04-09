<?php

namespace Application\Model\Cart ;

class CartMapper
{
    protected $carts ;

    public function __construct()
    {
        // On récupère les données stockées dans les cookies si le cooki existe
        if (isset($_COOKIE['cart'])) {
            $cookie = "[" . $_COOKIE['cart'] . "]" ;
            $data = JSON_decode($cookie,TRUE) ;

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
    }

    public function fetchAll()
    {
        return $this->carts;
    }
}