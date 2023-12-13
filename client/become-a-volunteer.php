<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header-blank.php";

$address_list = address()->list("type='City'");

?>

<br><br><br><br>

<div class="container">
  <div class="card">
    <div class="card-body">

        <center>
        <h1>Volunteer Form</h1>
      </center>

      <form action="process.php?action=volunteer-submit" method="post" enctype="multipart/form-data">

        <div class="modal-body">
          <h3>I. Personal Information</h3>
          <div class="row">
            <div class="col-6">
              <b>Last Name:</b>
              <input type="text" name="lastName" id="c-lastName" class="form-control" required>
            </div>
            <div class="col-6">
              <b>First Name:</b>
              <input type="text" name="firstName" id="c-firstName" class="form-control" required>
            </div>
            <div class="col-6">
              <b>Home Address:</b>
              <input type="text" name="address" class="form-control" required>
            </div>
            <div class="col-3">
              <b>City:</b>
              <select class="form-control"  name="cityId" id="city-form"  onchange="check_baranggay()" required>
                <option value="">--Select City--</option>
                <?php foreach ($address_list as $row): ?>
                  <option value="<?=$row->Id?>"><?=$row->name?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-3">
              <b>Barangay:</b>
              <select class="form-control"  id="barangay-select" name="brgyId" required>
                <option value="">--Please Select City first--</option>
              </select>
            </div>
            <div class="col-3">
              <b>Postal Code:</b>
              <input type="number" id="postalCode" name="postalCode" class="form-control" required>
            </div>

            <div class="col-3">
              <b>Mobile Number:</b>
              <input type="text" placeholder="09 XXX XXXXX" id="phone_number" name="mobileNumber" class="form-control" required>
            </div>
            <div class="col-3">
              <b>Email:</b>
              <input type="email" name="email" class="form-control" required>
            </div>

            </div>

<br><br>
        <h3>II. Emergency Contact</h3>
        <div class="row">
          <div class="col-6">
            <b>Name:</b>
            <input type="text" name="ecName" class="form-control" required>
          </div>
          <div class="col-6">
            <b>Relationship:</b>
            <input type="text" name="ecRelationship" class="form-control" required>
          </div>
          <div class="col-6">
            <b>Contact Number:</b>
            <input type="text" name="ecContactNumber" class="form-control" required>
          </div>

        </div>

        <br><br>
      <h3>III. Educational Background</h3>

      <div class="row">
        <div class="col-8">
            <b>Elementary:</b>
            <input type="text" name="elementary" class="form-control" required>
        </div>
        <div class="col-4">
            <b>Year Graduated:</b>
            <input type="text" name="elementaryYear" class="form-control" required>
        </div>

          <div class="col-8">
              <b>High School:</b>
              <input type="text" name="highschool" class="form-control" required>
          </div>
          <div class="col-4">
              <b>Year Graduated:</b>
              <input type="text" name="highschoolYear" class="form-control" required>
          </div>

          <div class="col-8">
              <b>College:</b>
              <input type="text" name="college" class="form-control" required>
          </div>
          <div class="col-4">
              <b>Year Graduated:</b>
              <input type="text" name="collegeYear" class="form-control" required>
          </div>

      </div>

        <br><br>
        <h3>IV. Current Employment Record</h3>

        <div class="row">
          <div class="col-12">
            <b>Company Name:</b>
            <input type="text" name="company" class="form-control" required>
          </div>
          <div class="col-6">
            <b>Position:</b>
            <input type="text" name="position" class="form-control" required>
          </div>
          <div class="col-3">
            <b>From:</b>
            <input type="text" name="workFrom" class="form-control" required>
          </div>
          <div class="col-3">
            <b>To:</b>
            <input type="text" name="workTo" class="form-control" required>
          </div>

        </div>

        <br><br>
        <h3>V. Reason for volunteering (Please Select all that apply)</h3>

        <div class="row">
          <div class="col-6">
            <input type="checkbox" name="reason1"> for academic credit
          </div>
          <div class="col-6">
            <input type="checkbox" name="reason2"> to learn new skills
          </div>
          <div class="col-6">
            <input type="checkbox" name="reason3"> to gain employment skills
          </div>
          <div class="col-6">
            <input type="checkbox" name="reason4"> to share my skills
          </div>
          <div class="col-6">
            <input type="checkbox" name="reason5"> to support the cause
          </div>
          <div class="col-6">
            <input type="checkbox" name="reason6"> for social interaction
          </div>
          <div class="col-6">
            <b>Others:</b>
            <input type="text" name="others" class="form-control">
          </div>

        </div>


        <div class="modal-footer">
          <a  href="index.php" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-warning">Submit</button>
        </div>
      </form>
    </div>

  </div>

</div>

<script type="text/javascript">
  var phone = document.getElementById("phone_number");
  var re = /^(09|\+639)\d{9}$/;

  function validatePhone(){
    if(!re.test(phone.value)) {
      phone.setCustomValidity("Invalid Phone Number Format");
    } else {
      phone.setCustomValidity('');
    }
  }

  phone.onchange = validatePhone;

  function check_baranggay(){
  var brgySelect = document.getElementById("barangay-select");
  var cityForm = document.getElementById("city-form");
  var postalCode = document.getElementById("postalCode");
  $.ajax({
      type: "GET",
      url: "api-barangay-by-city.php?cityId=" + cityForm.value,
      success: function(data){
        const obj = JSON.parse(data);
        var txt = "<option value=''>-- Select --</option>";
        for (x in obj.brgy_list) {
          txt += "<option value='"+ obj.brgy_list[x].id +"'>" + obj.brgy_list[x].name + "</option>";
        }
        $('#barangay-select').html(txt);
        postalCode.value = obj.postalCode;
      }
    });
  }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
