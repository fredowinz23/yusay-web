<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$missionId = $_GET["missionId"];
$joiner_list = joiner()->list();
$volunteer_list = account()->list("role='Volunteer'");
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" href="javascript:void(0)" id="btn-add-item">
  Add New Joiner +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Joiner Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process.php?action=joiner-add" method="post" enctype="multipart/form-data">

        <input type="hidden" name="missionId" value="<?=$missionId;?>" required>

        <div class="modal-body">
              <b>Select Volunteer:</b>
              <select name="userId" class="form-control" required>
                <option value="">--Select--</option>
                <?php foreach ($volunteer_list as $row): ?>
                  <option value="<?=$row->Id?>"><?=$row->firstName;?> <?=$row->lastName;?></option>
                <?php endforeach; ?>
              </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button name="form-type" value="add" id="btn-add" class="btn btn-primary">Add</button>
          <button name="form-type" value="edit" id="btn-edit" class="btn btn-warning">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<table class="table">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Action</th>
  </tr>

<?php
  $count = 0;
 foreach ($joiner_list as $row):
   $vol = account()->get("Id=$row->userId");
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$vol->firstName;?> <?=$vol->lastName;?></td>
    <td>
      <div class="action-btn">
        <a href="process.php?action=joiner-delete&Id=<?=$row->Id?>&missionId=<?=$missionId?>" class="text-dark ms-2">
          <i class="fa fa-trash fs-5"></i>
        </a>
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


  });

</script>
