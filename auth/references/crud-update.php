<?php
require_once '../config/database.php';
require_once '../config/Models.php';


$Id = $_GET["Id"];
// Create sample

$model = contact();
$model->delete("Id=$Id");

?>
