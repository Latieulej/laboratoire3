<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

use Application\Model\Product\ProductMapper;
use Application\Model\Cart\CartMapper;

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
                ProductMapper::class => Model\Product\Factory\ProductMapperFactory::class,
                CartMapper::class => InvokableFactory::class,
            ]
        ];
    }
}
