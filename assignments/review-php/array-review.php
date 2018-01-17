<?php
/**
 * Created by PhpStorm.
 * User: tonyg
 * Date: 1/16/2018
 * Time: 4:26 PM
 */

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);


//Part 1

$animals = array("panda", "alpaca", "boa");
echo "<h3>Part 1</h3>";
sortPrint($animals);
addToAnimals("goat");
sortPrint($animals);
addToAnimals("Boa");
sortPrint($animals);

function sortPrint($array) {
    sort($array);
    $print = "";
    foreach ($array as $i) {
        $print = $print . ' ' . $i;
    }
    echo "<p>".$print."</p>";
}
