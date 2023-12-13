<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $Id = $user['Id'];
  $account = account()->get("Id=$Id");
  $load_list = loading()->list("accountId=$Id");
?>

<br>

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Account:</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><?=$account->firstName;?> <?=$account->lastName;?></li>
          </ol>
        </nav>
      </div>
      <div class="col-3">
        <div class="text-center mb-n5">
          <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="widget-content searchable-container list">
  <!-- --------------------- start Contact ---------------- -->
  <div class="card card-body">
    <div class="row">
      <div class="col-md-4 col-xl-3">
        Current e-cash: <?=get_total_load($Id);?>
      </div>
      <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
        
      </div>
    </div>
  </div>
  <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5 class="modal-title">Load</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process.php?action=load-account" id="addContactModalTitle" method="post">
        <div class="modal-body">
          <div class="add-contact-box">
            <div class="add-contact-content">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3 contact-name">
                    <input type="hidden" name="accountId" value="<?=$Id;?>"/>
                    <input type="number" step=".01" name="amount" class="form-control" placeholder="Amount" required/>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3 contact-name">
                    <select class="form-control" name="type" required>
                      <option value="">--Select Payment--</option>
                      <option>Cash</option>
                      <option>G-cash</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button name="form-type" value="add" id="btn-add" class="btn btn-success rounded-pill px-4">Add</button>
          <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal"> Discard </button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="card card-body">
    <div class="table-responsive">
      <table class="table search-table align-middle text-nowrap">
        <thead class="header-item">
          <th>#</th>
          <th>Date</th>
          <th>Amount</th>
          <th>Type</th>
        </thead>
        <tbody>
          <?php
          $count = 0;
          foreach ($load_list as $row):
            $count += 1;
             ?>

          <tr class="search-items">
            <td>
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <div class="user-meta-info">
                    <h6 class="user-name mb-0"
                    data-id="<?=$row->Id;?>"
                    data-dateAdded="<?=$row->dateAdded;?>"
                     data-amount="<?=$row->amount;?>"
                    ><?=$count;?>
                </div>
              </div>
            </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="ms-3">
                    <div class="user-meta-info">
                      <h6 class="mb-0"><?=$row->dateAdded;?></h6>
                    </div>
                  </div>
                </div>
              </td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <div class="user-meta-info">
                        <h6 class="mb-0"><?=$row->amount;?></h6>
                      </div>
                    </div>
                  </div>
                </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="user-meta-info">
                          <h6 class="mb-0"><?=$row->type;?></h6>
                        </div>
                      </div>
                    </div>
                  </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>

<script src="<?=$ROOT_DIR;?>pages/js/loading.js"></script>
