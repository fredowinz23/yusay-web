<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = $_GET["Id"];
$prog = program()->get("Id=$Id");

?>

<div class="container">
  <center>
  <h1>Program Form</h1>
</center>
  <div class="card">

    <form action="process.php?action=program-save" method="post" enctype="multipart/form-data">
      <input type="hidden" name="categoryId" value="<?=$prog->categoryId;?>">
      <input type="hidden" name="Id" value="<?=$prog->Id;?>">
    <div class="card-body">

        <div class="modal-body">
          <div class="row">
            <div class="col-4">
              <b>Upload Image:</b>
              <input type="file" name="image" class="form-control">
            </div>
              <div class="col-12">
                <b>Title:</b>
                <input type="text" name="title" id="c-title" class="form-control" value="<?=$prog->title;?>" required>
              </div>
            <div class="col-12">
              <b>Description:</b>
              <textarea name="description" id="c-description" class="form-control" required><?=$prog->description;?></textarea>
            </div>
            <div class="col-6">
              <b>Date:</b>
              <input type="date" value="<?=$prog->date;?>" name="date" id="c-date" class="form-control" required>
            </div>
            <div class="col-6">
              <b>Time:</b>
              <input type="time" value="<?=$prog->time;?>" name="time" id="c-time" class="form-control" required>
            </div>

            <div class="col-12">
              <b>Address:</b>
              <textarea name="address" id="c-address" class="form-control" required><?=$prog->address;?></textarea>
            </div>

            <div class="col-12">
              <b>Notes:</b>
              <textarea name="notes" id="c-notes" class="form-control" required><?=$prog->notes;?></textarea>
            </div>


            <div class="col-6">
              <b>Max Volunteer:</b>
              <input type="number" name="maxVolunteer" value="<?=$prog->maxVolunteer;?>" id="c-maxVolunteer" class="form-control" required>
            </div>


            <div class="col-6">
              <b>Amount Spent:</b>
              <input type="number" step=".01" name="amountSpent" value="<?=$prog->amountSpent;?>" id="c-amountSpent" class="form-control" required>
            </div>



                    </div>
        </div>
        <div class="modal-footer">
          <button name="form-type" value="edit" class="btn btn-primary">Save</button>
          <button onclick="history.back()" name="form-type" class="btn btn-danger text-white">Cancel</button>
        </div>
      </form>
    </div>

  </div>

</div>


      <?php include $ROOT_DIR . "templates/footer.php"; ?>
