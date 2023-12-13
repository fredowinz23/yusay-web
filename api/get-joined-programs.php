<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = false;
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $status = $_POST["status"];
  $user = account()->get("username='$username'");
  $success = true;

  $program_list = array();

  foreach (joiner()->list("userId=$user->Id") as $row) {
    $program = program()->get("Id=$row->programId");
    if ($program->status==$status) {
      $item = program_interface($program);
      array_push($program_list, $item);
    }
  }
}

$json["username"] = $_POST["username"];
$json["status"] = $_POST["status"];
$json["program_list"] = $program_list;
$json["success"] = $success;

echo json_encode($json);
?>
