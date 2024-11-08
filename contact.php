<?php include_once('./component/header.php');
include_once('lib.php');
include_once('stringdata.php');

$frontendData = getFrontendData();
?>

<section class="hero-section--contact d-flex">
    <div class="container-fluid mt-auto d-flex flex-column p-0">
        <div class="row no-gutters">
            <div class="col-sm-12">
                <div class="hero-content--contact w-100">
                    <div class="inner-content">
                        <h1 class="mb-0">Contact Us</h1>
                        <h5 class="karla">Tell us how we can help you</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ends hero section -->

<!-- Contact tiles -->
<section>
    <div class="container my-5 pt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-tile">
                    <div class="contact-tile-image">
                        <img src="assets/frontend/icons/fleet-support.png" alt="Customer Care">
                    </div>
                    <div class="contact-tile-details">
                        <h5>Customer Care</h5>
                        <p>Contact us at <strong class="primary"><?php echo $frontendData['contact_phone'] ?></strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-tile">
                    <div class="contact-tile-image">
                        <img src="assets/frontend/icons/fleet-query.png" alt="Any Query">
                    </div>
                    <div class="contact-tile-details">
                        <h5>Any Query</h5>
                        <p>Contact us at <strong class="primary"><?php echo $frontendData['contact_phone'] ?></strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="contact-tile">
                    <div class="contact-tile-image">
                        <img src="assets/frontend/icons/fleet-email.png" alt="Email Us">
                    </div>
                    <div class="contact-tile-details">
                        <h5>Contact Us via Email</h5>
                        <p>Send your email to <strong class="primary"><?php echo $frontendData['contact_email'] ?></strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-tile">
                    <div class="contact-tile-image">
                        <img src="assets/frontend/icons/fleet-drive.png" alt="Join Us">
                    </div>
                    <div class="contact-tile-details">
                        <h5>Drive with Us</h5>
                        <p>Join us <strong class="primary"><a href="#">Click Here</a></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End contact tiles -->

<!-- Contact map -->
<section class="contact-map-section mb-5">
    <div class="map w-100 h-100">
        <!-- Google map placeholder -->
         
        <div id="map" class="w-100 h-100" style="background-color: #ccc;">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.3861207487973!2d144.9632793153208!3d-37.81421777975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577c7eec10a5c41!2sFederation%20Square!5e0!3m2!1sen!2sus!4v1619734326179!5m2!1sen!2sus"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        </div>
    </div>
    <!-- Contact address strip -->
    <div class="contact-address">
        <h4 class="karla">
            <strong>Address - </strong>
            <span class="p pt-1 text-center">123 Main Street, Suite 500, Cityville, State, Country.</span>
        </h4>
    </div>
    <!-- Ends Contact address strip -->
    <div class="contact-form">
        <h2 class="text-center">Get in Touch</h2>
        <hr class="primary">

        <form action="#" class="p-4" method="POST">
            <div class="form-group white-label">
                <label class="label-animate">Your Name</label>
                <input type="text" class="text-input" name="name">
            </div>
            <div class="form-group white-label">
                <label class="label-animate">Email</label>
                <input type="email" class="text-input" name="email">
            </div>
            <div class="form-group white-label">
                <textarea placeholder="Your Message" cols="10" rows="5" class="text-input" name="message"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn mx-auto form-submit-button--square w-100">Send</button>
            </div>
        </form>
    </div>
</section>
<!-- End Contact map -->

<section class="pt-5 pb-5">
    <div class="container mb-4">
        <h5 class="text-center mb-4">Follow Us</h5>
        <div class="contact-social-icons">
            <div class="social-icon--facebook">
                <a href="<?php echo $frontendData['facebook'] ?>"> <i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="social-icon--twitter">
                <a href="<?php echo $frontendData['twitter'] ?>"> <i class="fab fa-twitter"></i></a>
            </div>
            <div class="social-icon--instagram">
                <a href="<?php echo $frontendData['instagram'] ?>"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</section>
<?php include_once('./component/footer.php') ?>