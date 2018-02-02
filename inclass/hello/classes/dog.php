<?php
class Dog extends Pet {

    function fetch() {
        echo $this->name . " is fetching.";
    }

    function talk() {
        echo $this->name ." says Bow Wow Baby";
    }
}