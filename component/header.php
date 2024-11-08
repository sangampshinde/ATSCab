<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="manifest" href="manifest.json?v2"> -->
    <link rel="icon" href="assets/images/favicon.png">
    <!-- Bootstrap & Other library css -->
    <title>ATS Cab Online</title> <!-- Replaced with a dummy app name -->
    <link rel="stylesheet" href="assets/frontend/libraries/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/frontend/css/animate.css">
    <link rel="stylesheet" href="assets/frontend/libraries/fontawesome/css/all.min.css">
    <!-- slick -->
    <link rel="stylesheet" href="assets/frontend/libraries/slider/slick/slick.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
    <!-- Dropdown -->
    <link rel="stylesheet" href="assets/frontend/libraries/dropdown/css/nice-select.css">
    
    <!-- Date time picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Checkboxes and radios -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="assets/frontend/css/style.css">
    <!-- ?=v1 -->
    <link rel="stylesheet" href="assets/frontend/css/custom.css">
    
    <style>
        #nav-bar {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            background-color: transparent !important;
            z-index: 1000;
        }
    </style>
</head>
<body>
<!-- Starts Wrapper -->
<div class="wrapper" id="nav-bar">
    <!-- MOBILE OFFCANVAS NAVIGATIONS -->
    <!-- Left side off canvas menu -->
    <div class="offcanvas-nav left-side-nav" id="nav-left">
        <div class="ml-5 mt-2">
            <a href="index.php"><img src="images/2e63ff4e-0bf0-49e6-9eab-56a2661cbcf3.png" alt="Company Logo" height="70px"></a>
        </div>
        <div class="offcanvas-nav_close" data-close="nav-left">
            <i class="fa fa-times"></i>
        </div>
        <ul class="list-unstyled offcanvas-nav_links mt-0">
            <li>
                <a class="nav-item nav-link" href="index.php">Home</a>
            </li>
            <li>
                <a class="nav-item nav-link" href="about.php">About</a>
            </li>
            <li>
                <a class="nav-item nav-link" href="driver-registration.php">Driver Registration</a>
            </li>
            <li>
                <a class="nav-item nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <!-- Ends Left side off canvas menu -->

    <!-- Header starts -->
     <header>
        <div class="container-fluid d-flex justify-content-between">
            <nav class="navbar navbar-expand-lg d-flex flex-row-reverse flex-lg-row justify-content-around w-100">
                <a class="navbar-brand d-none d-sm-inline-block mr-5 pr-5 mr-lg-0 pr-lg-0" href="index.php">
                    <img src="images/2e63ff4e-0bf0-49e6-9eab-56a2661cbcf3.png" alt="Company Logo" height="100px">
                </a>
                <!-- Mini logo for mobile device -->
                <a class="navbar-brand d-inline-block d-sm-none w-50" href="index.php">
                    <img src="images/830a4957-3fd9-4f41-a774-d8eb5cffddb4.png" alt="Company Icon" class="w-75">
                </a>
                <!-- Left side navbar toggler -->
                <button class="navbar-toggler left-nav-trigger" data-target="nav-left">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse mx-auto" id="navbar">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Home</a>
                        <a class="nav-item nav-link" href="about.php">About</a>
                        <a class="nav-item nav-link" href="contact.php">Contact</a>
                        <a class="nav-item nav-link" href="driver-registration.php">Driver Registration</a>
                    </div>
                </div>
            </nav>

            <!-- Simulating a logged-in user -->
            <div class="login-container">
                <a href="login-page.php" class="stay">
                <button type="button" class="btn mr-2" style="background-color: #00cc37; color: white;">Login</button>
                </a>
                <a href="registration-page.php" class="stay">
                <button type="button" class="btn mr-5" style="background-color: #00cc37; color: white;">Register</button>
                </a>
            </div>
            
    </header>
    <!-- Header ends -->
</div>
