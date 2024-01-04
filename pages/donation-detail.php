<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = $_GET["Id"];
$benef = donation()->get("Id=$Id");
$city = address()->get("Id=$benef->cityId and type='City'");
$brgy = address()->get("Id=$benef->brgyId and type='Barangay'");


?>

<br><br><br><br>

<div class="container">
  <center>
  <h1>Donation Form</h1>
</center>
  <div class="card">
    <div class="card-body">

        <div class="modal-body">
          <h2>Personal Information</h2>
          <div class="row">
            <div class="col-6">
              <b>First Name:</b>
              <input type="text" value="<?=$benef->firstName;?>" class="form-control" disabled>
            </div>
            <div class="col-6">
              <b>Last Name:</b>
              <input type="text" value="<?=$benef->lastName;?>" class="form-control" disabled>
            </div>
            <div class="col-4">
              <b>Email:</b>
              <input type="text"  value="<?=$benef->email;?>" class="form-control" disabled>
            </div>
            <div class="col-2">
              <b>Age:</b>
              <input type="text"  value="<?=$benef->age;?>" class="form-control" disabled>
            </div>
            <div class="col-2">
              <b>Gender:</b>

              <input type="text"  value="<?=$benef->gender;?>" class="form-control" disabled>
            </div>
            <div class="col-6">
              <b>Prefer to be anonymous:</b>

              <input type="text"  value="<?=$benef->isAnonymous;?>" class="form-control" disabled>
            </div>
            <div class="col-6">
              <b>Donation amount:</b>

              <input type="double" step=".01"  value="<?=$benef->amount;?>" class="form-control" disabled>
            </div>
            <div class="col-4">
              <b>Contact #:</b>
              <input type="text"  value="<?=$benef->contactNumber;?>" class="form-control" disabled>
            </div>

          </div>
            <h2>Location</h2>
            <div class="row">
              <div class="col-12">
                <b>Address:</b>
                <input type="text"  value="<?=$benef->address;?>" class="form-control" disabled>
              </div>
              <div class="col-4">
              <b>City:</b>
              <input type="text" name="city" class="form-control" value="<?=$city->name;?>" disabled>
              </div>
              <div class="col-4">
              <b>Barangay:</b>
              <input type="text" name="barangay" class="form-control" value="<?=$brgy->name;?>" disabled>
              </div>
              <div class="col-12">
                <b>Tell us about your situation:</b>
                <textarea name="content" id="c-content" class="form-control" disabled><?=$benef->content;?></textarea>
              </div>
              <div class="col-12">
                <b>Proof:</b> <br>
                <a href="../media/<?=$benef->proof?>" target="_blank">Click to view proof</a>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <a href="donations.php" class="btn btn-info btn-sm">Back</a>
          <?php if ($role=="Admin"): ?>
            <?php if ($benef->status=="Pending"): ?>
                <a href="process.php?action=change-donation-status&status=Approved&Id=<?=$benef->Id?>" class="btn btn-primary btn-sm">Approve</a>
                <a href="process.php?action=change-donation-status&status=Denied&Id=<?=$benef->Id?>" class="btn btn-danger btn-sm">Deny</a>
            <?php else: ?>
              <a href="process.php?action=change-donation-status&status=Pending&Id=<?=$benef->Id?>" class="btn btn-warning btn-sm">Change</a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </form>
    </div>

  </div>

</div>
