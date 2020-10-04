<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location: ../signin.php?user-must-logged-in');
    }

    if(isset($_GET['user-logout-status'])) {
        if(isset($_SESSION['user']['id'])) {
            unset($_SESSION['user']);
            header('location: ../signin.php?user-logout-status=1');
        } else {
            header('location: ./../signin.php?direct-access-permission-denied-status=10');
        }
    }

    if(isset($_SESSION['user']['id'])) {
        $getRandomPropertyQuery = "SELECT properties.id, properties.name, properties.details, properties.location, properties.bed, properties.parking, properties.rpm, properties.vendor_id, images.house FROM properties INNER JOIN images ON  properties.is_verified > 0 AND properties.id = images.property_id ORDER BY RAND() LIMIT 6";

        $rawData = $conn->query($getRandomPropertyQuery);
        $finalData = [];
        foreach($rawData as $property) {
            $finalData[] = $property;
        }

        // Count Registered User
        $contUsersQuery = "SELECT COUNT(*) FROM users";
        $countUsers = $conn->query($contUsersQuery); 

        // Count Total Vendors
        $countVendorsQuery = "SELECT COUNT(*) FROM vendors";
        $countVendors = $conn->query($countVendorsQuery);

        $countPropertyQuery = "SELECT COUNT(*) FROM properties";
        $countOfProperties = $conn->query($countPropertyQuery);
        $toalProperties = $countOfProperties->fetch_assoc();

        $countOfUsers = $countUsers->fetch_assoc();
        $countOfVendors = $countVendors->fetch_assoc();
        
        $totalUsers = $countOfUsers['COUNT(*)'] + $countOfVendors['COUNT(*)'];
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Registered User Home Page</title>

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
    <nav class="navbar navbar-expand-md bg-light navbar-light p-0">
        <div class="container">
            <a href="<?php echo $_SERVER['PHP_SELF'];  ?>" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item active">
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="nav-link">Home</a>

                    </li>

                    <li class="nav-item">
                        <span class="nav-link">
                            <?php echo $_SESSION['user']['firstname']; ?>
                        </span>
                    </li>

                    <!-- Feedback -->
                    <li class="nav-item">
                        <a href="registered-user-feedback.php" class="nav-link">Feedback</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?user-logout-status=1" class="nav-link">
                            <i class="fa fa-user-times-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Hero Motion -->
    <section id="bg-motion">

        <!-- Hero Motion -->
        <video autoplay="true" muted loop id="hero-motion-video">
            <source src="../assets/hero-motions/Hero-Motion.mp4" type="video/mp4">
        </video>

        <div id="hero-content">
            <div class="container">
                <h3 class="display-2 text-light">Welcome Back</h3>
                <h1 class="h1 text-light font-weight-bolder"><?php echo $_SESSION['user']['firstname']; ?> <i
                        class="fa fa-check bg-primary rounded-circle p-2"></i></h1>

                <p class="lead text-light">
                    With in few clicks aim direct your house
                </p>

                <div class="text-left">
                    <a href="explore.php" class="btn btn-success btn-lg">
                        <i class="fa fa-building"></i>
                        Explore All The Way</a>
                </div>

            </div>
        </div>
    </section>

    <!-- Popular properties section -->
    <section class="my-5">
        <div class="container">
            <div class="display-1 text-center font-weight-thinner">Popular Properties</div>
            <div class="row">
                <?php foreach($finalData as $singleProperty): ?>
                <div class="col-md-4">
                    <div class="card animated zoomIn delay-1s wow" data-wow-duration="1">
                        <h6 class="card-header text-success text-center">
                            <?php echo $singleProperty['name']; ?>
                        </h6>

                        <a href="../uploads/property-uploads/house/<?php echo $singleProperty['house']; ?>"
                            data-fancybox data-caption="<?php echo $singleProperty['details'] ?>">
                            <img src="../uploads/property-uploads/house/<?php echo $singleProperty['house']; ?>" alt=""
                                class="card-img-top img-fluid">
                        </a>

                        <div class="card-body">
                            <!-- Name Location -->
                            <h6 class="card-title font-weight-bolder text-dark">
                                <?php echo $singleProperty['name'];  ?>
                            </h6>

                            <h6 class="card-subtitle text-muted">
                                <i
                                    class="fa fa-map-marker mr-1 text-danger"></i><?php echo $singleProperty['location']; ?>
                            </h6>

                            <div class="card-text overflow-auto mt-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-success">
                                                <i class="fa fa-bed"></i>
                                                <?php echo $singleProperty['bed']; ?>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button data-toggle="popover"
                                                data-content="<?php echo  "Property has " . $singleProperty['parking'] . "parking lots." ?>"
                                                class="btn btn-success" title="Parking Lot Information">
                                                <i class="fa fa-car"></i>
                                                <?php echo $singleProperty['parking']; ?>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-success" title="vendor id">
                                                <i class="fa fa-key"></i>
                                                <?php echo $singleProperty['vendor_id']; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="badge badge-pill badge-primary">
                                    <?php echo $singleProperty['rpm'] ?> Rs/-
                                </span>
                            </div>
                            <a data-fancybox data-type="ajax"
                                data-src="popular-property-details.php?property-id=<?php echo $singleProperty['id']; ?>&vendor-id=<?php echo $singleProperty['vendor_id']; ?>"
                                href="property-id=<?php echo $singleProperty['id']; ?>&vendor-id=<?php echo $singleProperty['vendor_id']; ?>"
                                class="btn btn-outline-danger">Check Now</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <p class="text-center lead text-secondary">
                Real Estate Rent Services
            </p>
        </div>
    </section>

    <!-- counter up section -->
    <section class="">
        <div class="container">
            <div class="card w-70 illustration-background shadow-0 py-3">
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="display-4 text-light text-center font-weight-bolder">Users</h1>
                            <h1 class="display-4 text-secondary text-center bg-light rounded-pill w-50 mx-auto">
                                <i class="fa fa-users mr-2"></i><?php echo $totalUsers; ?>
                            </h1>
                        </div>
                        <div class="col-md-4">
                            <h1 class="display-4 text-light text-center font-weight-bolder">Houses</h1>
                            <h1 class="display-4 text-secondary text-center bg-light rounded-pill w-50 mx-auto">
                                <i class="fa fa-home mr-2"></i><?php echo $toalProperties['COUNT(*)'] ?>
                            </h1>
                        </div>
                        <div class="col-md-4">
                            <h1 class="display-4 text-light text-center font-weight-bolder">Branches</h1>
                            <h1 class="display-4 text-secondary text-center bg-light rounded-pill w-50 mx-auto"><i
                                    class="fa fa-building-o mr-2"></i>1</h1>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="../dependencies/js/popper.js"></script>
    <?php include 'inc/scripts.inc.php' ?>
</body>

</html>