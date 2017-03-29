<?php
namespace Blog\Factory;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.03.2017
 * Time: 12:28
 */
use Blog\Controller\ListController;
use Blog\Model\PostRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ListControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ListController($container->get(PostRepositoryInterface::class));
    }

}