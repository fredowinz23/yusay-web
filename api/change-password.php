<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$response = "";
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $checkUserExist = account()->count("username='$username' and role='Volunteer'");
  if ($checkUserExist > 0) {
    $model = account();
    $model->obj["password"] = md5($_POST["password"]);
    $model->obj["status"] = "Active";
    $model->obj["tempPassword"] = "";
    $model->update("username='$username'");

    $user = account()->get("username='$username'");
    $success = true;
    $response = array();
    $response["id"] = $user->Id;
    $response["username"] = $user->username;
    $response["first_name"] = $user->firstName;
    $response["last_name"] = $user->lastName;
    $response["status"] = $user->status;
    $json["profile"] = $response;
  }
}

$json["username"] = $_POST["username"];
$json["password"] = $_POST["password"];
$json["success"] = $success;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
