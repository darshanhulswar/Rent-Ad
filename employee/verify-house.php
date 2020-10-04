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
            // var_dump($houseFinalDetails);

            // Query Image details from images table
            $propertyID = $houseFinalDetails['id'];
            $queryImage = "SELECT * FROM images WHERE property_id = '$propertyID'";
            $imageResult = $conn->query($queryImage);
            $propertyImages = $imageResult->fetch_assoc();
            // var_dump($propertyImages);
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
            <a href="dashboard.php" class="navbar-brand text-center" title="Employees Dashboard">
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

        </div>
    </section>

    <section>
        <div class="container">
            <div class="card my-3 p-3">
                <ul class="nav nav-tabs" id="myTab-<?php echo $houseFinalDetails['id']; ?>" role="tablist">

                    <!-- Home 1stTab -->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="house-tab-<?php echo $houseFinalDetails['id']; ?>"
                            data-toggle="tab" href="#house-<?php echo $houseFinalDetails['id']; ?>" role="tab"
                            aria-controls="house-<?php echo $houseFinalDetails['id']; ?>" aria-selected="true">House</a>
                    </li>

                    <!-- Home Details -->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="details-tab-<?php echo $houseFinalDetails['id']; ?>" data-toggle="tab"
                            href="#details-<?php echo $houseFinalDetails['id']; ?>" role="tab"
                            aria-controls="details-<?php echo $houseFinalDetails['id']; ?>"
                            aria-selected="false">Details</a>
                    </li>

                    <!-- Contact Vendor -->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab-<?php echo $houseFinalDetails['id']; ?>" data-toggle="tab"
                            href="#contact-<?php echo $houseFinalDetails['id']; ?>" role="tab"
                            aria-controls="contact-<?php echo $houseFinalDetails['id']; ?>"
                            aria-selected="false">Contact
                            Vendor</a>
                    </li>

                    <!-- Property Images -->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="img-tab-<?php echo $houseFinalDetails['id']; ?>" data-toggle="tab"
                            href="#img-<?php echo $houseFinalDetails['id']; ?>" role="tab"
                            aria-controls="img-<?php echo $houseFinalDetails['id']; ?>" aria-selected="false">Property
                            Images</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="house-<?php echo $houseFinalDetails['id']; ?>"
                        role="tabpanel" aria-labelledby="house-tab-<?php echo $houseFinalDetails['id']; ?>">
                        <span class="fa fa-paper display-3">Details:</span>
                        <p class="lead text-primary">
                            <?php echo $houseFinalDetails['details']; ?>
                        </p>

                        <p class="lead"> Bedrooms:
                            Bedrooms: <?php echo $houseFinalDetails['bed'] ?>
                        </p>

                        <p class="lead">
                            Parking Lot: <?php echo $houseFinalDetails['parking'] ?>
                        </p>

                        <p class="lead">
                            ID: <?php echo $houseFinalDetails['id']; ?>
                        </p>
                    </div>

                    <div class="tab-pane fade" id="details-<?php echo $houseFinalDetails['id']; ?>" role="tabpanel"
                        aria-labelledby="details-tab-<?php echo $houseFinalDetails['id']; ?>">
                        <p class="lead">
                            <span class="d-block">Details:</span>

                        <p class="font-weight-bolder text-info"><?php echo $houseFinalDetails['details']; ?></p>
                        </p>

                        <div>
                            <label for="Location">Location:</label>
                            <p class="lead font-weight-bolder text-dark">
                                Location: <?php echo $houseFinalDetails['location'] ?>
                            </p>
                        </div>


                    </div>

                    <div class="tab-pane fade" id="contact-<?php echo $houseFinalDetails['id']; ?>" role="tabpanel"
                        aria-labelledby="contact-tab">
                        <?php 
                            $vendorID = $houseFinalDetails['vendor_id'];
                            $getVendorDetails = "SELECT * FROM vendors WHERE id = '$vendorID'";
                            $rawData = $conn->query($getVendorDetails);
                            $phoneNumber = $rawData->fetch_assoc();
                        ?>

                        <p class="lead font-weight-bolder">
                            Phone Number: <?php echo $phoneNumber['phone']; ?>
                        </p>

                        <p class="lead font-weight-bolder">
                            Name: <?php echo $phoneNumber['first_name']; ?>

                        </p>

                        <p class="lead font-weight-bolder">
                            Email: <?php echo $phoneNumber['email']; ?>
                        </p>

                        <p class="lead font-weight-bolder">
                            Address: <?php echo $phoneNumber['address']; ?>
                        </p>
                    </div>

                    <!-- Images -->
                    <div class="tab-pane fade" id="img-<?php echo $houseFinalDetails['id']; ?>" role="tabpanel"
                        aria-labelledby="img-tab-<?php echo $houseFinalDetails['id']; ?>">
                        <div class="container">
                            <div class="row my-2">
                                <div class="col-md-4">
                                    <a data-fancybox="gallery-<?php echo $propertyImages['id']; ?>"
                                        data-caption="<?php echo $houseFinalDetails['details']; ?>"
                                        href="../uploads/property-uploads/hall/<?php echo $propertyImages['hall']; ?>">
                                        <img class="img-fluid"
                                            src="../uploads/property-uploads/hall/<?php echo $propertyImages['hall']; ?>"
                                            alt="Hall">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a data-fancybox="gallery-<?php echo $propertyImages['id']; ?>"
                                        data-caption="<?php echo $houseFinalDetails['details']; ?>"
                                        href="../uploads/property-uploads/kitchen/<?php echo $propertyImages['kitchen']; ?>">
                                        <img class="img-fluid"
                                            src="../uploads/property-uploads/kitchen/<?php echo $propertyImages['kitchen']; ?>"
                                            alt="Kitchen">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a data-fancybox="gallery-<?php echo $propertyImages['id']; ?>"
                                        data-caption="<?php echo $houseFinalDetails['details']; ?>"
                                        href="../uploads/property-uploads/bedroom/<?php echo $propertyImages['bedroom']; ?>">
                                        <img class="img-fluid"
                                            src="../uploads/property-uploads/bedroom/<?php echo $propertyImages['bedroom']; ?>"
                                            alt="Bedroom">
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <a data-fancybox="gallery-<?php echo $propertyImages['id']; ?>"
                                        data-caption="<?php echo $houseFinalDetails['details']; ?>"
                                        href="../uploads/property-uploads/bathroom/<?php echo $propertyImages['bathroom']; ?>">
                                        <img class="img-fluid"
                                            src="../uploads/property-uploads/bathroom/<?php echo $propertyImages['bathroom']; ?>"
                                            alt="Bathroom">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a data-fancybox="gallery-<?php echo $propertyImages['id']; ?>"
                                        data-caption="<?php echo $houseFinalDetails['details']; ?>"
                                        href="../uploads/property-uploads/house/<?php echo $propertyImages['house']; ?>">
                                        <img class="img-fluid"
                                            src="../uploads/property-uploads/house/<?php echo $propertyImages['house']; ?>"
                                            alt="House">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a data-caption="<?php echo $houseFinalDetails['details']; ?>"
                                        data-fancybox="gallery-<?php echo $propertyImages['id']; ?>"
                                        href="../uploads/property-uploads/property/<?php echo $propertyImages['property']; ?>">
                                        <img class="img-fluid"
                                            src="../uploads/property-uploads/property/<?php echo $propertyImages['property']; ?>"
                                            alt="Property">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="verify-house.php?property-id=<?php echo $propertyID; ?>&house-verified=1"
                        class="btn btn-primary my-5">Verified</a>
                </div>
            </div>
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