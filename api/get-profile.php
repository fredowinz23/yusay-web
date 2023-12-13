<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = true;
$username = $_POST["username"];
$user = account()->get("username='$username'");
$item = user_interface($user);


$json["username"] = $_POST["username"];
$json["profile"] = $item;
$json["success"] = $success;

echo json_encode($json);
?>
