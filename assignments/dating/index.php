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
    echo "TestHome4";
    $template = new Template();
    echo $template->render('views/home.html');
}
);

//define a default route
$f3->route('GET|POST /test', function() {
    $template = new Template();
    echo $template->render('views/home.html');
}
);


//define a create profile info route
$f3->route('GET|POST /create/profile-info', function() {
    $template = new Template();
    echo $template->render('views/profile-info.html');
}
);

//define an interests route
$f3->route('GET|POST /create/interests', function() {
    $template = new Template();
    echo $template->render('views/interests.html');
}
);

//define a summary route
$f3->route('GET|POST /summary', function() {
    $template = new Template();
    echo $template->render('views/summary.html');
}
);





//run Fat-Free
$f3->run();