<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header-blank.php";

$address_list = address()->list("type='City'");
?>

<br><br><br><br>

<div class="container">
  <center>
  <h1>Donation Form</h1>
</center>
  <div class="card">
    <div class="card-body">

      <form action="process.php?action=donation-submit" method="post" enctype="multipart/form-data">

        <div class="modal-body">
          <h2>Personal Information</h2>
          <div class="row">
            <div class="col-6">
              <b>First Name:</b>
              <input type="text" name="firstName" id="c-firstName" class="form-control" required>
            </div>
            <div class="col-6">
              <b>Last Name:</b>
              <input type="text" name="lastName" id="c-lastName" class="form-control" required>
            </div>
            <div class="col-4">
              <b>Email:</b>
              <input type="email" name="email" id="c-email" class="form-control" required>
            </div>
            <div class="col-2">
              <b>Age:</b>
              <input type="text" name="age" id="c-age" class="form-control" required>
            </div>
            <div class="col-2">
              <b>Gender:</b>
              <select name="gender" id="c-gender" class="form-control" required>
                <option value="">--Select--</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="col-4">
              <b>Contact #:</b>
              <input type="text" placeholder="09 XXX XXXXX" id="phone_number" name="contactNumber" id="c-phone" class="form-control" required>
            </div>

            <div class="col-4">
              <b>Prefer to be anonymous?:</b>
              <select name="isAnonymous"  class="form-control" required>
                <option value="">--Select--</option>
                <option>Yes</option>
                <option>No</option>
              </select>
            </div>


            <div class="col-6">
              <b>Donation amount:</b>

              <input type="double" step=".01" class="form-control" name="amount" required>
            </div>

          </div>
            <h2>Location</h2>
            <div class="row">
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
              <div class="col-12">
                <b>Personal Kind note to us:</b>
                <textarea name="content" id="c-content" class="form-control"></textarea>
              </div>
              <div class="col-12">
                <b>Proof of donation:</b>
                <input type="file" name="image" class="form-control" required>
              </div>
              <div class="col-4">
                <b>Reference Number:</b>
                <input type="number" name="referenceNumber" class="form-control" required>
              </div>
            </div>
        </div>
        <div class="modal-footer mt-4">
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
