<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$status = get_query_string("status", "Approved");
$program_list = program()->list("status='$status'");

$oActive = "";
$cActive = "";
if ($status=="Approved") {
  $oActive = "active";
}
if ($status=="Closed") {
  $cActive = "active";
}
?>
<center>
<h2>Programs List</h2>
</center>



<ul class="nav nav-tabs mt-3">
<li class="nav-item">
  <a class="nav-link text-dark <?=$oActive?>" href="?status=Approved">Open</a>
</li>
<li class="nav-item">
  <a class="nav-link text-dark <?=$cActive?>" href="?status=Closed">Closed</a>
</li>
</ul>
<table class="table">
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Description</th>
    <th>Joiners</th>
    <th>Action</th>
  </tr>

<?php
  $count = 0;
 foreach ($program_list as $row):
   $countJoiners = joiner()->count("programId=$row->Id");
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$row->title;?></td>
    <td><?=$row->description;?></td>
    <td><?=$countJoiners;?></td>
    <td>
      <div class="action-btn">
        <a href="joiners.php?Id=<?=$row->Id;?>" class="btn btn-info btn-sm">View Joiners</a>
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
