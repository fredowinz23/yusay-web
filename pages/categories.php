<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$category_list = category()->list("isDeleted=0");

?>

<style media="screen">
    .bg-primary{
        background: #03a64a !important;
    }
    .list-button{
      cursor: pointer;
    }
</style>

<center>
<h2>Programs Categories</h2>
</center>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" href="javascript:void(0)" id="btn-add-category">
  Add New Category +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Category</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process.php?action=category-save" method="post">

        <div class="modal-body">
          <b>Name:</b>
          <input type="hidden" name="Id" id="c-id">
          <input type="text" name="name" id="c-name" class="form-control" required>
          <br>
          <b>Description</b>
          <textarea name="description" id="c-description" class="form-control" required></textarea>
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

<table class="table">
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Action</th>
  </tr>

<?php
  $count = 0;
 foreach ($category_list as $row):
   $count +=1;
    ?>
  <tr class="category-items">
    <td class="category-data"
    data-id="<?=$row->Id;?>"
    data-name="<?=$row->name;?>"
    data-description="<?=$row->description;?>"
    ><?=$count;?></td>
    <td> <b><?=$row->name;?></b> <br>
      <i><?=nl2br($row->description);?></i>
    </td>
    <td></td>
    <td>
      <div class="action-btn">
          <ul class="list-group">
            <li class="list-group-item list-button bg-primary" onclick="location.href='programs.php?catId=<?=$row->Id?>'">View</li>
            <li class="list-group-item list-button bg-warning edit">Modify</li>
            <li class="list-group-item list-button bg-danger" onclick="location.href='process.php?action=category-delete&Id=<?=$row->Id?>'">Delete</li>
          </ul>
      </div>
    </td>
  </tr>

<?php endforeach; ?>

</table>


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

              $("#exampleModal").modal("show");
            });
          }

          editContact();

        });

      </script>
