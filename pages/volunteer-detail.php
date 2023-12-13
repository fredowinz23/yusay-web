<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = $_GET["Id"];
$vol = volunteer()->get("Id=$Id");

?>

<div class="container">
  <center>
  <h1>Volunteer Detail</h1>
</center>
  <div class="card">
    <div class="card-body">

      <form action="process.php?action=volunteer-submit" method="post" enctype="multipart/form-data">

        <div class="modal-body">
          <h3>I. Personal Information</h3>
          <div class="row">
            <div class="col-6">
              <b>Last Name:</b>
              <input type="text" value="<?=$vol->lastName;?>" name="lastName" id="c-lastName" class="form-control" disabled>
            </div>
            <div class="col-6">
              <b>First Name:</b>
              <input type="text" value="<?=$vol->firstName;?>" name="firstName" id="c-firstName" class="form-control" disabled>
            </div>
            <div class="col-12">
              <b>Home Address:</b>
              <textarea name="address" class="form-control" disabled><?=$vol->address;?></textarea>
            </div>
            <div class="col-4">
              <b>City:</b>
              <input type="text" name="city" class="form-control" value="<?=$vol->address;?>" disabled>
            </div>

            <div class="col-4">
              <b>Province:</b>
              <input type="text" name="province" class="form-control" value="<?=$vol->province;?>" disabled>
            </div>
            <div class="col-4">
              <b>Postal Code:</b>
              <input type="number" name="postalCode" value="<?=$vol->postalCode;?>" class="form-control" disabled>
            </div>

            <div class="col-6">
              <b>Mobile Number:</b>
              <input type="text" name="mobileNumber" value="<?=$vol->mobileNumber;?>" class="form-control" disabled>
            </div>
            <div class="col-6">
              <b>Email:</b>
              <input type="email" name="email" value="<?=$vol->email;?>" class="form-control" disabled>
            </div>

            </div>

<br><br>
        <h3>II. Emergency Contact</h3>
        <div class="row">
          <div class="col-6">
            <b>Name:</b>
            <input type="text" name="ecName" value="<?=$vol->ecName;?>" class="form-control" disabled>
          </div>
          <div class="col-6">
            <b>Relationship:</b>
            <input type="text" name="ecRelationship" value="<?=$vol->ecRelationship;?>" class="form-control" disabled>
          </div>
          <div class="col-6">
            <b>Contact Number:</b>
            <input type="text" name="ecContactNumber" value="<?=$vol->ecContactNumber;?>" class="form-control" disabled>
          </div>

        </div>

        <br><br>
      <h3>III. Educational Background</h3>

      <div class="row">
        <div class="col-8">
            <b>Elementary:</b>
            <input type="text" name="elementary" value="<?=$vol->elementary;?>" class="form-control" disabled>
        </div>
        <div class="col-4">
            <b>Year Graduated:</b>
            <input type="text" name="elementaryYear" value="<?=$vol->elementaryYear;?>" class="form-control" disabled>
        </div>

          <div class="col-8">
              <b>High School:</b>
              <input type="text" name="highschool"  value="<?=$vol->highschool;?>" class="form-control" disabled>
          </div>
          <div class="col-4">
              <b>Year Graduated:</b>
              <input type="text" name="highschoolYear" value="<?=$vol->highschoolYear;?>" class="form-control" disabled>
          </div>

          <div class="col-8">
              <b>College:</b>
              <input type="text" name="college" value="<?=$vol->college;?>" class="form-control" disabled>
          </div>
          <div class="col-4">
              <b>Year Graduated:</b>
              <input type="text" name="collegeYear" value="<?=$vol->collegeYear;?>" class="form-control" disabled>
          </div>

      </div>

        <br><br>
        <h3>IV. Employment Record</h3>

        <div class="row">
          <div class="col-12">
            <b>Company Name:</b>
            <input type="text" name="company" value="<?=$vol->company;?>" class="form-control" disabled>
          </div>
          <div class="col-6">
            <b>Position:</b>
            <input type="text" name="position" value="<?=$vol->position;?>" class="form-control" disabled>
          </div>
          <div class="col-3">
            <b>From:</b>
            <input type="text" name="workFrom" value="<?=$vol->workFrom;?>" class="form-control" disabled>
          </div>
          <div class="col-3">
            <b>To:</b>
            <input type="text" name="workTo" value="<?=$vol->workTo;?>" class="form-control" disabled>
          </div>

        </div>

        <br><br>
        <h3>V. Reason for volunteering (Please Select all that apply)</h3>

        <div class="row">
          <div class="col-12">
            <?php if ($vol->reason1): ?>
            * for academic credit <br>
            <?php endif; ?>

            <?php if ($vol->reason2): ?>
            * to learn new skills <br>
            <?php endif; ?>

            <?php if ($vol->reason3): ?>
            * to gain employment skills <br>
            <?php endif; ?>

            <?php if ($vol->reason4): ?>
            * to share my skills <br>
            <?php endif; ?>

            <?php if ($vol->reason5): ?>
            * to support the cause <br>
            <?php endif; ?>

            <?php if ($vol->reason6): ?>
            * for social interaction <br>
            <?php endif; ?>
          </div>
          <div class="col-6">
            <b>Others:</b>
            <input type="text" name="others" class="form-control" disabled>
          </div>

        </div>


        <div class="modal-footer">
          <?php if ($role=="Admin"): ?>
            <a href="process.php?action=change-volunteer-status&status=Approved&Id=<?=$vol->Id?>" class="btn btn-success btn-sm">Approve</a>
            <a href="process.php?action=change-volunteer-status&status=Denied&Id=<?=$vol->Id?>" class="btn btn-danger btn-sm">Deny</a>
          <?php endif; ?>
        </div>
      </form>
    </div>

  </div>

</div>
