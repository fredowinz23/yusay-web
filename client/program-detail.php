<?php

include '../templates-client/header.php';

$catId = $_GET["catId"];
$cat = category()->get("Id=$catId");

$program_list = program()->list("categoryId=$catId and status='Approved'");



 ?>


     <!-- ======= Menu Section ======= -->
     <section id="menu" class="menu" style="min-height:500px">
       <div class="container" data-aos="fade-up">

         <div class="section-header">
           <p><?=$cat->name?></p>
             <h2><?=nl2br($cat->description);?></h2>
         </div>


         <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

           <div class="tab-pane fade active show" id="menu-starters">

             <div class="row gy-5">

               <?php foreach ($program_list as $row): ?>

                 <div class="col-lg-4 menu-item">
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

<?php
include '../templates-client/footer.php';
 ?>
