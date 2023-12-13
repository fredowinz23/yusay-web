<?php

$test = 'boy';
$name = 'Jerah';


switch ($test) {
  case 'apple':
      apple_msg();
    break;

  case 'boy':
      boy_msg();
    break;


  case 'cat':
    // code...
    break;

  default:
    // code...
    break;
}

function apple_msg(){
  echo $name . ' is eating an apple';
}

function boy_msg(){
  echo $name . ' is a boy';
}

 ?>



 <b><?=$msg;?></b>
