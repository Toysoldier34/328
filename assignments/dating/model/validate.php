<?php
/**
 * Created by PhpStorm.
 * User: Tony Thompson
 * Date: 2/2/2018
 * Time: 11:40 AM
 */

//checks to see that a string is all alphabetic
function validName($name) {
    return ctype_alpha($name);
}

//checks to see that an age is numeric and over 18
function validAge($age) {
    return (is_numeric($age) && $age >= 18);
}

//checks to see that a phone number is valid
function validPhone($phone) {
    return (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone));
}

//checks each selected outdoor interest against a list of valid options
function validOutdoor($outdoor) {
    $realOutdoors = array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing');
    foreach ($outdoor as $item) {
        if (!in_array($item, $realOutdoors)) return false;
    }
    return true;
}

//checks each selected indoor interest against a list of valid options
function validIndoor($indoor) {
    $realIndoors = array('tv', 'movies', 'cooking', 'board-games', 'puzzles', 'reading', 'playing-cards', 'video-games');
    foreach ($indoor as $item) {
        if (!in_array($item, $realIndoors)) return false;
    }
    return true;
}








