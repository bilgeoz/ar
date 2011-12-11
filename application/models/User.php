<?php

/**
 * Description of User
 *
 * @author bilge
 */
class User extends ActiveRecord\Model 
{
    
    const NOT_FOUND = 1;
    const WRONG_PW = 2;
    
    /**
     *
     * @param string $username
     * @param string $password
     * @return User
     */
    public static function authenticate($email, $password)
    {
        $user = User::find('all', array('conditions' => array('email = ?', $email)));
        if ($user) {
            if ($user[0]->password == $password)
                return $user;

            throw new Exception(self::WRONG_PW);
        }
        throw new Exception(self::NOT_FOUND);
    }

}

