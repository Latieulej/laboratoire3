<?php

namespace Application\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\Controller\CatalogueControler;
use Application\Model\Product\ProductMapper;

class CatalogueControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $productMapper = $container->get(ProductMapper::class);
        $controller = new CatalogueController($productMapper);

        return $controller ;
    }
}