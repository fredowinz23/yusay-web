<?php

include_once("../config/database.php");
include_once("../config/Models.php");

$category_list = category()->list();

?>

<style media="screen">
  .btn{
    background: green !important;
  }
</style>
 <html data-bs-theme="light" lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Home - Brand</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/Cookie.css">
     <link rel="stylesheet" href="assets/css/Lato.css">
     <link rel="stylesheet" href="assets/css/bs-theme-overrides.css">
     <link rel="stylesheet" href="assets/css/grid.css">
     <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/css/Timeline.css">
     <link rel="stylesheet" href="assets/css/Zig-Zag-Timeline-v3-zigzag-timeline-v2-1.css">
     <link rel="stylesheet" href="assets/css/Zig-Zag-Timeline-v3-zigzag-timeline-v2.css">
 </head>

   <body>
       <nav class="navbar navbar-expand-lg bg-body py-3">
           <div class="container">
             <a href="index.php">
            <img src="../templates/images/logo.jpg" alt="" width="30px">
            </a>


             <!-- Start: Hamburger Menu --><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><!-- End: Hamburger Menu -->
               <div class="collapse navbar-collapse" id="navcol-1">
                   <div class="mx-auto" style="width: 100%;">
                       <ul class="navbar-nav navbar-to-center" id="navbar-style">
                           <!-- <li class="nav-item dropdown navbar-to-center"><a class="nav-link dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="">Who are We</a>
                               <div class="dropdown-menu"><a class="dropdown-item" href="#">Our History</a><a class="dropdown-item" href="#">Meet the Team</a><a class="dropdown-item" href="#">Achievements</a><a class="dropdown-item" href="#">Our Partners</a></div>
                           </li> -->
                           <li class="nav-item dropdown navbar-to-center"><a class="nav-link dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#">Our Programs</a>
                               <div class="dropdown-menu">
                                 <?php foreach ($category_list as $row): ?>
                                     <a class="dropdown-item" href="program-detail.php?catId=<?=$row->Id?>"><?=$row->name?></a>
                                 <?php endforeach; ?>
                               </div>
                           </li>
                           <li class="nav-item navbar-to-center"><a class="nav-link" href="../client/become-a-volunteer.php">Become a Volunteer</a></li>
                           <li class="nav-item navbar-to-center"><a class="nav-link" href="../client/become-a-beneficiary.php">Become a Beneficiary</a></li>
                           <li class="nav-item navbar-to-center"><a class="nav-link" href="#footer">Contact Us</a></li>
                           <li class="nav-item navbar-to-center"><a class="nav-link" href="../auth/login.php">Log In</a></li>
                       </ul>
                   </div><a class="btn" role="button" href="../client/donation-form.php" style="margin-left:0px;">Donate</a>
               </div>
           </div>
       </nav>
