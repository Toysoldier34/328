<?php
class Dog extends Pet {

    function fetch() {
        echo $this->name . " is fetching.";
    }
}