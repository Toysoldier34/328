<?php

//require the autoload file
require_once ('vendor/autoload.php');

error_reporting(E_ALL);

session_start();

//create an instance of the Base class
$f3 = Base::instance();

//set debug level
$f3->set('DEBUG', 3);


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

//define a page1 route
$f3->route('GET /page1', function() {
    echo '<h1>This is page 1</h1>';
}
);

//define a page1 subpage route
$f3->route('GET /page1/subpage-a', function() {
    echo '<h1>This is page 1, subpage a</h1>';
}
);

//define a page2 route
$f3->route('GET /page2', function() {
    echo '<h1>This is page 2</h1>';
}
);

//define a rings route
$f3->route('GET /rings', function() {
    $template = new Template();
    echo $template->render('views/rings.html');
}
);

//define a bracelet route
$f3->route('GET /bracelet', function() {
    echo '<h1>This is bracelet page</h1>';
}
);

/*
 * params
 */

//params is a fat free array
//define a name route
$f3->route('GET /helloname/@name',
    function($f3, $params) {
        $name = $params['name'];
        echo "<h1>Hello, $name</h1>";
}
);

//define a language route
$f3->route('GET /language/@lang', function($f3, $params) {
    switch($params['lang']) {
        case 'swahili':
            echo 'Jumbo!'; break;
        case 'spanish':
            echo 'Hola!'; break;
        case 'russian':
            echo 'Privet!'; break;
        //reroute to another page
        case 'french':
            $f3->reroute('/'); break;
        //404 error
        default:
            $f3->error(404);
    }
}
);

//define a name route
$f3->route('GET /hello/@name',
    function($f3, $params) {
        $f3->set('name', $params['name']);
        $template = new Template();
        echo $template->render('views/hello.html');
    }
);

//define a hi route
$f3->route('GET /hi/@first/@last',
    function($f3, $params) {
        $f3->set('first', $params['first']);
        $f3->set('last', $params['last']);
        $f3->set('message', 'Hi');

        $_SESSION['first'] = $f3->get('first');
        $_SESSION['last'] = $f3->get('last');

        $template = new Template();
        echo $template->render('views/hi.html');
    }
);

//define a hi-again route
$f3->route('GET /hi-again',
    function($f3, $params) {
        echo 'Hi again, ' .$_SESSION['first'];

    }
);

//run Fat-Free
$f3->run();

