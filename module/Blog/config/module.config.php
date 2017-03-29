<?php
namespace Blog;

use Zend\Router\Http\Literal; //for route literal
use Zend\ServiceManager\Factory\InvokableFactory; // use zend serviceMangace for controller


return [
//routes config
        'router' => [
            // Open configuration for all possible routes
            'routes' => [
                // Define a new route called "blog"
                'blog' => [
                    // Define a "literal" route type:
                    'type' => Literal::class,
                    // Configure the route itself
                    'options' => [
                        // Listen to "/blog" as uri:
                        'route' => '/blog',
                        // Define default controller and action to be called when
                        // this route is matched
                        'defaults' => [
                            'controller' => Controller\ListController::class,
                            'action'     => 'index',
                        ],
                    ],
                ],
            ],

        ],
        //controller config
        'controllers' => [
            'factories' => [
               // Controller\ListController::class => InvokableFactory::class,
               Controller\ListController::class => Factory\ListControllerFactory::class,
            ],
        ],

        'service_manager' => [
          'aliases' => [
              //Model\PostRepositoryInterface::class => Model\PostRepository::class,
              Model\PostRepositoryInterface::class => Model\ZendDbSqlRepository::class,

          ],
            'factories'=>[
                Model\PostRepository::class => InvokableFactory::class,
                Model\ZendDbSqlRepository::class => Factory\ZendDbSqlRepositoryFactory::class,
            ]

        ],

        //view config
        'view_manager' => [
            'template_path_stack' => [
                __DIR__ . '/../view',
            ],
        ],

    ];