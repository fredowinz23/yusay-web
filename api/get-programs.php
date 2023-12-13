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

  foreach (program()->list("status='$status'") as $row) {
    $item = program_interface($row);
    array_push($program_list, $item);
  }
}

$json["username"] = $_POST["username"];
$json["status"] = $_POST["status"];
$json["program_list"] = $program_list;
$json["success"] = $success;

echo json_encode($json);
?>
