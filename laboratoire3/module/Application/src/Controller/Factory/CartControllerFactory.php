<?php

namespace Application\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\Controller\CartController;
use Application\Model\Cart\CartMapper;

class CartControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) 
    {
        $cartMapper = $container->get(CartMapper::class);

        $controller = new CartController($cartMapper) ;

        return $controller;
    }
}