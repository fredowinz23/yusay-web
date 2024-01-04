<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = true;
$username = $_POST["username"];
$user = account()->get("username='$username'");
$vol = volunteer()->get("Id=$user->volunteerId");
$item = volunteer_interface($vol);


$json["username"] = $_POST["username"];
$json["profile"] = $item;
$json["success"] = $success;

echo json_encode($json);
?>
