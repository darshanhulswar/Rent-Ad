<?php
    include '../inc/dbconnection.inc.php';

    session_start();
    // To prevent direct access of upload property-images file
    $_SESSION['property']['upload']['textual-format'] = 0;


    if(!isset($_SESSION['vendor']['id'])) {
        header('location: index.php?vendor-must-logged-in');
    }

    if(isset($_GET['vendor-logout-status'])) {
        if(isset($_SESSION['vendor']['id'])) {
            unset($_SESSION['vendor']);
            header('location: ./../signin.php?user-logout-status=1');
        } else {
            header('location: ./../signin.php?direct-access-permission-denied-status=1');
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
    <title>Rent-Ad | Vendor Home</title>

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

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="properties.php" class="nav-link">Properties</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
                </ul>

                <!-- SignIn and SignOut Links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="signin.php" class="nav-link">
                            <?php echo $_SESSION['vendor']['first_name']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php $_SERVER['PHP_SELF']; ?>?vendor-logout-status=1" class="nav-link">
                            <i class="fa fa-sign-out"></i>
                            Sign Out</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!--  Carousel      -->
    <section id="showcase">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="9000">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-image-1 active">
                    <div class="container">
                        <div
                            class="carousel-caption d-none d-sm-block text-right text-secondary mb-5 bg-trans p-5 rounded">
                            <h1 class="display-3 animated zoomIn slow text-light">Best Rent Property Selling</h1>
                            <p class="lead animated zoomIn delay-2s text-light">Rent-House Adviser offers a one-stop
                                destination
                                for all Property needs</p>
                            <a href="#" class="btn btn-danger btn-lg animated zoomIn delay-3s">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item carousel-image-2">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block text-secondary mb-5 bg-trans p-5 rounded">
                            <h1 class="display-3 animated zoomIn slow text-light">Get out and stretch your imagination
                            </h1>
                            <p class="lead animated zoomIn delay-2s text-light">Plan a different kind of getaway to
                                uncover the
                                hidden gems near you.
                            </p>
                            <a href="#" class="btn btn-primary btn-lg animated zoomIn delay-3s">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item carousel-image-3">
                    <div class="container">
                        <div
                            class="carousel-caption d-none d-sm-block text-left text-secondary mb-5 bg-trans p-5 rounded">
                            <h1 class="display-3 animated zoomIn slow text-light">Let’s find a home that’s perfect for
                                you.℠
                            </h1>
                            <p class="lead animated zoomIn delay-2s text-light">Search confidently with your trusted
                                source of homes for sale or rent
                            </p>
                            <a href="#" class="btn btn-success btn-lg animated zoomIn delay-3s">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon"></span>
            </a>

            <a href="#myCarousel" data-slide="next" class="carousel-control-next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <!--  Carousel End  -->

    <!-- Menu Section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="upload-property.php" class="text-decoration-none">
                        <div class="card p-4">
                            <h4 class="h4 text-center">Post a Property</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="view-uploaded-properties.php?vendor-id=<?php echo $_SESSION['vendor']['id']; ?>"
                        class="text-decoration-none">
                        <div class="card p-4">
                            <h4 class="h4 text-center">View Properties</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="card p-4">
                        <a href="vendor-profile.php" class="text-decoration-none">
                            <h4 class="h4 text-center">Profile</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="text-secondary">
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
    <?php include 'inc/scripts.inc.php' ?>
</body>

</html>