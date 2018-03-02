<?php

function validZip($str) {
    $regex = '/^\d{5,9}$/';
    return preg_match($regex, $str);
}

$zips = array(44444, 63246, 23478, 5767667, 456);

foreach ($zips as $zip) {
    $tf = validZip($zip);
    $tf = ($tf) ? 'true' : 'false';
    echo '<p>' . $zip . $tf . '</p>';
}