<?php


//module/Foo/config/module.config.php
return array(
    'router' => array(
        'routes' => array(
            'foo' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/foo',
                    'defaults' => array(
                        'controller' => 'Foo\Controller\Foo',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Foo\Controller\Foo' => 'Foo\Controller\FooController'
        ),
    ),
);
