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
        .forgot-password-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        /* Heading and Text Styling */
        .forgot-password-container h3 {
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }
        .forgot-password-container p {
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
        .forgot-password-container .form-text a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .forgot-password-container .form-text a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="forgot-password-container">
        <!-- Heading -->
        <h3 class="text-center">Forgot Password?</h3>
        <p class="text-center text-muted">Enter your email address to receive a password reset link.</p>
        
        <!-- Forgot Password Form -->
        <form action="your-password-reset-endpoint" method="POST">
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <!-- Send Password Reset Link Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Send Password Reset Link</button>
            </div>
            <!-- Additional Links -->
            <div class="form-text text-center mt-3">
                <p>Remember your password? <a href="login-page.php">Log In</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
