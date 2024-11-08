<?php 
include_once('./component/header.php'); 
include_once('./lib.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $userId = intval($_POST['id']); // Assuming the user ID is passed in the form
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $gender = intval($_POST['gender']); // Assuming 1 for Male, 0 for Female
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);

    // Call the function to update the user profile
    if (updateUserProfile($userId, $firstName, $lastName, $gender, $email, $phone, $address)) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating profile.');</script>";
    }
}
?>

<section class="mt-120 mb-4"></section>
<section class="booking-section py-5 my-5 text-white" id="edit_profile">
    <h1 class="text-center">Change Details</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 flex-col-center">
                <form action="edit_profile.php" class="mt-4 w-100" method="POST" id="profile_form">
                    <input type="hidden" name="id" value="12345"> <!-- Replace with dynamic user ID -->
                    <div class="form-inputs mt-5 w-100">
                        <div class="row w-100 m-0 p-0">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark">First Name</label>
                                    <input type="text" class="text-input" name="first_name" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark">Last Name</label>
                                    <input type="text" class="text-input" name="last_name" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="checkboxes form-group">
                                    <div class="pretty p-default p-round">
                                        <input type="radio" name="gender" value="1" checked>
                                        <div class="state custom-state">
                                            <label class="text-dark">Male</label>
                                        </div>
                                    </div>
                                    <div class="pretty p-default p-round">
                                        <input type="radio" name="gender" value="0">
                                        <div class="state custom-state">
                                            <label class="text-dark">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark">Email</label>
                                    <input type="text" class="text-input" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="text-dark">Phone</label>
                                    <input type="text" class="text-input" name="phone" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="text-dark">Address</label>
                                <textarea class="text-input" cols="30" rows="4" name="address" placeholder="Your Address"></textarea>
                            </div>

                            <button class="tab-button mx-auto mt-3" type="submit" id="booking">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once('./component/footer.php'); ?>
