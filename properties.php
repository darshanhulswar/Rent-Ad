<?php include 'inc/dbconnection.inc.php'; ?>

<?php   $properties = "SELECT * FROM properties WHERE is_verified > 0 ORDER BY time DESC LIMIT 3"; ?>
<?php   $data = $conn->query($properties);
        $finalHouseDetails = [];
        foreach($data as $house) {
        $finalHouseDetails[] = $house; 

        }

        // var_dump($finalHouseDetails);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Required meta-tags  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>Rent-Ad | Properties | Buy Rent House at your Affordable Rent Price</title>

    <!-- Link Tags -->
    <?php include 'inc/links.inc.php'; ?>
</head>

<body>

    <!--  Preloader     -->
    <div id="preloader">
        <div id="status">
            <div class="sr spinner-border">&nbsp;</div>
        </div>
    </div>
    <!--  Preloader-End -->

    <!--  Navbar        -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a href="index.php" class="navbar-brand text-center">
                <img src="assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item active"><a href="properties.php" class="nav-link">Properties</a></li>
                    <li class="nav-item"><a href="vendor/index.php" class="nav-link">Vendor</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="signin.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="signup.php" class="nav-link">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--  Navbar End    -->

    <section id="properties" class="my-4">
        <div class="container">
            <!-- property details in textual format -->
            <section class="my-5">
                <div class="container">
                    <h1 class="display-4 text-center text-secondary text-danger">As a unregistered you won't get much
                        benefit of our
                        service</h1>
                    <h1 class="h1 text-center text-muted">Signup withus and get more out of our services</h1>
                    <h1 class="h2 text-center text-info">Just to go through properties, we listed some of them</h1>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Property Name</th>
                                    <th>Location</th>
                                    <th>Bedrooms</th>
                                    <th>Parking Lots</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; foreach($finalHouseDetails as $house): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $house['name'] ?></td>
                                    <td><?php echo $house['location'] ?></td>
                                    <td><?php echo $house['bed'] ?></td>
                                    <td><?php echo $house['parking'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
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