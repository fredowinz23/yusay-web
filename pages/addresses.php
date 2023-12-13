<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$type = get_query_string("type", "City");
$refId = get_query_string("refId", "");
$address_list = address()->list("type='$type'");
if ($refId) {
  $address_list = address()->list("type='$type' and refId=$refId");
}

?>
<center>
<h2>Address Option List</h2>
</center>
<br><br>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" href="javascript:void(0)" id="btn-add-item">
  Add New <?=$type;?> +
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add <?=$type?></h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="process.php?action=address-save" method="post" enctype="multipart/form-data">

        <input type="hidden" name="Id" id="c-id">
        <input type="hidden" name="type" value="<?=$type;?>" required>
        <input type="hidden" name="refId" value="<?=$refId;?>" required>

        <div class="modal-body">
          <b><?=$type?> Name</b>
          <input type="text" name="name" class="form-control" required>
          <?php if ($type=="City"): ?>
            <b>Postal Code</b>
            <input type="text" name="postalCode" class="form-control" required>
          <?php endif; ?>
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
    <th><?=$type?></th>
    <?php if ($type=="City"): ?>
      <th>Postal Code</th>
    <?php endif; ?>
    <th width="100">Action</th>
  </tr>

<?php
  $count = 0;
 foreach ($address_list as $row):
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$row->name;?></td>

    <?php if ($type=="City"): ?>
      <td><?=$row->postalCode;?></td>
    <?php endif; ?>
    <td>
      <div class="action-btn">
          <div class="action-btn">
            <?php if ($type=="City"): ?>

            <a href="addresses.php?type=Barangay&refId=<?=$row->Id?>" class="text-info">
              <i class="fa fa-eye fs-5" style="font-size:30px;"></i>
            </a>
          <?php endif; ?>
            <a href="process.php?action=address-delete&type=<?=$type?>&refId=<?=$refId?>&Id=<?=$row->Id?>" class="text-dark ms-2">
              <i class="fa fa-trash fs-5"  style="color:red;font-size:30px;margin-left:10px;"></i>
            </a>
          </div>
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
