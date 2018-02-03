<?php
/**
 * Created by PhpStorm.
 * User: tonyg
 * Date: 1/19/2018
 * Time: 7:19 PM
 * index to route to pages for dating site
 */


//require the autoload file
require_once ('vendor/autoload.php');

ini_set("display_errors", 1);
error_reporting(E_ALL);


session_start();

//create an instance of the Base class
$f3 = Base::instance();

//set debug level
$f3->set('DEBUG', 3);

$f3->set('first', 'Sarah');
$f3->set('last', 'Smith');
$f3->set('age', '30');
$f3->set('phone', '222-333-4444');
$f3->set('email', 'dating@for.fun');

$f3->set('states', array('Idaho', 'Oregon', 'Washington'));


//define a default route
$f3->route('GET|POST /', function() {
    //default home
    $template = new Template();
    echo $template->render('views/home.html');
}
);

//define a default route
$f3->route('GET|POST /personal-information', function() {
    //from home
    $template = new Template();
    echo $template->render('views/personal-information.html');
}
);


//define a create profile info route
$f3->route('GET|POST /profile-info', function($f3) {
    //from personal-information

    $template = new Template();
    if(isset($_POST['submit'])) {
        $first = $_SESSION['first'] = $_POST['first'];
        $last = $_SESSION['last'] = $_POST['last'];
        $age = $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $phone = $_SESSION['phone'] = $_POST['phone'];

        $f3->set('first', $_SESSION['first']);
        $f3->set('last', $_SESSION['last']);
        $f3->set('age', $_SESSION['age']);
        $f3->set('gender', $_SESSION['gender']);
        $f3->set('phone', $_SESSION['phone']);

        include('model/validate.php');

        $isValid = $fVal = $lVal = $aVal = $pVal = true;

        if (!validName($first)) {
            $isValid = $fVal = false;
        }

        if (!validName($last)) {
            $isValid = $lVal = false;
        }

        if (!validAge($age)) {
            $isValid = $aVal = false;
        }

        if (!validPhone($phone)) {
            $isValid = $pVal = false;
        }

        if ($isValid) {
            echo $template->render('views/profile-info.html');
        } else {
            if (!$fVal) echo "<p>Enter a valid first name</p>";
            if (!$lVal) echo "<p>Enter a valid last name</p>";
            if (!$aVal) echo "<p>Enter a valid age over 18</p>";
            if (!$pVal) echo "<p>Enter a valid phone number</p>";
            echo $template->render('views/personal-information.html');
        }
    } else {
        echo $template->render('views/personal-information.html');
    }
}
);

//define an interests route
$f3->route('GET|POST /interests', function($f3) {
    //from profile
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['bio'] = $_POST['bio'];

    $f3->set('email', $_SESSION['email']);
    $f3->set('seeking', $_SESSION['seeking']);
    $f3->set('state', $_SESSION['state']);
    $f3->set('bio', $_SESSION['bio']);

    $template = new Template();
    echo $template->render('views/interests.html');
}
);

//define a summary route
$f3->route('GET|POST /summary', function($f3) {

    $template = new Template();
    if(isset($_POST['submit'])) {
    $indoor = $_SESSION['indoor'] = $_POST['indoor'];
    $outdoor = $_SESSION['outdoor'] = $_POST['outdoor'];
        $f3->set('indoor', $_SESSION['indoor']);
        $f3->set('outdoor', $_SESSION['outdoor']);

        include('model/validate.php');
        $isValid = $iVal = $oVal = true;

        if (!validOutdoor($outdoor)) {
            $isValid = $iVal = false;
        }

        if (!validIndoor($indoor)) {
            $isValid = $oVal = false;
        }



        if ($isValid) {
            echo $template->render('views/summary.html');
        } else {
            if (!$oVal) echo "<p>Valid outdoor activities only</p>";
            if (!$iVal) echo "<p>Valid indoor activities only</p>";
            echo $template->render('views/interests.html');
        }
    } else {
        echo $template->render('views/interests.html');
    }

}
);





//run Fat-Free
$f3->run();