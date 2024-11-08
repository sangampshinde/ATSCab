<?php
// Database configuration
$host = "localhost";
$user = "root";  
$pass = "";      
$db_name = "u255014993_atscab"; 

// Function to establish a database connection
function connectDB() {
    global $host, $user, $pass, $db_name;
    
    // Create a new MySQLi connection
    $conn = new mysqli($host, $user, $pass, $db_name);

    // Check for connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// ------------------------------------------------------------------

// Function to fetch all data from the 'frontend' table
function getFrontendData() {
    $conn = connectDB(); // Connect to the database
    $sql = "SELECT * FROM frontend WHERE deleted_at IS NULL"; 
    $result = $conn->query($sql);

    $data = [];
    $pdata = [];
    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC); 

        foreach ($data as $key => $value){
            $pdata[$value['key_name']] = $value['key_value'];
        }
    }

    $conn->close(); 
    return $pdata;
}

// ---------------------------------------------------------------------------------

function getTestimonials() {
    $conn = connectDB(); // Connect to the database
    $sql = "SELECT id, name, details FROM testimonials WHERE deleted_at IS NULL"; 
    $result = $conn->query($sql);

    $pdata = []; // Array to store processed data

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Store each testimonial's id, name, and details in the array
            $pdata[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'details' => $row['details']
            ];
        }
    }

    $conn->close(); // Close the database connection
    return $pdata;
}

// -------------------------------------------------------------------------

// Assuming you have a function to fetch team members from the database
function getTeamMembers() {
    $conn = connectDB(); // Connect to the database
    $sql = "SELECT * FROM team WHERE deleted_at IS NULL"; 
    $result = $conn->query($sql);

    $teamMembers = [];
    if ($result->num_rows > 0) {
        $teamMembers = $result->fetch_all(MYSQLI_ASSOC); // Fetch all team members
    }

    $conn->close();
    return $teamMembers;
}

$teamMembers = getTeamMembers(); // Fetch all team members

 //-------------------------------------------------------------------------

 // Fetch enabled cars from the database
function fetchEnabledCars() {
    $conn = connectDB();
    $query = "SELECT * FROM cars WHERE status = 1"; // Adjust table name if necessary
    $result = $conn->query($query);

    $cars = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }
    }

    $conn->close();
    return $cars;
}

// Fetch the enabled cars
$cars = fetchEnabledCars();

//----------------------------------------------------------------------

function registerUser($name, $email, $password, $user_type, $group_id) {
    $conn = connectDB();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $apiToken = bin2hex(random_bytes(30)); // Generate a random 60-character API token

    // Set other fields to NULL explicitly for registration
    $user_id = NULL;
    $remember_token = NULL;
    $deleted_at = NULL;

    // Prepare the SQL statement with explicit NULL values for unused fields
    $stmt = $conn->prepare("INSERT INTO users (user_id, name, email, password, user_type, group_id, api_token, remember_token, created_at, updated_at, deleted_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, ?)");
    $stmt->bind_param("issssisss", $user_id, $name, $email, $hashedPassword, $user_type, $group_id, $apiToken, $remember_token, $deleted_at);

    $result = $stmt->execute();
    if (!$result) {
        echo "Error: " . $stmt->error; // Error message for debugging
    }

    $stmt->close();
    $conn->close();
    return $result;
}


// // User registration
// function registerUser($name, $email, $password, $user_type, $group_id) {
//     $conn = connectDB();
//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//     $stmt = $conn->prepare("INSERT INTO auth_registration (name, email, password, user_type, group_id) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssi", $name, $email, $hashedPassword, $user_type, $group_id);

//     $result = $stmt->execute();
//     $stmt->close();
//     $conn->close();
//     return $result;
// }



// ===========================
// Login
function loginUser($email, $password) {
    $conn = connectDB(); // Establish a database connection

    // Prepare the SQL statement to fetch the user by email
    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with that email exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, return user data
            return $user; // Return user data (e.g., user ID)
        } else {
            // Password is incorrect
            return false; // Password mismatch
        }
    } else {
        // No user found with that email
        return false; // No user found
    }

    // Close statement and connection (not reached if return is executed)
    $stmt->close();
    $conn->close();
}

// User login
// function loginUser($email, $password) {
//     $conn = connectDB();
//     $stmt = $conn->prepare("SELECT password FROM auth_registration WHERE email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt->bind_result($hashedPassword);
//     $stmt->fetch();

//     $isValid = password_verify($password, $hashedPassword);
//     $stmt->close();
//     $conn->close();
//     return $isValid;
// }

// ---------------------------------------------------
// UPdate User Profile
// function updateUserProfile($conn, $userId, $data) {
//     // Sanitize input data
//     $firstName = $conn->real_escape_string($data['first_name']);
//     $lastName = $conn->real_escape_string($data['last_name']);
//     $gender = $conn->real_escape_string($data['gender']);
//     $email = $conn->real_escape_string($data['email']);
//     $phone = $conn->real_escape_string($data['phone']);
//     $address = $conn->real_escape_string($data['address']);

//     // SQL query to update user data
//     $sql = "UPDATE users SET 
//                 first_name='$firstName', 
//                 last_name='$lastName', 
//                 gender='$gender', s
//                 email='$email', 
//                 phone='$phone', 
//                 address='$address' 
//             WHERE id='$userId'";

//     if ($conn->query($sql) === TRUE) {
//         return true; // Success
//     } else {
//         return false; // Error
//     }
// }

function updateUserProfile($userId, $firstName, $lastName, $gender, $email, $phone, $address) {
    $conn = connectDB(); 

    
    $profileData = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'gender' => $gender,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
    ];

    
    foreach ($profileData as $key => $value) {
        $stmt = $conn->prepare("INSERT INTO users_meta (user_id, `key`, `value`, created_at, updated_at) 
                                VALUES (?, ?, ?, NOW(), NOW()) 
                                ON DUPLICATE KEY UPDATE `value` = VALUES(`value`), updated_at = NOW()");
        $stmt->bind_param("iss", $userId, $key, $value);
        
        if (!$stmt->execute()) {
            echo "Error updating profile: " . $stmt->error; // For debugging
        }

        $stmt->close();
    }

    $conn->close();
    return true;
};
// ----------------------------------------------------------------

function sendPasswordResetEmail($email) {
    $conn = connectDB();

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Generate a unique password reset token
        $token = bin2hex(random_bytes(50)); // Random token generation
        $expires = date("U") + 3600; // Token expires in 1 hour

        // Store the token in the database
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $email, $token, $expires);
        $stmt->execute();

        // Send the password reset email
        $to = $email;
        $subject = "Password Reset Request";
        $resetLink = "https://yourdomain.com/reset-password.php?token=" . $token; // Adjust with your domain
        $message = "To reset your password, please click the link below:\n\n" . $resetLink;
        $headers = "From: noreply@yourdomain.com\r\n"; // Replace with your email

        if (mail($to, $subject, $message, $headers)) {
            return true; // Email sent successfully
        } else {
            return false; // Failed to send email
        }
    } else {
        return false; // Email not found
    }

    $stmt->close();
    $conn->close();
}

// Function to reset password
function resetPassword1($token, $newPassword) {
    $conn = connectDB();

    // Validate the token
    $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Get the email associated with the token
        $stmt->bind_result($email);
        
        $stmt->fetch();

        // Update the user's password
        $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT); // Hash the new password
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $newPasswordHashed, $email);
        $stmt->execute();


        // Remove the password reset token
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();

        return true; // Password reset successfully
    } else {
        return false; // Invalid token
    }

    $stmt->close();
    $conn->close();
}

// ------------------------------------------------------------------





?>