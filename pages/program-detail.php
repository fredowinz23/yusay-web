<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = $_GET["Id"];
$prog = program()->get("Id=$Id");

?>

<div class="container">
  <center>
  <h1>Program Detail</h1>
</center>
  <div class="card">
    <div class="card-body">

        <div class="modal-body">
          <img src="../media/<?=$prog->image?>" style="width:200px">
          <div class="row">
            <div class="col-12">
              <b>Title:</b>
              <input type="text" name="title" id="c-title" class="form-control" value="<?=$prog->title;?>" disabled>
            </div>
            <div class="col-12">
              <b>Description:</b>
              <textarea name="description" id="c-description" class="form-control" disabled><?=$prog->description;?></textarea>
            </div>
            <div class="col-6">
              <b>Date:</b>
              <input type="date" value="<?=$prog->date;?>" name="date" id="c-date" class="form-control" disabled>
            </div>
            <div class="col-6">
              <b>Time:</b>
              <input type="time" value="<?=$prog->time;?>" name="time" id="c-time" class="form-control" disabled>
            </div>

            <div class="col-12">
              <b>Address:</b>
              <textarea name="address" id="c-address" class="form-control" disabled><?=$prog->address;?></textarea>
            </div>

            <div class="col-12">
              <b>Notes:</b>
              <textarea name="notes" id="c-notes" class="form-control" disabled><?=$prog->notes;?></textarea>
            </div>


            <div class="col-6">
              <b>Max Volunteer:</b>
              <input type="number" name="maxVolunteer" value="<?=$prog->maxVolunteer;?>" id="c-maxVolunteer" class="form-control" disabled>
            </div>


            <div class="col-6">
              <b>Amount Spent:</b>
              <input type="number" step=".01" name="amountSpent" value="<?=$prog->amountSpent;?>" id="c-amountSpent" class="form-control" disabled>
            </div>



                    </div>
        </div>
        <div class="modal-footer">
          <?php if ($role=="Admin"): ?>
            <a href="program-modify.php?Id=<?=$prog->Id?>" class="btn btn-success btn-sm">Modify Program</a>
            <?php if ($prog->status=="Pending"): ?>
              <a href="process.php?action=change-program-status&status=Approved&Id=<?=$prog->Id?>" class="btn btn-info btn-sm">Approve</a>
              <a href="process.php?action=change-program-status&status=Denied&Id=<?=$prog->Id?>" class="btn btn-danger btn-sm">Deny</a>
            <?php endif; ?>
            <?php if ($prog->status=="Approved"): ?>
              <a href="process.php?action=change-program-status&status=Closed&Id=<?=$prog->Id?>" class="btn btn-info btn-sm">Close Program</a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </form>
    </div>

  </div>

</div>


      <?php include $ROOT_DIR . "templates/footer.php"; ?>
