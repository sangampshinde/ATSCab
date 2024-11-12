<?php
// reset_password.php (Token Verification and Password Update)
require 'lib.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    $conn = connectDB();

    // Verify token and check expiration (optional)
    $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();
    $stmt->close();

    if ($email) {
        // Token is valid; update the user's password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();
        $stmt->close();

        // Delete the token after use
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();

        echo "Password successfully reset. You can now log in with your new password.";
    } else {
        echo "Invalid or expired token.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/frontend/libraries/bootstrap/dist/css/bootstrap.min.css">
    <style>
        /* Styling similar to the forgot password page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #38d762;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .reset-password-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .reset-password-container h3 {
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }
        .form-control {
            border-radius: 5px;
            background-color: #f2f4f7;
            border: 1px solid #ddd;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            background-color: #e9ecef;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }
        .btn-dark {
            width: 100%;
            padding: 0.75rem;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="reset-password-container">
    <h3 class="text-center">Reset Password</h3>
    <form action="submit_new_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="Enter new password">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Confirm new password">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-dark">Reset Password</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
