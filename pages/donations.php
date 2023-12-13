<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$status = get_query_string("status", "Pending");
$donation_list = donation()->list("status='$status'");

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
<h2>Donation List</h2>
</center>
<br><br>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" href="javascript:void(0)" id="btn-add-item">
  Add New Donation +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Donation Form</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process.php?action=donation-by-staff-submit" method="post" enctype="multipart/form-data">

        <input type="hidden" name="Id" id="c-id">
        <input type="hidden" name="categoryId" value="<?=$catId;?>" required>

        <div class="modal-body">


            <h2>Personal Information</h2>
            <div class="row">
              <div class="col-6">
                <b>First Name:</b>
                <input type="text" name="firstName" id="c-firstName" class="form-control" required>
              </div>
              <div class="col-6">
                <b>Last Name:</b>
                <input type="text" name="lastName" id="c-lastName" class="form-control" required>
              </div>
              <div class="col-4">
                <b>Email:</b>
                <input type="text" name="email" id="c-email" class="form-control" required>
              </div>
              <div class="col-2">
                <b>Age:</b>
                <input type="text" name="age" id="c-age" class="form-control" required>
              </div>
              <div class="col-2">
                <b>Gender:</b>
                <select name="gender" id="c-gender" class="form-control" required>
                  <option value="">--Select--</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="col-4">
                <b>Contact #:</b>
                <input type="text" name="contactNumber" id="c-phone" class="form-control" required>
              </div>

              <div class="col-4">
                <b>Prefer to be anonymous?:</b>
                <select name="isAnonymous"  class="form-control" required>
                  <option value="">--Select--</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>

              <div class="col-6">
                <b>Donation amount:</b>

                <input type="double" step=".01" class="form-control" name="amount" required>
              </div>

            </div>
              <h2>Location</h2>
              <div class="row">
                <div class="col-12">
                  <b>Address:</b>
                  <input type="text" name="address" id="c-address" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>Barangay:</b>
                  <input type="text" name="barangay" id="c-barangay" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>City/Municipality:</b>
                  <input type="text" name="city" id="c-city" class="form-control" required>
                </div>
                <div class="col-12">
                  <b>Personal Kind note to us:</b>
                  <textarea name="content" id="c-content" class="form-control"></textarea>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button name="form-type" value="add" id="btn-add" class="btn btn-primary">Add</button>
          <button name="form-type" value="edit" id="btn-edit" class="btn btn-warning">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
 foreach ($donation_list as $row):
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$row->firstName;?> <?=$row->lastName;?></td>
    <td><?=$row->content;?></td>
    <td>
      <div class="action-btn">
        <a href="donation-detail.php?Id=<?=$row->Id;?>" class="btn btn-info btn-sm">View</a>
        <?php if ($role=="Admin"): ?>
          <?php if ($row->status=="Pending"): ?>
              <a href="process.php?action=change-donation-status&status=Approved&Id=<?=$row->Id?>" class="btn btn-primary btn-sm">Approve</a>
              <a href="process.php?action=change-donation-status&status=Denied&Id=<?=$row->Id?>" class="btn btn-danger btn-sm">Deny</a>
          <?php else: ?>
            <a href="process.php?action=change-donation-status&status=Pending&Id=<?=$row->Id?>" class="btn btn-warning btn-sm">Change</a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </td>
  </tr>

<?php endforeach; ?>

</table>


      <?php include $ROOT_DIR . "templates/footer.php"; ?>


      <script type="text/javascript">
      $(function () {

          $("#btn-add-item").on("click", function (event) {

            $("#exampleModal #btn-add").show();
            $("#exampleModal #btn-edit").hide();
            $("#exampleModal").modal("show");
          });

          function editContact() {
            $(".edit").on("click", function (event) {

              $("#exampleModal #btn-add").hide();
              $("#exampleModal #btn-edit").show();

              var getParentItem = $(this).parents(".item-items");
              var getModal = $("#exampleModal");

              // Get List Item Fields
              var $_name = getParentItem.find(".item-data");

              // Set Modal Field's Value
              getModal.find("#c-id").val($_name.attr("data-id"));
              getModal.find("#c-name").val($_name.attr("data-name"));
              getModal.find("#c-description").html($_name.attr("data-description"));

              $("#exampleModal").modal("show");
            });
          }

          editContact();

        });

      </script>
