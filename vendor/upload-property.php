<?php
    include '../inc/dbconnection.inc.php';
    session_start();
    
    if(isset($_POST['submit'])) {

        // Get all Posted data from submitted form
        {
            $name = $_POST['name'];
            $location = $_POST['location'];
            $details = $_POST['details'];
            $bed = $_POST['bed'];
            $parking = $_POST['parking'];
            $rpm = $_POST['rpm'];
            $vendorId = $_SESSION['vendor']['id'];
          }

            $saveTextualPropertyDataQuery = "INSERT INTO `properties`(`name`, `location`, `details`, `bed`, `parking`, `rpm`, `vendor_id`) VALUES('$name', '$location', '$details', '$bed', '$parking', '$rpm', '$vendorId')";
            if($conn->query($saveTextualPropertyDataQuery)) {
                $sql = "SELECT * FROM properties WHERE id=LAST_INSERT_ID()";
                $result = $conn->query($sql);
                $data = $result->fetch_assoc();
                $_SESSION['property'] = $data;
                $propertyID = $_SESSION['property']['id'];
                header("location: upload-property-images.php?property-id=" . $propertyID);
            }
    }

    if(isset($_SESSION['vendor']['id'])) {

    } else {
        header('location: index.php?vendor-upload-property-direct-access-permission-not-allowed=1');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Vendor Upload Property Details</title>

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
    <nav class="navbar navbar-expand-md navbar-light bg-light">
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
                    <h2 class="h1 nav-item text-secondary">Vendor Login</h2>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Section to upload Textual Property Details  -->
    <section>
        <div class="conatiner">
            <form method="POST" action="upload-property.php" class="form w-50 my-5 p-5 shadow rouded mx-auto">
                <h2 class="display-4 text-center border-bottom">Post Details</h2>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">House Name</label>
                        <input class="form-control" type="text" autofocus="true" name="name" placeholder="Property Name"
                            autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">House Location</label>
                        <input class="form-control" type="text" name="location" placeholder="Property Location"
                            autocomplete="off" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="">Rent Per Month</label>
                        <input class="form-control" type="number" name="rpm" placeholder="Rent Per Month"
                            autocomplete="off" required>
                    </div>

                    <div class="form-group col">
                        <label for="">Bed</label>
                        <input class="form-control" type="text" name="bed" placeholder="Bedrooms" autocomplete="off"
                            required>
                    </div>

                    <div class="form-group col">
                        <label for="">Parking</label>
                        <input class="form-control" type="text" name="parking" placeholder="Bedrooms" autocomplete="off"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Property Details</label>
                    <textarea name="details" rows="8" cols="80" class="form-control"
                        placeholder="villa is most amazing and more..." autocomplete="off" required></textarea>
                </div>

                <div class="text-center">
                    <input class="btn btn-outline-primary" type="submit" name="submit" value="Post Property">
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark">
        <div class="container">
            <div class="row pt-5 pb-2">
                <div class="col-md-4 my-3">
                    <div class="container text-secondary">
                        <h4>Site Map</h4>
                        <ul class="list-unstyled px-3">
                            <li><a class="text-decoration-none text-secondary" href="index.php">Home</a>
                            </li>
                            <li><a class="text-decoration-none text-secondary" href="properties.php">Property</a></li>
                            <li><a class="text-decoration-none text-secondary" href="services.php">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="container text-secondary">
                        <h4>Socialmedia Links</h4>
                        <ul class="list-unstyled px-3">
                            <li class="text-secondary"><i class="fa fa-twitter pr-2 text-secondary"></i>Twitter</li>
                            <li class="text-secondary"><i class="fa fa-instagram pr-2 text-secondary"></i>Instagram</li>
                            <li class="text-secondary"><i class="fa fa-facebook pr-2 text-secondary"></i>Facebook</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="container text-secondary">
                        <h4>About Our Team</h4>
                        <ul class="list-unstyled px-3">
                            <li><span class="span-strong text-secondary">Darshan Hulswar </span>Lead Developer</li>
                            <li><span class="span-strong text-secondary">Vinayak</span> Team-cordinator</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer text-center">
                        <p class="span-strong text-secondary">Copyright &copy; All rights reserved | Site
                            Desinged and
                            Developed by
                            Darshan Hulswar and Vinayak Ravi with <i class="fa fa-heart text-danger"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->


    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php' ?>
</body>

</html>