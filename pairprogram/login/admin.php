<?php
/**
 * User: tonyg
 * Date: 2/12/2018
 * Time: 11:43 AM
 */

Class Admin extends User {

    //field
    private $_accessLevel;

    function __construct($username, $password, $accessLevel)
    {
        $this->_username = $username;
        $this->_password = $password;
        $this->_loggedIn = false;
        $this->_accessLevel = $accessLevel;
    }





}//end class