<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Check for empty fields
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill in all fields.');</script>";
        exit();
    }

    // Call the login function
    $user = loginUser($email, $password);
    if ($user) {
        // Login successful
        $_SESSION['user_id'] = $user['user_id']; // Store user ID in session
        header("Location: driver-registration.php"); // Redirect to the registration page
        exit();
    } else {
        // Login failed
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
    }
}

?>






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
    <!-- <link rel="stylesheet" href="assets/frontend/css/style.css">
    <link rel="stylesheet" href="assets/frontend/css/custom.css"> -->
    <style>
        /* Body and Container Styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #38d762;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        /* Heading and Text Styling */
        .login-container h3 {
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }
        .login-container p {
            font-size: 14px;
            color: #555;
        }
        /* Input Styling */
        .form-control {
            border-radius: 5px;
            background-color: #f2f4f7;
            border: 1px solid #ddd;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background-color: #e9ecef;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }
        /* Button Styling */
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }
        /* Link Styling */
        .login-container .form-text a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .login-container .form-text a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Heading -->
        <h3 class="text-center">Login to Your Account</h3>
        <p class="text-center text-muted">Welcome back! Please enter your details.</p>
        
        <!-- Login Form -->
        <form action="driver-registration.php" method="POST">
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
            </div>
            <!-- Login Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Log In</button>
                <a href="index.php"><button type="button" class="btn btn-dark">Back to Home</button></a>
            </div>
            <!-- Additional Links -->
            <div class="form-text text-center mt-3">
                <a href="forgot-password.php">Forgot Password?</a> | 
                <a href="registration-page.php">Create Account</a>
            </div>
        </form>
    </div>

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
