<?php

// $name = $_POST["username"];
// $age = $_POST["age"];

function check_age($x, $y){
  return $y ."'s age is " . $x;
}

$age = 30;
$name = "Chloie";


$result = check_age($age, $name);
 ?>

 Display: <?=$result?>
