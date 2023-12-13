<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $donation_list = donation()->list("status='Approved'");
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


<div class="row">
  <div class="col-4">
    <div>
      <canvas id="myChart"></canvas>
    </div>
  </div>

    <div class="col">
      <div>
        <canvas id="myChart2"></canvas>
      </div>
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [
        'Cash Balance',
        'Cash Spent',
      ],
      datasets: [{
        label: 'Budget',
        data: [
          <?=$totalCashBalance?> , <?=$totalCashSpent?>
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });



    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: [
          <?php foreach ($category_list as $row): ?>
              '<?=$row->name;?>',
          <?php endforeach; ?>
        ],
        datasets: [{
          label: 'Program List',
          data: [
            <?php foreach ($category_list as $row): ?>
                <?=total_spent_per_category($row->Id);?>,
            <?php endforeach; ?>
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>



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
