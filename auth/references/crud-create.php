<?php
require_once '../config/database.php';
require_once '../config/Models.php';


$name = $_GET["name"];
$contact = $_GET["contact"];
// Create sample

$model = contact();
$model->obj["name"] = $name;
$model->obj["contact"] = $contact;
$model->create();

?>
