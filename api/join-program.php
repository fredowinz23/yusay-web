<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$response = "";
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $programId = $_POST["programId"];
  $user = account()->get("username='$username'");
  $program = program()->get("Id=$programId");
  $currentVolunteer = joiner()->count("programId=$programId");
  $checkJoinExist = joiner()->count("userId=$user->Id and programId=$programId");
  if ($checkJoinExist > 0) {
    $response = "alreadyJoined";
  }
  else if($currentVolunteer>=$program->maxVolunteer){
    $response = "reachedMaxVolunteer";
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