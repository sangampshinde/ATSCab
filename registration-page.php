<?php
    require_once "lib.php";
    $conn = connectDB();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Sanitize and validate input
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // Password confirmation check
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!');</script>";
            exit();
        }

        // Check if any field is empty (basic validation)
        if (empty($name) || empty($email) || empty($password)) {
            echo "<script>alert('Please fill in all fields.');</script>";
            exit();
        }

        // Additional validation for email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format.');</script>";
            exit();
        }

        // Attempt to register the user (adjust function to match new parameters)
        $result = registerUser($name, $email, $password);

        if ($result) {
            echo "<script>alert('Registration successful'); window.location.href = 'login-page.php?register=success';</script>";
            exit();
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }
    }
?>
<?php
    require_once "lib.php";
    $conn = connectDB();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Sanitize and validate input
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // Password confirmation check
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!');</script>";
            exit();
        }

        // Check if any field is empty (basic validation)
        if (empty($name) || empty($email) || empty($password)) {
            echo "<script>alert('Please fill in all fields.');</script>";
            exit();
        }

        // Additional validation for email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format.');</script>";
            exit();
        }

        // Attempt to register the user (adjust function to match new parameters)
        $result = registerUser($name, $email, $password);

        if ($result) {
            echo "<script>alert('Registration successful'); window.location.href = 'login-page.php?register=success';</script>";
            exit();
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
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
    .account-container {
        margin-top: 50px;
        margin-bottom: 50px;
        max-width: 500px;
        width: 100%;
        padding: 2rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Heading and Text Styling */
    .account-container h3 {
        font-weight: bold;
        margin-bottom: 1rem;
        color: #333;
    }
    .account-container p {
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

    /* Select Styling */
    .form-select {
        appearance: none; /* Remove default arrow */
        background-color: #f8f9fa; /* Light background */
        border: 1px solid #ced4da; /* Border color */
        border-radius: 0.25rem; /* Rounded corners */
        padding: 0.375rem 1.75rem 0.375rem 0.75rem; /* Padding for text */
        font-size: 1rem; /* Font size */
    }
    .form-select:focus {
        border-color: #80bdff; /* Border color on focus */
        outline: none; /* Remove outline */
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25); /* Shadow on focus */
    }
    .form-select::after {
        content: '▼'; /* Custom arrow character */
        position: absolute; /* Positioning */
        right: 10px; /* Right padding */
        top: 50%; /* Center vertically */
        transform: translateY(-50%); /* Adjust vertical position */
        pointer-events: none; /* Ignore clicks on the arrow */
    }

    /* Button Styling */
    .btn-dark {
        background-color: #343a40; /* Dark background */
        color: white; /* White text */
        border: none; /* No border */
    }
    .btn-dark:hover {
        background-color: #23272b; /* Darker background on hover */
    }

    /* Link Styling */
    .account-container .form-text a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .account-container .form-text a:hover {
        color: #0056b3;
    }
</style>

</head>
<body>

<div class="account-container">
    <h3 class="text-center">Create Your Account</h3>
    <p class="text-center text-muted">Join us and enjoy the benefits!</p>
    
    <!-- Create Account Form -->
    <form action="registration-page.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your full name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="Create a password">
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm_password" required placeholder="Confirm your password">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-dark">Create Account</button>
        </div>
        <div class="form-text text-center mt-3">
            <p>Already have an account? <a href="login-page.php">Log In</a></p>
        </div>
    </form>
</div>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
