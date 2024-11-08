<?php include_once('./component/header.php');
include_once('lib.php');
include_once('stringdata.php');

$frontendData = getFrontendData();
?>





<footer>
    <div class="container mt-0 mt-lg-3 text-white">
        <div class="row w-100 m-0 p-0">
            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 pb-2 pb-lg-0">
                <div class="footer-logo">
                    <a href="index.html"><img src="assets/images/ats_white.png" alt="Company Logo" class="d-block mx-auto" height="100px"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 footer-col flex-col-center">
                <p> Sunshine Apartment, Tower no.07, 1602,, My city,Manpada Road, Runwal Garden,, Dombivli East,Mumbai, Maharashtra, India. </p>
            </div>
            <div class="col-lg-3 col-md-4 footer-col flex-col-center">
                <p><?php echo $frontendData['contact_email'] ?><br> <?php echo $frontendData['contact_phone'] ?></p>
            </div>
            <div class="col-lg-2 col-md-4 flex-row-center footer-col footer-social">
                <a href="<?php echo $frontendData['facebook'] ?>" class="mx-3"> <i class="fab fa-facebook-f"></i> </a>
                <a href="<?php echo $frontendData['twitter'] ?>" class="mx-3"> <i class="fab fa-twitter"></i> </a>
                <a href="<?php echo $frontendData['instagram'] ?>" class="mx-3"> <i class="fab fa-instagram"></i> </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 pt-2 pt-sm-5">
                <p class="text-center mb-0">
                    <center>&copy;  ATS Cab 2022. All Rights Reserved. | Powered By PreDrag System</center>
                </p>
            </div>
        </div>
    </div>
</footer>





<!-- END WRAPPER -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script src="assets/frontend/js/jquery.js"></script>
    <script src="assets/frontend/js/popper.js"></script>
    <script src="assets/frontend/libraries/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- PLUGINS -->
    <!-- slick carousel -->
    <script src="assets/frontend/libraries/slider/slick/slick.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script> -->
    <!-- Nice select -->
    <script src="assets/frontend/libraries/dropdown/js/jquery.nice-select.min.js"></script>
    
    <!-- Date time picker -->
    <script src="assets/frontend/js/moment.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script src="assets/frontend/js/main.js"></script>
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <!-- <script src="sw.js?v5"></script> -->
    <!-- <script src="web-sw.js?v1"></script> -->
</body>
</html>