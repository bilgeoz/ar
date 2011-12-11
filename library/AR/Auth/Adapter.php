<?php

/**
 * Description of Adapter
 *
 * @author bilge
 */
class AR_Auth_Adapter implements Zend_Auth_Adapter_Interface
{
    const NOT_FOUND_MSG = "Account not found!";
    const BAD_PW_MSG = "Password is invalid";
    /**
     *
     * @var User 
     */
    protected $user;
    /**
     *
     * @var string
     */
    protected $email = "";
    
    /**
     *
     * @var string
     */
    protected $password = "";


    public function __construct($email, $password) 
    {
        $this->email = $email;
        $this->password = $password;
        
    }
    
    /**
     * @throws 
     */
    public function authenticate()
    {
        try 
        {
            $this->user = User::authenticate($this->email, $this->password);
            return $this->createResult(Zend_Auth_Result::SUCCESS);
        } catch (Exception $e){
            if ($e->getMessage() == User::WRONG_PW)
                return $this->createResult(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, array(self::BAD_PW_MSG));
            
            if ($e->getMessage() == User::NOT_FOUND)
                return $this->createResult(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, array(self::NOT_FOUND_MSG));
        }
        
    }

    private function createResult($code, $messages = array())
    {
        return new Zend_Auth_Result($code, $this->user, $messages);
    }
}

