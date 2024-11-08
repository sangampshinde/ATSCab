<?php include_once('./component/header.php') ?>

<section class="mt-120 mb-4">
    <h2 class="primary text-center bg-strip">Booking History</h2>
</section>

<!-- Start bookings -->
<section>
    <div class="container pb-5">

        <div class="booking">
            <span class="booking-date">
                21-10-2024
            </span>
            <span class="booking-status pill danger filled"> Completed </span>
            <div class="row">
                <div class="col-lg-4">
                    <h6 class="primary">From</h6>
                    <p>123 Main St, Anytown</p>
                </div>
                <div class="col-lg-4">
                    <h6 class="primary">To</h6>
                    <p>456 Elm St, Othertown</p>
                </div>
                <div class="col-lg-4">
                    <h6 class="primary">Payment</h6>
                    <p>Success</p>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="pills-container">
                        <span class="pill dark">
                            <img src="path/to/icons/fleet-booking-time.png" alt="">
                            30 minutes
                        </span>
                        <span class="pill dark">
                            <span class="rupees">₹</span>100
                        </span>
                        <span class="pill dark">
                            <img src="path/to/icons/fleet-kilometer.png" alt=""> 10 km
                        </span>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="pills-container">
                        <form action="redirect-payment.php" method="POST">
                            <input type="hidden" name="booking_id" value="12345">
                            <div class="form-group">
                                <div class="pretty p-default p-round">
                                    <input type="radio" name="method" value="Credit Card" checked>
                                    <div class="state custom-state">
                                        <label class="">Credit Card</label>
                                    </div>
                                </div>
                                <div class="pretty p-default p-round">
                                    <input type="radio" name="method" value="PayPal">
                                    <div class="state custom-state">
                                        <label class="">PayPal</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat above block for more bookings as needed -->

        <h4 class="text-center">No Record Found.</h4>    
        
    </div>
</section>
<!-- End bookings -->

<!-- Contact tiles -->

<?php include_once('./component/footer.php') ?>