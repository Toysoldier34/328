<?php
/**
 * Created by PhpStorm.
 * User: tonyg
 * Date: 1/30/2018
 * Time: 11:43 AM
 */

class Cat extends Pet{

    function scratch() {
        echo $this->name . " scratched yo bizz up.";
    }
}