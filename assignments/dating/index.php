<?php
/**
 * Created by PhpStorm.
 * User: tonyg
 * Date: 1/19/2018
 * Time: 7:19 PM
 * index to route to pages for dating site
 */


//require the autoload file
require_once('vendor/autoload.php');

ini_set("display_errors", 1);
error_reporting(E_ALL);


session_start();

//create an instance of the Base class
$f3 = Base::instance();

//set debug level
$f3->set('DEBUG', 3);

$dbfunc = new dbfunctions();
$dbh = $dbfunc->connect();

$f3->set('first', 'Sarah');
$f3->set('last', 'Smith');
$f3->set('age', '30');
$f3->set('phone', '222-333-4444');
$f3->set('email', 'dating@for.fun');

$f3->set('states', array('Idaho', 'Oregon', 'Washington'));


//define a default route
$f3->route('GET|POST /', function () {
    //default home
    $template = new Template();
    echo $template->render('views/home.html');
}
);

//define a personal information route
$f3->route('GET|POST /personal-information', function () {
    //from home
    $template = new Template();
    echo $template->render('views/personal-information.html');
}
);


//define a create profile info route
$f3->route('GET|POST /profile-info', function ($f3) {
    //from personal-information
    //print_r($_POST);
    $template = new Template();
    if (isset($_POST['submit'])) {
        $first = $_SESSION['first'] = $_POST['first'];
        $last = $_SESSION['last'] = $_POST['last'];
        $age = $_SESSION['age'] = $_POST['age'];
        $gender = $_SESSION['gender'] = $_POST['gender'];
        $phone = $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['premium'] = $_POST['premium'];

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
            //initialize member object
            if (isset($_SESSION['premium'])) {
                $member = new PremiumMember($first, $last, $age, $gender, $phone);
            } else {
                $member = new Member($first, $last, $age, $gender, $phone);
            }
            $_SESSION['member'] = $member;

            echo $template->render('views/profile-info.html');
        } else {
            if (!$fVal) echo "<p>Enter a valid first name</p>";
            if (!$lVal) echo "<p>Enter a valid last name</p>";
            if (!$aVal) echo "<p>Enter a valid age over 18</p>";
            if (!$pVal) echo "<p>Enter a valid phone number</p>";

            echo $template->render('views/personal-information.html');
        }
    } else {
        $f3->reroute('/personal-information');
    }
}
);


//define an interests route
$f3->route('GET|POST /interests', function ($f3) {
    //print_r($_POST);
    //from profile
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['bio'] = $_POST['bio'];

    $f3->set('email', $_SESSION['email']);
    $f3->set('seeking', $_SESSION['seeking']);
    $f3->set('state', $_SESSION['state']);
    $f3->set('bio', $_SESSION['bio']);

    $member = $_SESSION['member'];

    $member->setEmail($_SESSION['email']);
    $member->setSeeking($_SESSION['seeking']);
    $member->setState($_SESSION['state']);
    $member->setBio($_SESSION['bio']);

    $_SESSION['member'] = $member;

    $template = new Template();

    if (isset($_SESSION['premium'])) {
       echo $template->render('views/interests.html');
    } else {
        $f3->reroute('/summary');
    }
}
);


//define a summary route
$f3->route('GET|POST /summary', function ($f3) {
    //print_r($_POST);
    $template = new Template();
    if (isset($_POST['submit'])) {
        $indoor = $_SESSION['indoor'] = $_POST['indoor'];
        $outdoor = $_SESSION['outdoor'] = $_POST['outdoor'];
    }

    //sets indoor outdoor interests to user object
    if (isset($_SESSION['premium'])) {
        $member = $_SESSION['member'];
        $member->setOutdoor($_SESSION['outdoor']);
        $member->setIndoor($_SESSION['indoor']);
        $_SESSION['member'] = $member;
    }

    //$member = new PremiumMember($first, $last, $age, $gender, $phone);
    $member = $_SESSION['member'];

    $f3->set('first', $member->getFname());
    $f3->set('last', $member->getLname());
    $f3->set('age', $member->getAge());
    $f3->set('gender', $member->getGender());
    $f3->set('phone', $member->getPhone());

    $f3->set('email', $member->getEmail());
    $f3->set('seeking', $member->getSeeking());
    $f3->set('state', $member->getState());
    $f3->set('bio', $member->getBio());

    if (isset($_SESSION['premium'])) {
        $premium = 1;

        $f3->set('indoor', $member->getIndoor());
        $f3->set('outdoor', $member->getOutdoor());

        $f3->set('premium', $_SESSION['premium']);
        $interests = implode(", " , $member->getIndoor());
        $interests .= ", ";
        $interests .= implode(", ", $member->getOutdoor());
    } else {
        $premium = 0;
    }

    include('model/validate.php');
    $isValid = $iVal = $oVal = true;

    if (!validOutdoor($outdoor)) {
        $isValid = $iVal = false;
    }
    if (!validIndoor($indoor)) {
        $isValid = $oVal = false;
    }


    if ($isValid) {  //valid data to now display and add to database
        //add member to database

        $fname = $member->getFName();
        $lname = $member->getLName();
        $age = $member->getAge();
        $gender = $member->getGender();
        $phone = $member->getPhone();
        $email = $member->getEmail();
        $seeking = $member->getSeeking();
        $state = $member->getState();
        $bio = $member->getBio();
        $image = "http://athompson.greenriverdev.com/328/assignments/dating/images/splash.jpg";


        $dbfunc = new dbfunctions();
        $success = $dbfunc->addMember($fname, $lname, $age, $gender, $phone, $email,
            $state, $seeking, $bio, $premium, $image, $interests);
        if($success){
            //echo "Member added successfully";
        }else{
            //echo "Member not added";
        }

        //display page
        echo $template->render('views/summary.html');
    } else {
        if (!$oVal) echo "<p>Valid outdoor activities only</p>";
        if (!$iVal) echo "<p>Valid indoor activities only</p>";

        $f3->reroute('/interestsnotvalid');
        echo "summary not valid";
        //checks if premium
        if (isset($_SESSION['premium'])) {
            $f3->reroute('/interests');
        } else {
            $f3->reroute('/profile-info');
        }
    }//end if isValid

}
);




//define an admin route
$f3->route('GET|POST /admin', function ($f3) {
    $dbfunc = new dbfunctions();
    $members = $dbfunc->getMembers();
    $f3->set('members', $members);

    $template = new Template();
    echo $template->render('views/admin.html');
}
);





//run Fat-Free
$f3->run();



