<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$catId = $_GET["catId"];

$dateNow = date("Y-m-d");
$status = get_query_string("status", "Pending");
$program_list = program()->list("categoryId=$catId and status='$status'");

$pActive = "";
$aActive = "";
$dActive = "";
$cActive = "";
if ($status=="Pending") {
  $pActive = "active";
}
if ($status=="Approved") {
  $aActive = "active";
}
if ($status=="dActive") {
  $dActive = "active";
}
if ($status=="cActive") {
  $cActive = "active";
}
?>
<center>
<h2>Programs List</h2>
</center>
<br><br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" href="javascript:void(0)" id="btn-add-item">
  Add New Event +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Program Form</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process.php?action=program-save" method="post" enctype="multipart/form-data">

        <input type="hidden" name="categoryId" value="<?=$catId;?>" required>

        <div class="modal-body">

            <div class="row">
              <div class="col-12">
                <b>Title:</b>
                <input type="text" name="title" id="c-title" class="form-control" required>
              </div>
              <div class="col-12">
                <b>Description:</b>
                <textarea name="description" id="c-description" class="form-control"></textarea>
              </div>
              <div class="col-6">
                <b>Date:</b>
                <input type="date" name="date" id="c-date" class="form-control" required>
              </div>
              <div class="col-6">
                <b>Time:</b>
                <input type="time" name="time" id="c-time" class="form-control" required>
              </div>

              <div class="col-12">
                <b>Address:</b>
                <textarea name="address" id="c-address" class="form-control"></textarea>
              </div>

              <div class="col-12">
                <b>Notes:</b>
                <textarea name="notes" id="c-notes" class="form-control"></textarea>
              </div>


              <div class="col-6">
                <b>Max Volunteer:</b>
                <input type="number" name="maxVolunteer" id="c-maxVolunteer" class="form-control" required>
              </div>


              <div class="col-6">
                <b>Amount Spent:</b>
                <input type="number" step=".01" name="amountSpent" id="c-amountSpent" class="form-control" required>
              </div>


              <div class="col-6">
                <b>Image:</b>
                <input type="file" name="image" class="form-control" required>
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
  <a class="nav-link text-dark <?=$pActive?>" href="?catId=<?=$catId?>&status=Pending">Pending</a>
</li>
<li class="nav-item">
  <a class="nav-link text-dark <?=$aActive?>" href="?catId=<?=$catId?>&status=Approved">Approved</a>
</li>
<li class="nav-item">
  <a class="nav-link text-dark <?=$dActive?>" href="?catId=<?=$catId?>&status=Denied">Denied</a>
</li>
<li class="nav-item">
  <a class="nav-link text-dark <?=$cActive?>" href="?catId=<?=$catId?>&status=Closed">Closed</a>
</li>
</ul>
<table class="table">
  <tr>
    <th>#</th>
    <th>Date</th>
    <th>Title</th>
    <th>Description</th>
    <th>Action</th>
  </tr>

<?php
  $count = 0;
 foreach ($program_list as $row):
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$row->date;?></td>
    <td><?=$row->title;?></td>
    <td><?=char_limit($row->description, 100);?></td>
    <td>
      <div class="action-btn">
        <a href="program-detail.php?Id=<?=$row->Id;?>" class="btn btn-info btn-sm">View</a>
      </div>
    </td>
  </tr>

<?php endforeach; ?>

</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

<script type="text/javascript">
var cDate = document.getElementById("c-date");

function validateDate(){
  var ToDate = new Date();
  if (new Date(cDate.value).getTime() <= ToDate.getTime()) {
      alert("Please select future dates");
      cDate.setCustomValidity("Please select future dates");
   }
   else{
     cDate.setCustomValidity('');
   }
}

cDate.onchange = validateDate;
cDate.onkeyup = validateDate;

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
