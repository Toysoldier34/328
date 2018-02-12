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


    function login($username, $password)
    {
        $userList = array();
        include 'logins.php';
        if (in_array($username, $userList)) {
            if ($userList['$username'] == $password) {
            }
            echo $username . " is logged in.";
            $this->_loggedIn = true;
            return;
        }

        echo "Login error.";
    }


    function logout()
    {
        $this->_username = "";
        $this->_password = "";
        $this->_loggedIn = false;
    }


    /**** GETTERS SETTERS ****/

    /**
     * @return string
     */
    public
    function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param string $username
     */
    public
    function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @param string $password
     */
    public
    function setPassword($password)
    {
        if (strlen($password) > 5) {
            $this->_password = $password;
        }
    }


//end class
}