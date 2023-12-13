<?php
require_once '../config/database.php';
require_once '../config/Models.php';

$countContact = contact()->count();

$Id = $_GET["Id"];
$contact = contact()->get("Id=$Id");

$contact_list = contact()->list();

?>

name:
<?=$contact->name?> <br>
contact:
<?=$contact->contact?> <br>


List of contacts:

<br>

<?php

$count = 0;
 foreach ($contact_list as $item):
   $count += 1;
   ?>

 <?=$count;?>. <?=$item->name?> - <?=$item->contact?> <br>

<?php endforeach; ?>
