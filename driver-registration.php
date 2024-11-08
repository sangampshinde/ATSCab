<?php 
include_once('./component/header.php');
include_once('./lib.php');

// Connect to the database
$conn = connectDB(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $car = $conn->real_escape_string($_POST['car']);
    $carType = $conn->real_escape_string($_POST['carType']);
    $carModel = intval($_POST['carModel']);
    $registrationNo = $conn->real_escape_string($_POST['registrationNo']);
    $insurance = $conn->real_escape_string($_POST['insurance']);
    $puc = $conn->real_escape_string($_POST['puc']);
    $loanOrSelf = $conn->real_escape_string($_POST['loanOrSelf']);
    $ownerName = $conn->real_escape_string($_POST['ownerName']);
    $ownerMobile = $conn->real_escape_string($_POST['ownerMobile']);
    $carDetails = $conn->real_escape_string($_POST['carDetails']);
    $driverName = $conn->real_escape_string($_POST['driverName']);
    $driverAge = intval($_POST['driverAge']);
    $driverDOB = $conn->real_escape_string($_POST['driverDOB']);
    $driverLicenseNo = $conn->real_escape_string($_POST['driverLicenseNo']);
    $driverContactNo = $conn->real_escape_string($_POST['driverContactNo']);
    $driverAlternateNo = $conn->real_escape_string($_POST['driverAlternateNo']);
    $driverAddress = $conn->real_escape_string($_POST['driverAddress']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO driver_registration (car, carType, carModel, registrationNo, insurance, puc, loanOrSelf, ownerName, ownerMobile, carDetails, driverName, driverAge, driverDOB, driverLicenseNo, driverContactNo, driverAlternateNo, driverAddress)
            VALUES ('$car', '$carType', '$carModel', '$registrationNo', '$insurance', '$puc', '$loanOrSelf', '$ownerName', '$ownerMobile', '$carDetails', '$driverName', '$driverAge', '$driverDOB', '$driverLicenseNo', '$driverContactNo', '$driverAlternateNo', '$driverAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data submitted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<section class="hero-section--contact d-flex">
    <div class="container-fluid mt-auto d-flex flex-column p-0">
        <div class="row no-gutters">
            <div class="col-sm-12">
                <div class="hero-content--contact w-100">
                    <div class="inner-content">
                        <h1 class="mb-0">Contact Us</h1>
                        <h5 class="karla">Tell Us Your Thoughts</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="card shadow-sm p-4 rounded">
        <h2 class="text-center mb-4">Driver Registration</h2>
        <form action="driver-registration.php" method="post" onsubmit="return validateForm()">
            
            <!-- Car Information -->
            <h5 class="text-success mb-3">Car Information</h5>
            
            <div class="row">
                <!-- Car Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="car">Car</label>
                    <input type="text" class="form-control" name="car" required minlength="3">
                </div>

                <!-- Car Type Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="carType">Car Type</label>
                    <input type="text" class="form-control" name="carType" required>
                </div>

                <!-- Car Model Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="carModel">Car Model</label>
                    <input type="number" class="form-control" name="carModel" required min="1900" max="2099">
                </div>

                <!-- Registration No Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="registrationNo">Registration No.</label>
                    <input type="text" class="form-control" name="registrationNo" required pattern="[A-Za-z0-9\s]{1,10}">
                </div>

                <!-- Insurance Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="insurance">Insurance</label>
                    <input type="text" class="form-control" name="insurance" required>
                </div>

                <!-- PUC Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="puc">PUC</label>
                    <input type="text" class="form-control" name="puc" required>
                </div>

                <!-- Loan/Self Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="loanOrSelf">Loan / Self</label>
                    <input type="text" class="form-control" name="loanOrSelf" required>
                </div>

                <!-- Owner Name Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="ownerName">Owner Name</label>
                    <input type="text" class="form-control" name="ownerName" required minlength="3">
                </div>

                <!-- Owner Mobile Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="ownerMobile">Owner Mobile No.</label>
                    <input type="text" class="form-control" name="ownerMobile" required pattern="\d{10}">
                </div>

                <!-- Car Details Field -->
                <div class="form-group col-12 mb-3">
                    <label for="carDetails">Car Details</label>
                    <textarea class="form-control" name="carDetails" required></textarea>
                </div>
            </div>

            <hr class="my-4">

            <!-- Driver Information -->
            <h5 class="text-success mb-3">Driver Information</h5>

            <div class="row">
                <!-- Driver Name Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="driverName">Driver Name</label>
                    <input type="text" class="form-control" name="driverName" required minlength="3">
                </div>

                <!-- Driver Age Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="driverAge">Driver Age</label>
                    <input type="number" class="form-control" name="driverAge" required min="18">
                </div>

                <!-- Driver DOB Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="driverDOB">Driver Date of Birth</label>
                    <input type="date" class="form-control" name="driverDOB" required>
                </div>

                <!-- Driver License No Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="driverLicenseNo">Driver License No.</label>
                    <input type="text" class="form-control" name="driverLicenseNo" required pattern="[A-Za-z0-9-]{1,20}">
                </div>

                <!-- Driver Contact No Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="driverContactNo">Driver Contact No.</label>
                    <input type="text" class="form-control" name="driverContactNo" required pattern="\d{10}">
                </div>

                <!-- Driver Alternate No Field -->
                <div class="form-group col-md-6 mb-3">
                    <label for="driverAlternateNo">Driver Alternate No.</label>
                    <input type="text" class="form-control" name="driverAlternateNo" pattern="\d{10}">
                </div>

                <!-- Driver Address Field -->
                <div class="form-group col-12 mb-3">
                    <label for="driverAddress">Driver Address</label>
                    <textarea class="form-control" name="driverAddress" required></textarea>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 mt-3 tab-button">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
function validateForm() {
    const ownerMobile = document.forms["driver-registration"]["ownerMobile"].value;
    if (!/^\d{10}$/.test(ownerMobile)) {
        alert("Owner Mobile Number must be 10 digits");
        return false;
    }
    // Additional validations can be added similarly
    return true;
}
</script>

<?php include_once('./component/footer.php') ?>
