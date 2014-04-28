<?php

namespace SONRest;

return array(
    'controllers' => array(
        'invokables' => array(
//            "SONRest\Controller\Categoria" => "SONRest\Controller\CategoriaController"
            "categoria" => "SONRest\Controller\CategoriaController",
            "produto" => "SONRest\Controller\ProdutoController"
        )
    ),
    'router' => array(
        'routes' => array(
            'rest' => array(
                'type' => 'Segment',
                'options' => array(
                    #o [/] serve para que seja considerado mesmo colocando uma barra no final.
                    'route' => '/api/:controller[/:id[/]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z0-9_-]*',
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . "/../src/" . __NAMESPACE__ . "/Entity")
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . "\Entity" => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);