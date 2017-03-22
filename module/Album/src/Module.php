<?php
namespace Album;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 22.03.2017
 * Time: 18:45
 */
class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}