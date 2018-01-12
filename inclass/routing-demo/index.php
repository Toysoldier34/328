<?php

//require the autoload file
require_once ('vendor/autoload.php');


//create an instance of the Base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
   /*
    $view = new View;
    echo $view->render
    ('views/home.html');
    echo '<h1>Hello, $f3 route!<h1>';
   */
   echo '<h1>Routing Demo</h1>';
}
);


//run Fat-Free
$f3->run();

