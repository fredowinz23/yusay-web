<?php

$random = 30;
$msg = "You lose";
if ($random>30) {
  $msg = "You win";
}
else{
  $msg = "Try again";
}

function check_age($x, $y){
  return $y ."'s age is " . $x;
}


$action = "a";

switch ($action) {
  case 'a':
    $msg = check_age(23, "Jerah");
    break;

  case 'b':
    $msg = check_age(23, "Chloie");
    break;

  default:
    // code...
    break;
}

 ?>

 <?=$msg;?>
