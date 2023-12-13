<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$status = get_query_string("status", "Pending");
$beneficiary_list = beneficiary()->list("status='$status'");

$pendingActive = "";
$approvedActive = "";
$deniedActive = "";
if ($status=="Pending") {
  $pendingActive = "active";
}
if ($status=="Approved") {
  $approvedActive = "active";
}
if ($status=="Denied") {
  $deniedActive = "active";
}
?>
<center>
<h2>Beneficiary Request</h2>
</center>
<br><br>

<ul class="nav nav-tabs mt-3">
<li class="nav-item">
  <a class="nav-link text-dark <?=$pendingActive?>" href="?status=Pending">Pending</a>
</li>
<li class="nav-item">
  <a class="nav-link text-dark <?=$approvedActive?>" href="?status=Approved">Approved</a>
</li>
<li class="nav-item">
  <a class="nav-link text-dark <?=$deniedActive?>" href="?status=Denied">Denied</a>
</li>
</ul>


<table class="table">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
    <th>Action</th>
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
    <td>
      <div class="action-btn">
        <a href="beneficiary-detail.php?Id=<?=$row->Id;?>" class="btn btn-info btn-sm">View</a>
        <?php if ($role=="Admin"): ?>
          <a href="process.php?action=change-beneficiary-status&status=Approved&Id=<?=$row->Id?>" class="btn btn-primary btn-sm">Approve</a>
          <a href="process.php?action=change-beneficiary-status&status=Denied&Id=<?=$row->Id?>" class="btn btn-danger btn-sm">Deny</a>
        <?php endif; ?>
      </div>
    </td>
  </tr>

<?php endforeach; ?>

</table>


      <?php include $ROOT_DIR . "templates/footer.php"; ?>
