<?php
require_once '../config/database.php';
require_once '../config/Models.php';

$json = array();

$brgy_list = array();

$cityId = $_GET["cityId"];
foreach (address()->list("refId=$cityId and type='Barangay'") as $row) {
  $item = array();
  $item["id"] = $row->Id;
  $item["name"] = $row->name;
  array_push($brgy_list, $item);
}
$city = address()->get("Id=$cityId");
$json["postalCode"] = $city->postalCode;
$json["brgy_list"] = $brgy_list;

echo json_encode($json);
?>
