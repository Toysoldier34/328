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
$f3->route('GET|POST /create/profile-info', function() {
    //from personal-information
    $_SESSION['first'] = $_POST['first'];
    $_SESSION['last'] = $_POST['last'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];
    $template = new Template();
    echo $template->render('views/profile-info.html');
}
);

//define an interests route
$f3->route('GET|POST /create/interests', function() {
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
$f3->route('GET|POST /summary', function() {
    $_SESSION['indoor'] = $_POST['indoor'];
    $_SESSION['outdoor'] = $_POST['outdoor'];
    $template = new Template();
    echo $template->render('views/summary.html');
}
);





//run Fat-Free
$f3->run();