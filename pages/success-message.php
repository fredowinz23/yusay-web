<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header-blank.php";

$success = $_GET["success"];
?>

<center>
<div class="card" style="width:50%;margin-top:150px;">
  <div class="card-body">
    <h2><?=$success;?></h2>
    <a href="../client" class="btn btn-primary btn-sm">Close</a>
  </div>
</div>
