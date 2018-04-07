<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Cart\CartMapper;

class CartController extends AbstractActionController
{
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

    public function addAction()
    {
        
    }
}
