<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    #onde são registrados os serviços que serão utilizados.
    public function getServiceConfig() {

        return array(
            'factories' => array(
                'Application\Service\Categoria' => function($serviceManager) {
                    $entityManager = $serviceManager->get("Doctrine\ORM\EntityManager");
                    $categoriaService = new \Application\Service\Categoria($entityManager);

                    return $categoriaService;
                },
                'Application\Service\Produto' => function($serviceManager) {
                    $entityManager = $serviceManager->get("Doctrine\ORM\EntityManager");
                    $produtoService = new \Application\Service\Produto($entityManager);

                    return $produtoService;
                }
            ),
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
