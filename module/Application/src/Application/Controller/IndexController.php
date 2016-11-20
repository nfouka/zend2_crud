<?php

namespace Application\Controller;

use Application\Entity\Utilisateur;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $_objectManager = null;

    /**
     * @return ViewModel
     */
    public function indexAction()
    {

        $logger = $this->getServiceLocator()->get('Log\App');
        $logger->log(\Zend\Log\Logger::ERR , "This is a little log!");
        $logger->log(\Zend\Log\Logger::ALERT , "This is a little log!");
        $logger->log(\Zend\Log\Logger::DEBUG , "This is a little log!");
        $logger->log(\Zend\Log\Logger::INFO , "This is a little log!");
        $logger->log(\Zend\Log\Logger::EMERG , "This is a little log!");
        $logger->log(\Zend\Log\Logger::NOTICE , "This is a little log!");


        $users = $this->getObjectManager()->getRepository('Application\Entity\Utilisateur')->findAll();
                                return new ViewModel(
                                        array(
                                            'key' => 'Version 2.5.10 Zend by zend technology' ,
                                            'users' => $users
                                        )
                                        
                                        );
    }

    /**
     * @return array
     */
    public function resetpasswordAction()
    {
                                $logger = $this->getServiceLocator()->get('Log\App');
                                $di = new \Zend\Di\Di() ;
                                $request = $this->getRequest();
                                new \Foo\Model\FooModel();
                                $n   = $request->getParam('n');
                                $listName = array() ; 
                                
                                for($i=0 ; $i<$n ; $i++){
                                $user = new Utilisateur() ;
                                    $logger->log(\Zend\Log\Logger::ERR , "USER CREATE id ".$i );
                                $user->setAdress("Urssaf Rhône-Alpes TSA 90001 01016 Bourg-en-Bresse cedex. Sites de l'Ardèche, "
                                        . "d'Isère (Grenoble et Vienne) et de Savoie Urssaf Rhône-Alpes TSA 40001".  rand(0, 999999)) ; 
                                $user->setName("Alfred de Musset ".  rand(0, 999999)) ; 
                                $this->getObjectManager()->persist($user);
                                $this->getObjectManager()->flush();
                                $listName[$i] = $user  ; 
                                }
                               // print_r($this->getObjectManager()->getRepository('Application\Entity\Utilisateur')->findAll()) ; 
                                
                                 $di->instanceManager()->setParameters('Application\Controller\DbAdapter', array(
                                        'username' => 'nadir',
                                        'password' => 'passw'
                                ));
                                 
                                        
                                 $di->instanceManager()->setParameters('Application\Controller\MovieFinder', array(
                                        'movieFinder' => $di->get('Application\Controller\DbAdapter') , 
                                        'name'        => 'Nadir Fouka'
                                ));
                                 
                                 
                                $movieLister = $di->get('Application\Controller\MovieFinder');
                                    return $listName ;
    }

    /**
     * @return array|object
     */
    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
                                    $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                                }

                                return $this->_objectManager;
    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function addAction()
    {
        if ($this->request->isPost()) {
                            $user = new \Application\Entity\Utilisateur() ; 
                            $user->setName($this->getRequest()->getPost('name'));
                            $user->setAdress($this->getRequest()->getPost('adress'));
                            $this->getObjectManager()->persist($user);
                            $this->getObjectManager()->flush();
                            $newId = $user->getIdUtilisateur();

                            return $this->redirect()->toRoute('home');
                        }
                        return new ViewModel();
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $user = $this->getObjectManager()->find('\Application\Entity\Utilisateur', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($user);
            $this->getObjectManager()->flush();
            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('user' => $user));
    }

    public function editAction()
    {

        $id = (int) $this->params()->fromRoute('id', 0);
        $user = $this->getObjectManager()->find('\Application\Entity\Utilisateur', $id);

        if ($this->request->isPost()) {
            $user->setName($this->getRequest()->getPost('name'));
            $user->setAdress($this->getRequest()->getPost('adress'));
            $this->getObjectManager()->persist($user);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('user' => $user));

    }


}

