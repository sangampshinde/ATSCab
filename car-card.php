<?php include_once('lib.php'); ?>
<style>
        /* Developer-specific car card styling */
        #card.car-card-container .car-card {
            background-color: #000 !important;
            border-radius: 15px !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
            padding: 20px !important;
            height: 100% !important;
            text-align: center !important;
            transition: transform 0.2s ease !important;
        }

        /* Hover effect */
        #card.car-card-container .car-card:hover {
            transform: scale(1.05) !important;
        }

        /* Image styling within the car card */
        #card.car-card-container .car-card img {
            width: 100px !important;
            height: 100px !important;
            border-radius: 50% !important;
            background-color: #38d762 !important;
            padding: 10px !important;
            margin-bottom: 15px !important;
        }

        /* Title and description styling */
        #card.car-card-container .car-card h2 {
            color: #ffffff !important;
            font-size: 20px !important;
            margin: 10px 0 5px 0 !important;
        }

        #card.car-card-container .car-card p {
            color: #38d762 !important;
            font-size: 16px !important;
            margin: 0 !important;
        }
</style>

<div id="card" class="container car-card-container">
    <div class="row">
        <?php
        foreach ($cars as $car) {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="car-card">
                    <img src="<?php echo'images'.$car['image_url']; ?>" alt="<?php echo $car['name']; ?>" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    <h2><?php echo $car['name']; ?></h2>
                    <p>(6 Cars)</p> <!-- Adjust this to dynamically show the number of cars if needed -->
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>





