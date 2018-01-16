<?php
// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');

$f3 = Base::instance();

//set debug level
$f3->set('DEBUG', 3);

$f3 -> route('GET /', function() {
    echo "Pet Home!";

    $view = new View;
    echo $view->render
    ('views/home.html');
}
);

//Run Fat-Free Framework
$f3->run();
