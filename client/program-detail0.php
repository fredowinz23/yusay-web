<?php

include '../templates-client/header.php';

$catId = $_GET["catId"];
$cat = category()->get("Id=$catId");

$program_list = program()->list("categoryId=$catId and status='Approved'");



 ?>

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
       <script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
       <script src="assets/js/Lightbox-Gallery.js"></script>
<body>
    <header class="text-center text-white masthead" style="background: url('assets/img/home_banner.png')no-repeat center center;background-size: cover;">
        <div class="container">
            <p class="mb-5 home-heading"><?=$cat->name?></p>
        </div>
    </header>
    <section class="text-center bg-light features-icons">
        <section style="margin-top:150px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-12 col-xl-10 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div>
                            <h2 class="text-uppercase fw-bold mb-3"><?=$cat->name?></h2>
                            <p class="mb-4" style="font-size: 26px;"><br>
                              <?=$cat->description;?>
                          <br><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container" style="margin-top:150px;">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Our <?=$cat->name?>s</h2>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">

              <?php foreach ($program_list as $row): ?>
                <div class="col">
                    <div>
                      <?php if ($row->image!=""): ?>

                        <img class="rounded img-fluid d-block w-100 fit-cover" style="height:200px;" src="../media/<?=$row->image?>">
                        <?php else: ?>
<!-- default image when image not present -->
                          <img class="rounded img-fluid d-block w-100 fit-cover" style="height:200px;" src="../templates/images/YUSAY LOGO.svg">

                      <?php endif; ?>
                        <div class="py-4">
                            <h4 style="font-size: 27px;"><?=$row->title?></h4>
                            <p style="font-size: 24px;"><?=$row->description;?></p>
                        </div>
                    </div>
                </div>
              <?php endforeach; ?>




            </div>
        </div>

    </section>
    <section class="showcase"></section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="assets/js/Lightbox-Gallery.js"></script>
</body>

</html>


<?php
include '../templates-client/footer.php';
 ?>
