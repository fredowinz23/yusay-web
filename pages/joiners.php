<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = get_query_string("Id", 0);
$program = program()->get("Id=$Id");

$joiner_list = joiner()->list("programId=$Id");

?>
<center>
<h2>Joiners</h2>
</center>
<b>Program:</b> <?=$program->title?> <br>

<b>Address:</b> <?=$program->address?> <br>

<b>Date/Time:</b> <?=$program->date?> / <?=$program->time?>
<br>
<br>
<br>

<table class="table">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Email</th>
  </tr>

<?php
  $count = 0;
 foreach ($joiner_list as $row):
   $user = account()->get("Id=$row->userId");
   $vol = volunteer()->get("Id=$user->volunteerId");
   $countJoiners = joiner()->count("programId=$row->Id");
   $count +=1;
    ?>
  <tr class="item-items">
    <td class="item-data"
    ><?=$count;?></td>
    <td><?=$vol->firstName;?> <?=$vol->lastName;?></td>
    <td><?=$vol->address;?>, <?=$vol->city;?>, <?=$vol->province;?>, <?=$vol->postalCode;?></td>
    <td><?=$vol->mobileNumber;?></td>
    <td><?=$vol->email;?></td>
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
