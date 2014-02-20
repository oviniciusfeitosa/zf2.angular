<?php

namespace SONRest;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'SONRest\Service\ProcessJson' => function($serviceManager) {
                    $serializer = $serviceManager->get('jms_serializer.serializer');
                    return new Service\ProcessJson(null, null, $serializer);
                },
            ),
        );
    }

    public function onBootstrap(MvcEvent $e) {
        $sharedManager = $e->getApplication()->getEventManager()->getSharedManager();
        /* criação de um event Listener
         * quando o for executado "Zend\Mvc\AbstractRestfulController", .
         * -100 > para que seja executado primeiro
         */

        $sharedManager->attach(
                "Zend\Mvc\Controller\AbstractRestfulController", 
                MvcEvent::EVENT_DISPATCH, 
                array(
                    $this, 'postProcess'
                ), -100);
    }

    #método que será executado após processar tudo  

    public function postProcess(MvcEvent $e) {
        
        $processJson = $e->getTarget()->getServiceLocator()->get("SONRest\Service\ProcessJson");
        $data = $e->getResult();

        $response = new \Zend\Http\Response();
        $processJson->setResponse($response);
        $processJson->setData($data);

        return $processJson->process();
    }

}
