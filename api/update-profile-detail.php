<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = true;
$username = $_POST["username"];
$model = account();
$model->obj["firstName"] = $_POST["firstName"];
$model->obj["lastName"] = $_POST["lastName"];
$model->obj["phone"] = $_POST["phone"];
$model->obj["email"] = $_POST["email"];
$model->update("username='$username'");

$json["username"] = $_POST["username"];
$json["success"] = $success;
echo json_encode($json);
?>
