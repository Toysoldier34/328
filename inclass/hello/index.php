<?php

//require the autoload file
require_once ('vendor/autoload.php');

ini_set("display_errors", 1);
error_reporting(E_ALL);

//create an instance of the Base class
$f3 = Base::instance();
$f3->set(DEBUG, 3);

//default route
$f3->route('GET /', function($f3) {
    //save variables
    $f3->set('username', 'jshmo');
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'Working with Templates');
    $f3->set('temp', 68);

    //load a template
    $template = new Template();
    echo $template->render('views/info.html');
    //alternate syntax
    // echo Template::instance()->render('views/info.html');
});


//route to pets
$f3->route('GET /pets', function($f3) {
   echo "<h1>Invest in Bees!</h1>";

   require('classes/pet.php');
   $pet1 = new Pet("Elsalvador", "pink");
   $pet2 = new Pet("Kingsly");
   $pet3 = new Dog();
   $pet4 = new Cat();

   $pet3->setName("Dingus");

   if ($pet3 instanceof Dog) {
       echo $pet3->getName() . " is a dog. ";
       $pet3->fetch();
   }



   $pet1->eat();
   $pet2->eat();
   $pet3->eat();

   $pet4->scratch();

   print_r($pet1);

});


//run Fat-Free
$f3->run();
