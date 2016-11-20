<?php

namespace Foo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FooController extends AbstractActionController
{

    public function indexAction()
    {
        new \Foo\Model\FooModel();
        return new ViewModel();
    }


}

