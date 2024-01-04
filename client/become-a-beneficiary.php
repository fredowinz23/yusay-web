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
        <h1>Beneficiary Request Form</h1>
      </center>

<div style="margin:30px">

<p>
      As a non-profit organization driven by our mission to serve vulnerable communities, the beneficiaries of our programs are one of our most valued stakeholders. The Felix G. Yusay Foundation has a thorough process to select beneficiaries who are most in need of aid and aligned with our focus areas.
</p><p>
While we aim to assist as many deserving individuals as our resources allow, those experiencing significant hardship are prioritized in our selection process. The criteria we use to determine beneficiaries include:
</p><p>
- Income level below the poverty threshold with priority given to households facing extreme economic disadvantages
</p><p>
- Employment status, with those who are unemployed, underemployed or unable to work due to disability or circumstances given precedence
</p><p>
- Health and disability factors that critically limit one's ability to secure income and basic necessities
</p><p>
- Family size and number of dependents relying on the potential beneficiary
</p><p>
- Lack of access to other assets or resources
</p><p>
- Age factors, such as very young children or elderly applicants facing gaps in care
</p><p>
- Geographic region with priority given to underserved rural communities when possible
</p><p>
- Alignment with our foundation's central focus areas and mission
</p><p>
- Recommendations from community leaders and partners attesting to need
</p><p>
We thoughtfully weigh all aspects of an applicant's situation to select beneficiaries who will gain substantial benefit from our aid programs. Our commitment is to serve those most in crisis, while making the best use of resources entrusted to our foundation.
</p><p>





How to Apply for Aid as a Beneficiary:
</p><p>
1. Fill out the beneficiary application form completely and accurately. Double check that all information submitted is correct.
</p><p>
2. Prepare supporting documentation. This includes a certificate of indigency from your barangay or a letter of request from the barangay captain.
</p><p>
3. Submit your application and wait 3-7 business days for a response. The foundation will contact you via phone or email to let you know if your application has been approved or declined.
</p><p>
4. If approved, you may be asked to provide additional documentation or clarification. Make sure to respond promptly to any requests from the foundation.
</p><p>
5. Once fully approved, you will be informed of the aid you qualify for and next steps for receiving assistance. This could include enrollment in a program, receiving funds, or being connected to other resources.
</p><p>
6. As a beneficiary, you must continue to meet eligibility criteria and follow all requirements set by the Felix G. Yusay Foundation to remain qualified for aid. Report any changes in your circumstances to the foundation immediately.
</p>

</div>



      <form action="process.php?action=beneficiary-submit" method="post" enctype="multipart/form-data">

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
              <input type="text" name="email" id="c-email" class="form-control" required>
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
                <b>Tell us about your situation:</b>
                <textarea name="content" id="c-content" class="form-control"></textarea>
              </div>
              <div class="col-12">
                <b>Proof:</b>
                <input type="file" name="image" class="form-control" required>
              </div>
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
