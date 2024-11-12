<?php 
include_once('./component/header.php');
include_once('lib.php');
include_once('stringdata.php');

$frontendData = getFrontendData();
$testimonials = getTestimonials();
// $cars = fetchEnabledCars();
$cars = fetchEnabledInServiceCars();
// echo "<pre>";
// print_r($cars);
// echo "</pre>";


// ---------------------------------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $full_name = $_POST['full_name'];
    $mobile_no = $_POST['mobile_no'];
    $mail_id = $_POST['mail_id'];
    $no_of_travellers = $_POST['no_of_travellers'];
    $destination = $_POST['destination'];
    $pickup = $_POST['pickup'];
    $vehicle_type = $_POST['vehicle_type'];
    $other_things = $_POST['other_things'];
    $journey_time = $_POST['journey_time'];
    $journey_date = $_POST['journey_date'];

    // Insert data into database
    $conn = connectDB();
    $sql = "INSERT INTO booking_inquiries (full_name, mobile_no, mail_id, no_of_travellers, destination, pickup, vehicle_type, other_things, journey_time, journey_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("sssiisssss", $full_name, $mobile_no, $mail_id, $no_of_travellers, $destination, $pickup, $vehicle_type, $other_things, $journey_time, $journey_date);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Enquiry Sent Successfully!');</script>";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }
    
    $conn->close();
}

// ----------------------------------------------------------------
$vehicles = getVehicleTypes();
// print_r($vehicles);


// if (!empty($vehicles)) {
//     echo "<p>Vehicle Types List:</p>";
//     foreach ($vehicles as $vehicle) {
//         echo "<pre>";
//         print_r($vehicle);  // This will show the structure of each item in $vehicleTypes
//         echo "</pre>";
//     }
// } else {
//     echo "<p>No vehicle types available.</p>";
// }






?>









<!-- Hero Section -->
    <section class="hero-section--home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="hero-content--home w-100 text-center mt-4">
                        <h5 class="light primary"><?php echo $frontendData['contact_phone'] ?>
                        </h5>
                        <h1 class="mb-3"><?php echo $indexdata1 ?></h1>
                        <a href="#book_now"><button class="btn mx-auto form-submit-button">Book Now</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ends Hero Section -->

<!-- Booking Section -->
<section id="book_now" class="booking-section py-5 my-5 text-white">
    <h1 class="text-center"><?php echo $indexdata4 ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 flex-col-center">
                <form action="" method="POST" id="enquiry_booking_form" class="mt-4 w-100" onsubmit="return validateForm()">
                    <div class="form-inputs mt-5 w-100">
                        <div class="row w-100 m-0 p-0">

                            <!-- Full Name -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="full_name" class="label-animate">Full Name</label>
                                    <input type="text" class="text-input" name="full_name" id="full_name"  required>
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="mobile_no" class="label-animate">Mobile No</label>
                                    <input type="text" class="text-input" name="mobile_no" id="mobile_no"  required>
                                    <span id="mobileError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="mail_id" class="label-animate">Email ID</label>
                                    <input type="email" class="text-input" name="mail_id" id="mail_id"  required>
                                    <span id="emailError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Number of Travellers -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="no_of_travellers" class="label-animate">No of Travellers</label>
                                    <input type="number" class="text-input" name="no_of_travellers" value="1" min="1" required>
                                    <span id="travellersError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Destination -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="destination" class="label-animate">Destination</label>
                                    <input type="text" class="text-input" name="destination" id="destination"  required>
                                    <span id="destinationError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Pick Up -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="pickup" class="label-animate">Pick Up</label>
                                    <input type="text" class="text-input" name="pickup" id="pickup" required>
                                    <span id="pickupError" class="text-danger"></span>
                                </div>
                            </div>

                        <!-- Preferred Vehicle -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="vehicle_type" class="">Preferred Vehicle</label>
                                    <select class="text-input" name="vehicle_type" id="vehicle_type" required>
                                        <option value="" disabled selected>Select Vehicle Type</option>
                                        <?php
                                            // Fetch vehicle types
                                            $vehicleTypes = getVehicleTypes();

                                            // Loop through vehicle types and display them as options
                                            foreach ($vehicleTypes as $vehicle) {
                                                echo "<option value='{$vehicle['id']}'>{$vehicle['displayname']} ({$vehicle['seats']} seats)</option>";
                                            }
                                        ?>
                                    </select>
                                    <span id="vehicleError" class="text-danger"></span>
                                </div>
                            </div>
                            <!-- Other Details -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="other_things" class="label-animate">Other Details</label>
                                    <textarea class="text-input" name="other_things" rows="3"></textarea>
                                    <span id="detailsError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Time and Date -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="journey_time" class="label-animate-time">Time</label>
                                    <input type="time" class="text-input" name="journey_time" id="journey_time" >
                                    <span id="timeError" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="journey_date" class="label-animate-date">Date of Journey</label>
                                    <input type="date" class="text-input" name="journey_date" id="journey_date" required>
                                    <span id="dateError" class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary mt-3 tab-button">Submit</button>
                                <button type="button" class="btn btn-secondary mt-3 tab-button" onclick="window.location.href='index.html'">Cancel</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Ends Booking Section -->

