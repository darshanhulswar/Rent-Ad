<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    if(isset($_GET['house-verified'])) {
    
        if(isset($_SESSION['employee']['id'])) {
            $propID = $_GET['property-id'];
            $updateHouseQuery = "UPDATE properties SET is_verified = 1 WHERE id = '$propID'";
            if($conn->query($updateHouseQuery)){
                header('location: verification-succeffull.php?property-id=' . $_GET['property-id'] . '&house-verified=1');
            } else {
                header('lol.php');
            }
        } else {
            header('location: index.php?employee-must-login');
        }
    
    }
   
    if(isset($_SESSION['employee']['id'])) {
            
        if(isset($_GET['property-id'])) {
            $propertyId = $_GET['property-id'];

            // Get Property Details from properties table
            $queryHouseDetails = "SELECT * from properties  WHERE id = '$propertyId'";
            $houseDetails = $conn->query($queryHouseDetails);
            $houseFinalDetails = $houseDetails->fetch_assoc();
            var_dump($houseFinalDetails);

            // Query Image details from images table
            $propertyID = $houseFinalDetails['id'];
            $queryImage = "SELECT * FROM images WHERE property_id = '$propertyID'";
            $imageResult = $conn->query($queryImage);
            $propertyImages = $imageResult->fetch_assoc();
            var_dump($propertyImages);
        } else {
            header('location: dashboard.php?property-id-not-set=1');
        }
    } else {
        header('location: index.php?employee-must-login');
    }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Employee | Verify Uploaded House</title>

    <!-- Link Tags -->
    <?php include 'inc/links.inc.php'; ?>
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="sr spinner-border">&nbsp;</div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container">
            <a href="index.php" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <ul class="navbar-nav mx-auto">
                    <h2 class="h1 nav-item text-secondary">Employee Dashdoard</h2>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- House Details -->
    <section>
        <div class="container">
            <a href="verify-house.php?property-id=<?php echo $propertyID; ?>&house-verified=1"
                class="btn btn-primary">Verified</a>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark p-2 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer text-center">
                        <p class="text-white span-strong text-secondary my-2">
                            <span class="text-danger">Note:</span> Only Admin Can Add an Employee So you're not allowed
                            to Signup to Our Rent-Ad
                            Information System
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php' ?>
    <script>
    jQuery(document).ready(function($) {

        $(".clickable-row").click(function() {

            window.location = $(this).data("href");

        });

    });
    </script>
</body>

</html>