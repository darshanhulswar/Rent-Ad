<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location: ../signin.php?vendor-must-logged-in');
    }

    if(isset($_GET['user-logout-status'])) {
        if(isset($_SESSION['user']['id'])) {
            unset($_SESSION['user']);
            header('location: ../signin.php?user-logout-status=1');
        } else {
            header('location: ./../signin.php?direct-access-permission-denied-status=10');
        }
    }

   

    if(isset($_SESSION['user'])) {
        // $getRandomPropertyQuery = "SELECT * FROM properties ORDER BY RAND() LIMIT 6";
        $getRandomPropertyQuery = "SELECT * FROM properties INNER JOIN images ON properties.is_verified > 0 AND properties.id = images.property_id";
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
            <a href="index.php" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <span class="nav-link">
                            <?php echo $_SESSION['user']['firstname']; ?>
                        </span>
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

    <section id="bg-motion">

        <!-- Hero Motion -->
        <video autoplay muted loop id="hero-motion-video">
            <source src="../assets/hero-motions/Hero-Motion.mp4" type="video/mp4">
        </video>

        <div id="hero-content">
            <div class="container">
                <h3 class="h1 text-light">Welcome Back</h3>
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



    <!-- Footer -->
    <footer class="bg-dark p-2 fixed-bottom">
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
</body>

</html>