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

function addToAnimals($word) {
    global $animals;
    echo "<p>adding " . $word . "...</p>";
    $word = strtolower($word);
    foreach ($animals as $i) {
        $i = strtolower($i);
         if ($i === $word) {
             echo "<p>already in list</p>";
             return;
         }
    }
    array_push($animals, $word);
}


//Part 2

echo "<h3>Part 2</h3>";

$cupcakes = array(
    "grasshopper"=>"The Grasshopper",
    "maple"=>"Whiskey Maple Bacon",
    "carrot"=>"Carrot Walnut",
    "caramel"=>"Salted Caramel Cupcake",
    "velvet"=>"Red Velvet",
    "lemon"=>"Lemon Drop",
    "tiramisu"=>"Tiramisu"
);

foreach ($cupcakes as $name => $displayName) {
    echo '<input type="checkbox" name="flavors[]" value="'.$name.'"> '.$displayName.'<br>';

}
