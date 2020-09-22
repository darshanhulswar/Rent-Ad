<?php
    include '../inc/dbconnection.inc.php';

    session_start();

    if(!isset($_SESSION['employee']['id'])) {
        header('location: index.php?employee-must-login');
    }
    
    if(isset($_GET['logout-employee'])) {
        if($_GET['logout-employee'] === '1') {
            session_start();
            if(isset($_SESSION['employee']['id'])) {
                session_unset();
                session_destroy();
                header('location: index.php?employee-logout-status=1');
            } else {
                header('location: index.php?error=1');
            }
        }
    }

   

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Employee Dash Board</title>

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
                    <h2 class="h1 nav-item text-secondary">Employee Dash Board</h2>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="dashboard.php?logout-employee=1" class="text-secondary nav-link"><i
                                class="fa fa-user"></i>
                            Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

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