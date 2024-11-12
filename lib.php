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
 function fetchEnabledInServiceCars() {
    $conn = connectDB();
    
    $query = "
        SELECT 
            vt.icon AS image_url,  -- Get icon from vehicle_types instead of vehicle_image from vehicles
            vt.displayname AS name,
            COUNT(v.id) AS car_count
        FROM 
            vehicles v
        JOIN 
            vehicle_types vt ON v.type_id = vt.id
        WHERE 
            v.in_service = 1
            AND vt.isenable = 1
        GROUP BY 
            vt.id
    ";

    $result = $conn->query($query);

    $cars = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }
    }

    $conn->close();
    return $cars;
}

// Fetch the enabled in-service cars
$cars = fetchEnabledInServiceCars();

//  // Fetch enabled cars from the database
// function fetchEnabledCars() {
//     $conn = connectDB();
//     $query = "SELECT * FROM cars WHERE status = 1"; // Adjust table name if necessary
//     $result = $conn->query($query);

//     $cars = [];
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $cars[] = $row;
//         }
//     }

//     $conn->close();
//     return $cars;
// }

// // Fetch the enabled cars
// $cars = fetchEnabledCars();

//----------------------------------------------------------------------

function registerUser($name, $email, $password, $user_type="NULL", $group_id="NULL") {
    $conn = connectDB();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $apiToken = bin2hex(random_bytes(30)); // Generate a random 60-character API token

    // Set other fields to NULL explicitly for registration
    $user_id = NULL;
    $remember_token = NULL;
    $deleted_at = NULL;
    $user_type= NULL;
    $group_id="Null";

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
                // Function to send password reset email
                // function sendPasswordResetLink($email) {
                //     // Connect to the database
                //     $conn = connectDB();

                //     // Check if email exists
                //     $sql = "SELECT * FROM users WHERE email = ?";
                //     $stmt = $conn->prepare($sql);
                //     $stmt->bind_param("s", $email);
                //     $stmt->execute();
                //     $result = $stmt->get_result();

                //     if ($result->num_rows > 0) {
                //         // Email exists, generate reset token
                //         $user = $result->fetch_assoc();
                //         $token = bin2hex(random_bytes(50)); // Generate a unique token

                //         // Store the token and expiry time (1 hour)
                //         $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));
                //         $sql = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
                //         $stmt = $conn->prepare($sql);
                //         $stmt->bind_param("sss", $token, $expiry, $email);
                //         $stmt->execute();

                //         // Send reset email
                //         $resetLink = "http://yourdomain.com/reset_password.php?token=" . $token;
                //         $subject = "Password Reset Request";
                //         $message = "To reset your password, click on the following link: " . $resetLink;
                //         $headers = "From: no-reply@yourdomain.com";

                //         if (mail($email, $subject, $message, $headers)) {
                //             return "A password reset link has been sent to your email.";
                //         } else {
                //             return "Error sending email.";
                //         }
                //     } else {
                //         return "Email not found.";
                //     }

                //     $conn->close();
                // }

                // Function to send password reset email
                function sendPasswordResetLink($email) {
                    echo "Starting password reset process.<br>";
                    // Connect to the database
                    $conn = connectDB();
                    if (!$conn) {
                        die("Database connection failed.");
                    }

                    echo "Database connected successfully.<br>";


                
                    // Check if email exists
                    $checkEmailSql = "SELECT * FROM users WHERE email = ?";
                    $checkEmailStmt = $conn->prepare($checkEmailSql);
                    $checkEmailStmt->bind_param("s", $email);
                    $checkEmailStmt->execute();
                    $result = $checkEmailStmt->get_result();
                    if ($result->num_rows > 0) {
                        echo "Email found.<br>";
                        // Generate token and continue as normal
                        // ...
                    } else {
                        echo "Email not found.<br>";
                        return "Email not found.";
                    }
                
                    if ($result->num_rows > 0) {
                        // Email exists, generate reset token
                        $token = bin2hex(random_bytes(50)); // Generate a unique token
                        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token expiry time
                
                        // Store the token and expiry time in the database
                        $updateTokenSql = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
                        $updateTokenStmt = $conn->prepare($updateTokenSql);
                        $updateTokenStmt->bind_param("sss", $token, $expiry, $email);
                        if (!$updateTokenStmt->execute()) {
                            $resultMessage = "Failed to store reset token.";
                        } else {
                            // Prepare the reset link
                            $resetLink = "http://localhost/ATSCab/reset_password.php?token=" . urlencode($token);
                
                            // Prepare and send the reset email
                            $subject = "Password Reset Request";
                            $message = "To reset your password, please click the following link:\n\n" . $resetLink . "\n\nThis link will expire in 1 hour.";
                            $headers = "From: try.sangam@gmail.com";
                
                            if (mail($email, $subject, $message, $headers)) {
                                $resultMessage = "A password reset link has been sent to your email.";
                            } else {
                                $resultMessage = "Error sending email.";
                            }
                        }
                    } else {
                        $resultMessage = "Email not found.";
                    }
                
                    // Close the prepared statements and connection
                    $checkEmailStmt->close();
                    if (isset($updateTokenStmt)) {
                        $updateTokenStmt->close();
                    }
                    $conn->close();
                    echo "Process complete.<br>";
                
                    return $resultMessage;
                }
                





// ------------------------------------------------------------------
// get vehicles types for dropdown bokking form
function getVehicleTypes() {
    // Connect to the database
    $conn = connectDB();

    // Prepare an array to store vehicle types
    $vehicleTypes = [];

    // Query to fetch enabled vehicle types
    $stmt = $conn->prepare("SELECT id, vehicletype, displayname, icon, seats 
                            FROM vehicle_types 
                            WHERE isenable = 1");

    if ($stmt->execute()) {
        // Bind result variables
        $stmt->bind_result($id, $vehicletype, $displayname, $icon, $seats);

        // Fetch data and populate the array
        while ($stmt->fetch()) {
            $vehicleTypes[] = [
                'id' => $id,
                'vehicletype' => $vehicletype,
                'displayname' => $displayname,
                'icon' => $icon,
                'seats' => $seats
            ];
        }
    } else {
        echo "Error fetching vehicle types: " . $stmt->error; // Debugging message
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    return $vehicleTypes;
}


?>