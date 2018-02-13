<?php

require('user.php');
require('admin.php');

$userA =new User();
$userA->setUsername("user1");
$userA->setPassword("password1");
$userA->login();

echo "<br><br>";

$userB =new User();
$userB->setUsername("user2");
$userB->setPassword("pass3");
$userB->login();

echo "<br><br>";

echo "<p>UserB password changed to password2</p>";
$userB->setPassword("password2");
$userB->login();
$userB->logout();


$userAdmin = new Admin("admin1", "Passw0rd", 3);
echo $userAdmin->getAccessLevel() . "<br>";
$userAdmin->setAccessLevel(4);
echo $userAdmin->getAccessLevel();
$userAdmin->editUser($userA);

