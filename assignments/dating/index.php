<?php
/**
 * Created by PhpStorm.
 * User: tonyg
 * Date: 1/19/2018
 * Time: 7:19 PM
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
$f3->route('GET|POST /profile-info', function() {
    //from personal-information

    if(isset($_POST['submit'])) {
        $first = $_SESSION['first'] = $_POST['first'];
        $last = $_SESSION['last'] = $_POST['last'];
        $age = $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $phone = $_SESSION['phone'] = $_POST['phone'];

        include('model/validate.php');
    }



    $template = new Template();
    echo $template->render('views/profile-info.html');
}
);

//define an interests route
$f3->route('GET|POST /interests', function() {
    //from profile
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['bio'] = $_POST['bio'];
    $template = new Template();
    echo $template->render('views/interests.html');
}
);

//define a summary route
$f3->route('GET|POST /summary', function($f3) {

    if(isset($_POST['submit'])) {
    $indoor = $_SESSION['indoor'] = $_POST['indoor'];
    $outdoor = $_SESSION['outdoor'] = $_POST['outdoor'];

        include('model/validate.php');


    }


    //set variables in hive
    $f3->set('first', $_SESSION['first']);
    $f3->set('last', $_SESSION['last']);
    $f3->set('age', $_SESSION['age']);
    $f3->set('gender', $_SESSION['gender']);
    $f3->set('phone', $_SESSION['phone']);

    $f3->set('email', $_SESSION['email']);
    $f3->set('seeking', $_SESSION['seeking']);
    $f3->set('state', $_SESSION['state']);
    $f3->set('bio', $_SESSION['bio']);

    $f3->set('indoor', $_SESSION['indoor']);
    $f3->set('outdoor', $_SESSION['outdoor']);

    $template = new Template();
    echo $template->render('views/summary.html');
}
);





//run Fat-Free
$f3->run();