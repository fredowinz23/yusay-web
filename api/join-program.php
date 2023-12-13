<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$response = "";
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $programId = $_POST["programId"];
  $user = account()->get("username='$username'");
  $checkJoinExist = joiner()->count("userId=$user->Id and programId=$programId");
  if ($checkJoinExist > 0) {
    $response = "alreadyJoined";
  }
  else{
    $model = joiner();
    $model->obj["programId"] = $programId;
    $model->obj["userId"] = $user->Id;
    $model->create();
    $response = "successfullyJoined";
  }
}

$json["username"] = $_POST["username"];
$json["programId"] = $_POST["programId"];
$json["success"] = $success;
$json["response"] = $response;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
