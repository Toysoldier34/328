<?php
/*
 * Tony Thompson Alex Shornal
 * restaurantcalc.php
 * 1/9/2018
 * Takes entered bill information and calculates tip and splitting bill
 */

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>
        Restaurant Calculator
    </title>
</head>

<body>

<h1>Restaurant Calculator</h1>

<?php
//print_r($_POST);


//initialize form variables
$bill = 0;
$tipString = "15%";
$people = 1;

//see if form was submitted
if (isset($_POST['submit'])) {

    include 'tipcalc.php';
    //process the form
    $isValid = true;

    //get the bill
    if (!empty($_POST['bill'])) {
        $bill = $_POST['bill'];
        if (!isValidValue($bill)) {
            echo '<p>Please enter bill</p>';
            $isValid = false;
        }
    } else {
        echo '<p>Please enter bill</p>';
        $isValid = false;
    }

    //get the tip
    if (!empty($_POST['tip'])) {
        $tipString = $_POST['tip'];
        $tip = convertPercent($tipString);
    } else {
        echo '<p>Please enter a tip</p>';
        $isValid = false;
    }

    //get the selected people
    if (!empty($_POST['people'])) {
        $people = $_POST['people'];
        if (!isValidValue($people)) {
            echo "<p>Please enter number of people.</p>";
            $isValid = false;
        }
    } else {
        echo "<p>Please enter number of people.</p>";
        $isValid = false;
    }


    //if the form is valid...
    if ($isValid) {
        $newTip = calcTip($bill,$tip);
        $newTax = calcTax($bill);
        $newBill = ($bill + $newTip + $newTax);
        $billSplit = perPerson($newBill,$people);
        echo "<p>Bill Tax: ", $newTax, "</p>";
        echo "<p>Bill Tip: ", $newTip,"</p>";
        echo "<p>Bill Total: ", $newBill,"</p>";
        echo "<p>Per Person: ", $billSplit,"</p>";
    }


}

?>

<form action="" method="post">
    <label>Bill Amount: <input type="text" name="bill" value="<?php echo $bill; ?>"></label><br>
    <label>Tip Percentage: <input type="text" name="tip" value="<?php echo $tipString; ?>" ></label><br>
    <label>Number of People: <input type="text" name="people" value="<?php echo $people; ?>" ></label><br>

    <input type="submit" value="Submit" name="submit">
</form>

</body>
</html>


















