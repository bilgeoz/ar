<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author bilge
 */
class HomeController extends Zend_Controller_Action
{
    public function indexAction() 
    {
        if (!Zend_Auth::getInstance()->hasIdentity())
            die("Access denied!");
    }
}
