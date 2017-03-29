<?php
namespace Blog;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.03.2017
 * Time: 11:24
 */
class Module implements ConfigProviderInterface
{

    //teall the modulManager that this module has configuration
    //use ConfigProviderInterface
    public function getConfig(){
        //get the config array from it's own file for optimization
        return include __DIR__ . '/../config/module.config.php';
    
    }

}