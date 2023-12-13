<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$mission_list = mission()->list("isDeleted=0");

?>
<center>
<h2>Missions</h2>
</center>
<br><br>

<style media="screen">
  .card-category{
    cursor: pointer;
    min-height: 200px;
  }
  .card-category:hover{
    background: #f0f2f0;
  }
</style>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" href="javascript:void(0)" id="btn-add-category">
  Add New Missions +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Mission</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process.php?action=mission-save" method="post">

        <div class="modal-body">
          <b>Name:</b>
          <input type="hidden" name="Id" id="c-id">
          <input type="text" name="name" id="c-name" class="form-control" required>
          <br>
          <b>Description</b>
          <textarea name="description" id="c-description" class="form-control" required></textarea>
          <br>
          <b>Date:</b>
          <input type="date" name="date" id="c-date" class="form-control" required>
          <br>
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

<div class="row mt-3">

  <?php foreach ($mission_list as $row):
     ?>
    <div class="col-lg-3 mt-2 category-items">
        <div class="card card-category"  onmouseover="display_button('button_<?=$row->Id?>')"  onmouseout="hide_button('button_<?=$row->Id?>')" style="min-height:150px;">
          <div class="card-body category-data"
          data-id="<?=$row->Id;?>"
          data-name="<?=$row->name;?>"
          data-description="<?=$row->description;?>"
          data-date="<?=$row->date;?>"
          >
            <h3><?=$row->name;?></h3>
            <p><?=char_limit($row->description, 100);?></p>
            <div id="button_<?=$row->Id?>" style="display:none;" class="row">
              <a href="mission-joiners.php?missionId=<?=$row->Id?>" class="btn btn-primary mt-2">View Joiners</a> &nbsp;&nbsp;&nbsp;
              <a href="javascript:void(0)" class="btn btn-warning edit mt-2">Modify</a> &nbsp;&nbsp;&nbsp;
              <a href="process.php?action=category-delete&Id=<?=$row->Id?>" class="btn btn-danger mt-2">Delete</a>
            </div>
          </div>
        </div>
    </div>
<?php endforeach;?>

</div>


<script type="text/javascript">
  function display_button(x){
    document.getElementById(x).style = "display:";
  }
  function hide_button(x){
    document.getElementById(x).style = "display:none";
  }
</script>

<?php include $ROOT_DIR . "templates/footer.php"; ?>


<script type="text/javascript">
$(function () {

    $("#btn-add-category").on("click", function (event) {

      $("#exampleModal #btn-add").show();
      $("#exampleModal #btn-edit").hide();
      $("#exampleModal").modal("show");
    });

    function editContact() {
      $(".edit").on("click", function (event) {

        $("#exampleModal #btn-add").hide();
        $("#exampleModal #btn-edit").show();

        var getParentItem = $(this).parents(".category-items");
        var getModal = $("#exampleModal");

        // Get List Item Fields
        var $_name = getParentItem.find(".category-data");

        // Set Modal Field's Value
        getModal.find("#c-id").val($_name.attr("data-id"));
        getModal.find("#c-name").val($_name.attr("data-name"));
        getModal.find("#c-description").html($_name.attr("data-description"));
        getModal.find("#c-date").val($_name.attr("data-date"));

        $("#exampleModal").modal("show");
      });
    }

    editContact();

  });

</script>
