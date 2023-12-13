<?php

$name = $_GET["name"];
$address = $_GET["address"];
$age = $_GET["age"];
$gender = $_GET["gender"];

$number = 0;

// $age = 25;
// $age = 35;

$number = 1;
$number += 1;
$number += 1;
$number -= 1;

$message = "";

if ($age>18) {
  $message = "You are an adult";
}
else{
  $message = "You are a minor";
}


$a = 1;
$b = 2;
$c = $a;
$d = $c;
$e = $f;
 ?>



My name is <?=$name;?>
<br>I live in <?=$address;?>
<br>Age: <?=$age;?>
<br>Number: <?=$number;?>
<br>Message: <?=$message;?>
<br>Message: <?=$gender;?>
