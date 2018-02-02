<?php
/**
 * Created by PhpStorm.
 * User: tonyg
 * Date: 1/30/2018
 * Time: 10:16 AM
 */

/**
 * Class Pet
 *
 * Represents a Pet with a name and color
 *
 * Pets can eat and have their name and color changed
 * @author Tony Thompson <tony.g.thompson@gmail.com>
 * @copyright 2018
 */
class Pet {
    //field
    //protected are visible to any classes extending this one
    protected $name;
    protected $color;
    //private variables start with _ in name
    private $_example;

    function __construct($name="unknown", $color="?") {
        $this->name = $name;
        $this->color = $color;
    }


    /**
     * Function that causes the pet to eat
     * printing out a message
     * @return void
     */
    function eat() {
        echo $this->name . " is eating.";
        echo "<h4>$this->name is indifferent to your affection.</h4>";
    }//end eat

    /**
     * gets the pet's name
     * @return string name
     */
    function getName() {
        return $this->name;
    }

    /**
     * set name
     * changes pets name to given String
     * @param $name String new name
     */
    function setName($name) {
        $this->name = $name;
    }


}//end class