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

    <!-- counter up section -->
    <section class="">
        <div class="container border-bottom border-dark">
            <h1 class="text-center mt-4 text-secondary font-weight-bolder">User and House Stats</h1>
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="house-controller.php" class="text-decoration-none">
                        <div class="card p-5 bg-houses">
                            <h1 class="text-center">
                                <i class="fa fa-home d-block"></i> House
                            </h1>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="user-controller.php" class="text-decoration-none">
                        <div class="card p-5">
                            <h1 class="text-center bg-users">
                                <i class="fa fa-users d-block"></i> Users
                            </h1>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="vendor-controller.php" class="text-decoration-none">
                        <div class="card p-5 bg-vendors">
                            <h1 class="text-center">
                                <i class="fa fa-user d-block"></i> Vendors
                            </h1>
                        </div>
                    </a>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-4">
                    <div class="card p-5 bg-feedbacks">
                        <a href="feedback-controller.php" class="h1 text-center text-decoration-none">
                            <i class="fa fa-comments-o d-block"></i> Feedback
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>