<?php
    session_start();
    include '../inc/dbconnection.inc.php';
    
    // Check Logout status
    if(isset($_GET['logout'])) {
       if(isset($_SESSION['admin'])) {
            if($_GET['logout'] == 1) {
                session_unset();
                session_destroy();
            }
        }
    }
    
    // Check Admin Session Status
    if(isset($_SESSION['admin'])) {
       
        
    } else {
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-Ad | Admin Login Panel</title>

    <!-- Favicon and Stylesheets -->
    <?php include 'inc/links.inc.php'; ?>
</head>

<body>

    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-md navbar-light bg-light sticky-top pt-1 pb-0 border border-bottom border-light shadow">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item h1 text-dark">
                        <i class="fa fa-cog mr-3 fa-spin"></i>Admin CPanel
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item h1 text-secondary">
                        <span class="nav-link">
                            <i class="fa fa-settings"></i>
                            <?php echo $_SESSION['admin']['email']; ?>
                        </span>
                    </li>
                    <li class="nav-item h1 text-dark">
                        <a href="dashboard.php?logout=1" class="nav-link">
                            <i class="fa fa-sign-out"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>