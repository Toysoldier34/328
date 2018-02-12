<?php
/**
 * User: tonyg
 * Date: 2/12/2018
 * Time: 11:43 AM
 */


Class User
{
    private $_username;
    private $_password;
    private $_loggedIn;

    function __construct()
    {
        $this->_username = "";
        $this->_password = "";
        $this->_loggedIn = false;
    }//end constructor


    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        if (strlen($password) > 5) {
            $this->_password = $password;
        }
    }


//end class
}