<?php

/**
 * Description of UserController
 *
 * @author bilge
 */
class UserController extends Zend_Controller_Action
{
    /**
     * @todo activate action , /login ve /register route fix
     */
    public function init()
    {
        
    }
    public function indexAction()
    {
        
    }
    public function activateAction()
    {
        
    }
    
    public function okAction() 
    {
        echo '<pre>';
        print_r($this->_getAllParams());
        echo '</pre>';
    }
    public function registerAction()
    {
        /**
         * @todo ativasyon postası gönderimi
        */
        $formReg = new Form_Register();
        $this->view->formReg = $formReg;
        
        if ($this->getRequest()->isPost()) {
            if ($formReg->isValid($this->_getAllParams())) {
                $user = new User();
                $user->name = $this->_getParam('name');
                $user->surname = $this->_getParam('surname');
                $user->email = $this->_getParam('email');
                $user->password = $this->_getParam('password'); 
                $user->start_date = date("Y-m-d");
                $user->save();
                
                $this->_redirect("$baseUrl/user/ok");
                
            }
        }      
    }
    public function loginAction() 
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_forward('index', 'index');
        } else {

            $formLogin = new Form_Login();
            $this->view->form = $formLogin;

            if ($this->getRequest()->isPost()) {
                $adapter = new AR_Auth_Adapter($this->_getParam('email'), $this->_getParam('password'));
                $result = Zend_Auth::getInstance()->authenticate($adapter);

                if (Zend_Auth::getInstance()->hasIdentity()) {
                    $this->_forward('index', 'index');
                } else {
                    $this->view->message = implode(' ', $result->getMessages());
                }
            }
        }
    }
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_forward('index', 'index');
    }
    
    private function _sendActivateCode() 
    {
        
        
    }
    
    
}