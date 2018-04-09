<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Db\TableGateway\TableGateway;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        //'controller' => Controller\IndexController::class,
                        'controller' => Controller\CatalogueController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'catalogue' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/catalogue[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\CatalogueController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'cart' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/cart',
                    'defaults' => [
                        'controller' => Controller\CartController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\IndexController::class => InvokableFactory::class,
            Controller\IndexController::class => Controller\Factory\CatalogueControllerFactory::class,
            Controller\CatalogueController::class => Controller\Factory\CatalogueControllerFactory::class,
            Controller\CartController::class => Controller\Factory\CartControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Services\AuctionTable::class => Services\Factories\AuctionTableFactory::class,
            Services\AuctionTableGateway::class => Services\Factories\AuctionTableGatewayFactory::class,
            Services\NavManager::class => Services\Factories\NavManagerFactory::class,
         ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
