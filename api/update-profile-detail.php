<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = true;
$username = $_POST["username"];
$user = account()->get("username='$username'");
$vol = volunteer()->get("Id=$user->volunteerId");
$model = volunteer();
$model->obj["firstName"] = $_POST["firstName"];
$model->obj["lastName"] = $_POST["lastName"];
$model->obj["mobileNumber"] = $_POST["phone"];
$model->obj["email"] = $_POST["email"];
$model->update("Id=$user->volunteerId");

$json["username"] = $_POST["username"];
$json["success"] = $success;
echo json_encode($json);
?>