<script>
    function validateForm() {
        let isValid = true;
        const fullName = document.getElementById('full_name').value;
        const mobileNo = document.getElementById('mobile_no').value;
        const email = document.getElementById('mail_id').value;
        const destination = document.getElementById('destination').value;
        const pickup = document.getElementById('pickup').value;
        const vehicleType = document.getElementById('vehicle_type').value;

        // Clear previous error messages
        document.getElementById('nameError').innerText = '';
        document.getElementById('mobileError').innerText = '';
        document.getElementById('emailError').innerText = '';
        document.getElementById('destinationError').innerText = '';
        document.getElementById('pickupError').innerText = '';
        document.getElementById('vehicleError').innerText = '';

        // Validate Full Name
        if (fullName === '' || fullName.length < 3) {
            document.getElementById('nameError').innerText = 'Full Name must be at least 3 characters.';
            isValid = false;
        }

        // Validate Mobile No (example: international format check)
        const mobileRegex = /^\+?[0-9]{10,13}$/;
        if (!mobileRegex.test(mobileNo)) {
            document.getElementById('mobileError').innerText = 'Invalid mobile number.';
            isValid = false;
        }

        // Validate Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            document.getElementById('emailError').innerText = 'Invalid email format.';
            isValid = false;
        }

        // Validate other fields as needed...

        return isValid;
    }
</script>
<!-- Services Section -->
<section class="services-section my-5 relative">
    <!-- Section title -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Our Services</h2>
            </div>
        </div>
    </div>
    
    <!-- Services -->
    <div class="container my-0 my-lg-5">
        <div class="row">
            <!-- Service Card 1 -->
            <div class="col-lg-6 col-md-6 col-sm-12 py-4">
                <div class="service-card text-center">
                    <div class="service-round-element mb-3">
                        <img src="images/fleet-homepickup.png" alt="Home pickups">
                    </div>
                    <h5>Home pickups</h5>
                    <p>We pick you up right from your doorstep for added ...</p>
                </div>
            </div>

            <!-- Service Card 2 -->
            <div class="col-lg-6 col-md-6 col-sm-12 py-4">
                <div class="service-card text-center">
                    <div class="service-round-element mb-3">
                        <img src="images/fleet-easybooking.png" alt="Easy Bookings">
                    </div>
                    <h5>Easy Bookings</h5>
                    <p>Simplify your ride reservations with our user-frie...</p>
                </div>
            </div>

            <!-- Service Card 3 -->
            <div class="col-lg-6 col-md-6 col-sm-12 py-4">
                <div class="service-card text-center">
                    <div class="service-round-element mb-3">
                        <img src="images/fleet-bestprice.png" alt="Best price guranteed">
                    </div>
                    <h5>Best price guranteed</h5>
                    <p>We offer competitive rates, and we'll match or bea...</p>
                </div>
            </div>

            <!-- Service Card 4 -->
            <div class="col-lg-6 col-md-6 col-sm-12 py-4">
                <div class="service-card text-center">
                    <div class="service-round-element mb-3">
                        <img src="images/fleet-care.png" alt="24/7 Customer care">
                    </div>
                    <h5>24/7 Customer care</h5>
                    <p>Our support team is available around the clock to ...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('car-card.php');?>

<!-- Testimonial Section -->
<section class="pb-5 pt-0">
    <div class="container text-center no-padding-mobile relative">
        <!-- Section title -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">Testimonials</h2>
                </div>
            </div>
        </div>
        <!-- Ends Section title -->

        <!-- Slick Slider Wrapper -->
        <div class="js-testimonial-slider">
            <?php if (!empty($testimonials)) : ?>
                <?php foreach ($testimonials as $t) : ?>
                    <div>
                        <div class="row mt-5">
                            <div class="col-lg-4 flex-col-center">
                                <div class="testimonial-image-block">
                                    <div class="shadow-overlay"></div>
                                    <?php if ($t['image'] = null): //if ($t['image'] != null)   : ?>
                                        <!-- <img src="uploads/<?php //echo htmlspecialchars($t['image']); ?>" alt="Testimonial Image" class="testimonial-image"> -->
                                        <img src="images/no-user.jpg" alt="Testimonial Image" class="testimonial-image">
                                    <?php else : ?>
                                        <img src="images/no-user.jpg" alt="Testimonial Image" class="testimonial-image">
                                    <?php endif; ?>
                                    <div class="quote-round">
                                        <img src="images/fleet-quote.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 d-flex flex-column align-items-center">
                                <div class="testimonial-content w-100 text-center text-lg-left">
                                    <?php echo htmlspecialchars($t['details']); ?>
                                    <br><br>
                                    <i> - <?php echo htmlspecialchars($t['name']); ?></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No testimonials found.</p>
            <?php endif; ?>
        </div>
        <!-- Slider dots -->
        <div class="testimonial-dots mx-auto"></div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $('.js-testimonial-slider').slick({
            dots: true, 
            infinite: true, 
            speed: 300,
            slidesToShow: 1, 
            slidesToScroll: 1,
            autoplay: true, 
            autoplaySpeed: 5000, 
            adaptiveHeight: true, 
            arrows: false, 
            appendDots: $('.testimonial-dots') 
        });
    });
</script>   
<?php include_once('./component/footer.php') ?>