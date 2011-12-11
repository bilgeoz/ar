<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity()){
            $user = Zend_Auth::getInstance()->getIdentity();
            $this->view->userState = $user[0]->attributes();
        } else {
            $this->view->userState = null; 
        }
    }
    
    
    public function processAction() 
    {
        /**
         * ajax için..
         */
        if ($this->getRequest()->isPost()) {

            $adapter = new AR_Auth_Adapter($this->_getParam('username'), $this->_getParam('password'));
            $result = Zend_Auth::getInstance()->authenticate($adapter);

            if (Zend_Auth::getInstance()->hasIdentity()) {
                $this->_forward('secret');
            } else {
                $this->view->message = implode(' ', $result->getMessages());
            }
        }
    }
   

}