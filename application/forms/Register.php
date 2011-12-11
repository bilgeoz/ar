<?php

/**
 * Description of Register
 *
 * @author bilge
 */
class Form_Register extends Zend_Form
{
    public function init() 
    {
        $this->setAction('');
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('İsim')
             ->setRequired(true);
        
        $surname = new Zend_Form_Element_Text('surname');
        $surname->setLabel('Soyisim')
                ->setRequired(true);
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('E-posta')
              ->setRequired(true);
        
        $password = new Zend_Form_Element_Text('password');
        $password->setLabel('Parola')
                 ->setRequired(true);
        
        $repassword = new Zend_Form_Element_Text('repassword');
        $repassword->setLabel('Parola tekrar')
                   ->setRequired(true);
        
        $submit =  new Zend_Form_Element_Submit('register');
        $submit->setLabel('Üye ol');
        
        $this->addElements(array(
            $name,$surname,$email,$password,$repassword,$submit
        ));
    }
    
}