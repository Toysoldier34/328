<?php
/**
 * User: tonyg
 * Date: 2/12/2018
 * Time: 11:43 AM
 */

/**
 * Class User verifies login info and retains users info and login status
 */
Class User
{

    //field
    private $_username;
    private $_password;
    private $_loggedIn;

    /**
     * User constructor.constructor for user initializes empty strings and sets loggedIn to false
     */
    function __construct()
    {
        $this->_username = "";
        $this->_password = "";
        $this->_loggedIn = false;
    }//end constructor


    /**
     * checks login info if valid
     * @param $username user login name
     * @param $password user password
     */
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


    /**
     * logs out user by reinitializing instance variables and setting loggedIn to false
     */
    function logout()
    {
        $this->_username = "";
        $this->_password = "";
        $this->_loggedIn = false;
    }


    /**** GETTERS SETTERS ****/

    /**
     * @return string username
     */
    public
    function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param string $username
     * sets username for current user
     */
    public
    function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @param string $password
     * sets password for current user
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