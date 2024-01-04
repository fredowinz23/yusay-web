<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$status = get_query_string("status", "Pending");
$type = get_query_string("type", "");
$refId = get_query_string("refId", "");

if ($type=="City") {
  $beneficiary_list = beneficiary()->list("cityId=$refId");
}
if ($type=="Barangay") {
  $beneficiary_list = beneficiary()->list("brgyId=$refId");
}

$address = address()->get("Id=$refId");

?>
<center>
<h2><?=$address->name?>'s beneficiaries</h2>
</center>
<br><br>


<table class="table">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Tell us about your situation</th>
  </tr>

<?php
  $count = 0;
 foreach ($beneficiary_list as $row):
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$row->firstName;?> <?=$row->lastName;?></td>
    <td><?=$row->content;?></td>

  </tr>

<?php endforeach; ?>

</table>


      <?php include $ROOT_DIR . "templates/footer.php"; ?>
