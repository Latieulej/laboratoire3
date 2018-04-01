<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

/*use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Application\Model\Product\ProductMapper;*/

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\AdapterInterface;
use Interop\Container\ContainerInterface;
use Application\Model\Product\Product;
use Application\Model\Product\ProductMapper;

class Module implements ConfigProviderInterface, ServiceProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ProductMapper::class => function(ContainerInterface $container, $requestedName) {
                    $dbAdapter = $container->get(AdapterInterface::class) ;

                    $resultSetPrototype = new ResultSet() ;
                    $resultSetPrototype->setArrayObjectPrototype(new Product()) ;

                    $tableGateway = new TableGateway('product', $dbAdapter, null, $resultSetPrototype);

                    $mapper = new ProductMapper($tableGateway);
                    return $mapper;
                },
            ]
        ];
    }
}
