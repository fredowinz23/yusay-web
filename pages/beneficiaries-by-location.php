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
<h2>Beneficiaries by Location</h2>
</center>
<br><br>


<table class="table">
  <tr>
    <th>#</th>
    <th><?=$type?></th>
    <th>Total Beneficiaries</th>
    <th width="400">Action</th>
  </tr>

<?php
  $count = 0;
 foreach ($address_list as $row):
   if ($type=="City") {
     $totalBenificiaries = beneficiary()->count("cityId=$row->Id");
   }
   if ($type=="Barangay") {
     $totalBenificiaries = beneficiary()->count("brgyId=$row->Id");
   }
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$row->name;?></td>
    <td><?=$totalBenificiaries;?></td>
    <td>
      <div class="action-btn">
          <div class="action-btn">
            <a href="beneficiary-list-by-location.php?type=<?=$type?>&refId=<?=$row->Id?>" class="btn btn-info">
              View Beneficiaries
            </a>
            <?php if ($type=="City"): ?>
            <a href="beneficiaries-by-location.php?type=Barangay&refId=<?=$row->Id?>" class="btn btn-info">
              View Barangay
            </a>
          <?php endif; ?>
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
