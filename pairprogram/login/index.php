<?php

require('user.php');

$userA =new User();
$userA->setUsername("user1");
$userA->setPassword("password1");
$userA->login();
$userA->logout();

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