<?php
    session_start();
    include '../inc/dbconnection.inc.php';

    if(isset($_GET['property-id'])) {
        $propID = $_GET['property-id'];
        $refuteQuery = "UPDATE properties SET is_verified = 0 WHERE id = '$propID'";
        if($conn->query($refuteQuery)) {
            header('location: house-refuse-successfull.php');
        }
    }

    if(isset($_SESSION['employee']['id'])) {
        if(isset($_GET['property-id'])) {
            $propID = $_GET['property-id'];
            $queryHouse = "SELECT * FROM properties WHERE id = '$propID'";
            $rawResult = $conn->query($queryHouse);
            $finishedResult = $rawResult->fetch_assoc();
            var_dump($finishedResult);
        }
       
    } else {
        header('location: index.php?employee-must-be-logged-in');
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Employee Refute House</title>

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
            <a class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <ul class="navbar-nav mx-auto">
                    <h2 class="h1 nav-item text-secondary">Refute House</h2>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <section>
        <div class="container">
            <div class="card">
                <ul class="nav nav-tabs pt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php echo $finishedResult['name']; ?>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <?php echo $finishedResult['details']; ?>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <?php echo $finishedResult['vendor_id']; ?>
                    </div>
                </div>

                <div class="text-center">
                    <a href="unverify-house.php?property-id=<?php echo $finishedResult['id'] ?>"
                        class="btn btn-danger">Refute</a>
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