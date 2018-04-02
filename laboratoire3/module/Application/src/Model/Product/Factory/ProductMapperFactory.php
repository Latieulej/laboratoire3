<?php
namespace Application\Model\Product\Factory;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Interop\Container\ContainerInterface;

use Application\Model\Product\Product;
use Application\Model\Product\ProductMapper;

class ProductMapperFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dbAdapter = $container->get(AdapterInterface::class);

        $resultSetPrototype = new ResultSet() ; 
        $resultSetPrototype->setArrayObjectPrototype(new Product());

        $tableGateway = new TableGateway('product', $dbAdapter, null, $resultSetPrototype);

        return new ProductMapper($tableGateway);
    }
}