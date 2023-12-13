
<?php
include "../templates-client/header.php";

$program_list = program()->list("status='Approved' limit 9");

function total_spent_per_category($categoryId){
  $program_list = program()->list("categoryId=$categoryId");
  $totalCashSpent = 0;
  foreach ($program_list as $row) {
    $totalCashSpent += $row->amountSpent;
  }
  return $totalCashSpent;
}

 ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">FELIX G. YUSAY FOUNDATION</h2>
          <p data-aos="fade-up" data-aos-delay="100">The Felix G. Yusay Foundation Inc. is a non-stock, non-profit, and non-government organization in Bacolod City that aims to serve and enhance the quality of life of the poor and the needy through its various programs and projects.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table">Read more about us</a>
            <a href="https://www.youtube.com/watch?v=pfq_YzlmgNA" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="<?=$ROOT_DIR;?>templates-client/images/homepage.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="height:600px">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <p>Our <span>Mission</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-12 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                To serve and enhance the quality of life of the poor and the needy through giving them access to education, medical assistance, financial support, and sport engagement that enables them to achieve their full potential, at the same time to promote environmental protection and preservation and livelihood for self-sufficiency in Negros Occidental.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg" style="height:600px">
      <div class="container" data-aos="fade-up">


        <div class="section-header">
          <p>Our <span>Vision</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-12 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Better quality of life the of the poorest of the poor in Negros Occidental.
                  </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">


                <div class="section-header" style="color:white">
                  <p>Program Breakdown</p>
                </div>


        <div class="row gy-4">

          <?php foreach ($category_list as $row): ?>

            <div class="col-lg-3 col-md-6">
              <div class="stats-item text-center w-100 h-100">
                <span style="color:white!important"><?=format_money(total_spent_per_category($row->Id));?></span>
                <p><?=$row->name;?></p>
              </div>
            </div><!-- End Stats Item -->

          <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <p>Our Programs</p>
            <h2>The Felix G. Yusay Foundation has certain program in which we believe we have the initiative to change people's lives.</h2>
        </div>


        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="row gy-5">

              <?php foreach ($program_list as $row): ?>

                <div class="col-lg-4 menu-item text-center">
                  <a href="<?=$ROOT_DIR;?>media/<?=$row->image;?>" class="glightbox"><img src="<?=$ROOT_DIR;?>media/<?=$row->image;?>" class="menu-img img-fluid" alt=""></a>
                  <h4><?=$row->title?></h4>
                  <p class="ingredients">
                    <?=$row->description?>
                  </p>
                </div><!-- Menu Item -->


              <?php endforeach; ?>


            </div>
          </div><!-- End Dinner Menu Content -->

        </div>

      </div>
    </section><!-- End Menu Section -->

  </main><!-- End #main -->


  <?php
  include "../templates-client/footer.php";
   ?>
