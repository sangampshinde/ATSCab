<?php include_once('./component/header.php');
      include_once('stringdata.php');
      include_once('lib.php');

      $teamMembers = getTeamMembers();


    //   print_r($teamMembers)
 ?>


  <!-- Hero Section -->
  <section class="hero-section--about d-flex">
        <div class="container-fluid mt-auto d-flex flex-column p-0">
            <div class="row no-gutters">
                <div class="col-sm-12">
                    <div class="hero-content--about w-100">
                        <div class="inner-content">
                            <h1 class="mb-0"><?php echo $main ?></h1>
                            <h5 class="karla"><?php echo $discription ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ends Hero Section -->

    <!-- Fleet Introduction -->
    <section class="about-fleet">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">ABOUT US</h2>
                    <p><?php echo $details?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- / Fleet Introduction -->

    <!-- Fleet Features -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6">
                    <img src="assets/frontend/images/fleet-about-city.png" alt="City Fleet" class="d-block ml-5 ml-sm-0 mx-sm-auto">
                </div>
                <div class="col-lg-8 col-md-6 d-flex flex-column justify-content-center pl-5 about-feature">
                    <h3 class="primary karla font-weight-bold mb-0">10+</h3>
                    <p>Different Cities Covered</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 ">
                    <img src="assets/frontend/images/fleet-about-vehicles.png" alt="Fleet of Vehicles" class="d-block ml-auto">
                </div>
                <div class="col-lg-8 col-md-6 d-flex flex-column justify-content-center pl-5 about-feature">
                    <h3 class="primary karla font-weight-bold mb-0">50+</h3>
                    <p>Available Vehicles</p>
                </div>
            </div>
        </div>
    </section>
    <!-- / End Fleet Features -->


<!-- Fleet Team -->
<!-- <section class="my-5 py-5">
    <div class="container">
        <h2 class="mb-0 text-center mb-5 pb-3">Minds Behind Our Company</h2>
        <?php if (!empty($teamMembers)):?>
            <?php foreach ($teamMembers as $key => $teams):?>
                <?php if ($key % 2 == 0): ?>

                    <div class="row fleet-member">
                        <div class="col-lg-3 col-12 col fleet-shape">
                            <div class="fleet-member_image">
                                <?php if ($teams['image'] != null): ?>
                                    <img src="images/<?php echo $teams['image']; ?>" alt="Image">
                                <?php else: ?>
                                    <img src="images/no-user.jpg" alt="Image">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12 flex-col-center col" >
                            <div class="fleet-member_content">
                                <h5 class="mb-0"><?php echo $teams['name']; ?></h5>
                                <span class="primary d-block"><?php echo $teams['designation']; ?></span>
                                <p class="mb-0 mt-2"><?php echo $teams['details']; ?></p>
                            </div>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="row fleet-member--flip">
                        <div class="col-lg-9 col-12 flex-col-center col order-2 order-lg-0">
                            <div class="fleet-member_content">
                                <h5 class="mb-0"><?php echo $teams['name']; ?></h5>
                                <span class="primary d-block"><?php echo $teams['designation']; ?></span>
                                <p class="mb-0 mt-2"><?php echo $teams['details']; ?></p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12 col fleet-shape">
                            <div class="fleet-member_image">
                                <?php if ($teams['image'] != null): ?>
                                    <img src="uploads/<?php echo $teams['image']; ?>" alt="Image">
                                <?php else: ?>
                                    <img src="images/no-user.jpg" alt="Image">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        <?php else: ?>
            <p>No team members available at the moment.</p>
        <?php endif; ?>

    </div>

</section> -->
<!-- /End Fleet team -->

<!-- static frame -->
 <!-- Fleet Team -->
<section class="my-5 py-5">
    <div class="container">
        <h2 class="mb-0 text-center mb-5 pb-3">Minds Behind Our Company</h2>

        <div class="row fleet-member">
            <div class="col-lg-3 col-12 col fleet-shape">
                <div class="fleet-member_image">
                    <img src="images/VINOD V WAGHMARE.jpg" alt="Team Member 1">
                </div>
            </div>
            <div class="col-lg-9 col-12 flex-col-center col">
                <div class="fleet-member_content">
                    <h5 class="mb-0">VINOD V WAGHMARE</h5>
                    <span class="primary d-block">Founder and Owner</span>
                    <p class="mb-0 mt-2">Founder and Owner</p>
                </div>
            </div>
        </div>

        <div class="row fleet-member--flip">
            <div class="col-lg-9 col-12 flex-col-center col order-2 order-lg-0">
                <div class="fleet-member_content">
                    <h5 class="mb-0">VIKAS V WAGHMARE</h5>
                    <span class="primary d-block">CO-FOUNDER</span>
                    <p class="mb-0 mt-2">Co-founder & owner</p>
                </div>
            </div>
            <div class="col-lg-3 col-12 col fleet-shape">
                <div class="fleet-member_image">
                    <img src="images/VIKAS V WAGHMARE.jpg" alt="Team Member 2">
                </div>
            </div>
        </div>

        <div class="row fleet-member">
            <div class="col-lg-3 col-12 col fleet-shape">
                <div class="fleet-member_image">
                    <img src="images/SHIVAJI SHESHRAO BETKAR.jpeg" alt="Team Member 3">
                </div>
            </div>
            <div class="col-lg-9 col-12 flex-col-center col">
                <div class="fleet-member_content">
                    <h5 class="mb-0">SHIVAJI SHESHRAO BETKAR</h5>
                    <span class="primary d-block">CO-FOUNDER & CHIEF HOD</span>
                    <p class="mb-0 mt-2">NANDED HINHOLI PARBHANI LATUR SANGLI & SATARA</p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /End Fleet team -->


<?php include_once('./component/footer.php') ?>