<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $donation_list = donation()->list();
  $totalCashRecieved = 0;
  foreach ($donation_list as $row) {
    $totalCashRecieved += $row->amount;
  }

  $program_list = program()->list();
  $totalCashSpent = 0;
  foreach ($program_list as $row) {
    $totalCashSpent += $row->amountSpent;
  }

  $pendingVolunteer = volunteer()->count("status='Pending'");
  $approvedVolunteer = volunteer()->count("status='Approved'");
  $deniedVolunteer = volunteer()->count("status='Denied'");


  $pendingB = beneficiary()->count("status='Pending'");
  $approvedB = beneficiary()->count("status='Approved'");
  $deniedB = beneficiary()->count("status='Denied'");

  $totalCashBalance = $totalCashRecieved-$totalCashSpent;

  $category_list = category()->list();

  function total_spent_per_category($categoryId){
    $program_list = program()->list("categoryId=$categoryId");
    $totalCashSpent = 0;
    foreach ($program_list as $row) {
      $totalCashSpent += $row->amountSpent;
    }
    return $totalCashSpent;
  }

?>

<style media="screen">
  .positive-number{
    color: #1d9948;
  }
  .negative-number{
    color: red;
  }
</style>

<br>

<center>
<h2>Yusay Hub Dashboard</h2>
</center>



<div class="row mt-3">
  <div class="col-6 mb-3">
    <div class="card">
      <div class="card-header">
        Total Cash Received (Donation)
      </div>
      <div class="card-body text-center">
        <h1 class="positive-number">Php <?=format_money($totalCashRecieved);?></h1>
      </div>
    </div>
  </div>


    <div class="col-6 mb-3">
      <div class="card">
        <div class="card-header">
          Total Cash Spent (All Programs)
        </div>
        <div class="card-body text-center">
          <h1 class="negative-number">Php <?=format_money($totalCashSpent);?></h1>
        </div>
      </div>
    </div>


    <div class="col-12 mb-3">
      <div class="card">
        <div class="card-header">
          Total Cash Balance
        </div>
        <div class="card-body text-center">
          <?php if ($totalCashBalance>0): ?>
            <h1 class="positive-number">Php <?=format_money($totalCashBalance);?></h1>
            <?php else: ?>
            <h1 class="negative-number">Php <?=format_money($totalCashBalance);?></h1>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>


  <hr>
  <h4>Program Category Breakdown:</h4>

  <div class="row">

  <?php foreach ($category_list as $row): ?>
      <div class="col-6 mb-3">
        <div class="card">
          <div class="card-header">
            <?=$row->name;?>
          </div>
          <div class="card-body text-center">
            <h1>Php <?=format_money(total_spent_per_category($row->Id));?></h1>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
</div>

  <hr>
  <h4>Program Breakdown:</h4>

  <div class="row">

  <?php foreach ($program_list as $row): ?>
      <div class="col-4 mb-3">
        <div class="card">
          <div class="card-header">
            <?=$row->title;?> (Program)
          </div>
          <div class="card-body text-center">
            <h1>Php <?=format_money($row->amountSpent);?></h1>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
</div>


<hr>

<div class="row">
  <div class="col-6">
    <ul class="list-group">
      <li class="list-group-item" style="background:#68cc83;color:white;"> <b>Volunteers</b> </li>
      <li class="list-group-item"> Pending: <?=$pendingVolunteer?> </li>
      <li class="list-group-item"> Approved: <?=$approvedVolunteer?> </li>
      <li class="list-group-item"> Denied: <?=$deniedVolunteer?> </li>
    </ul>
  </div>

    <div class="col-6">
      <ul class="list-group">
        <li class="list-group-item" style="background:#ff7aaf;color:white;"> <b>Beneficiaries</b> </li>
        <li class="list-group-item"> Pending: <?=$pendingB?> </li>
        <li class="list-group-item"> Approved: <?=$approvedB?> </li>
        <li class="list-group-item"> Denied: <?=$deniedB?> </li>
      </ul>
    </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>
