<?php
/*
 * Tony Thompson Alex Shornal
 * tipcalc.php
 * 1/9/2018
 * Takes entered bill information and calculates tip and splitting bill
 */


//$bill  $tip  $people
function calcTip($bill, $tip) {
    $tipAmount = $bill * $tip;
    return $tipAmount;
}

function calcTax($bill) {
    $tax = $bill * .1;
    return $tax;
}

function perPerson($bill, $people) {
    $split = $bill / $people;
    return $split;
}

function convertPercent($tip) {
    $decimal = preg_replace("/[^0-9.]/", "", $tip);
    $decimal = $decimal / 100;
    return $decimal;
}

function isValidValue($value) {
    if(empty($value) || ($value < 0) || !(is_numeric($value))) {
        return false;
    }
    return true;

}