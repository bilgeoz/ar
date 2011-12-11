<?php



/**
 * Description of Login
 *
 * @author bilge
 */
class Form_Login extends Zend_Form
{
    public function init() {
        $email = new Zend_Form_Element_Text('email');
        $email->setRequired(true)
                 ->setLabel('E-posta :');
        
        $password = new Zend_Form_Element_Password('password');
        $password->setRequired(true)
                 ->setLabel('Parola');
        
        $submit =  new Zend_Form_Element_Submit('login');
        
        $this->addElements(array($email, $password, $submit));
    }
}