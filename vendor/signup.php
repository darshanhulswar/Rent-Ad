<?php
    include '../inc/dbconnection.inc.php';

    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Vendor SignUp</title>

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
                </ul>

                <!-- SignIn and SignOut Links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="signin.php" class="nav-link">
                            jj
                        </a>
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

    <!-- signup form -->
    <div class="container">
        <div class="card pb-2 bg-light">
            <h4 class="card-header display-4 text-center bg-light m-3 card-head"><strong>Register Now</strong></h4>
            <div class="card-body">
                <div class="container">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" method="POST">
                        <div class="row">
                            <div class="col-md-6 my-3">
                                <div class="p-3">
                                    <!-- Firstname -->
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="John"
                                            required>
                                    </div>

                                    <!-- Lastname -->
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Doe"
                                            required>
                                    </div>

                                    <!-- DOB -->
                                    <div class="form-group">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" name="dob" placeholder="yyyy-mm-dd"
                                            required>
                                    </div>

                                    <!-- Age -->
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" name="age" placeholder="Age" required>
                                    </div>

                                    <!-- Gender -->
                                    <div class="form-group">
                                        <label class="d-block">Gender</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="male"
                                                checked>
                                            <label class="form-check-label" for="exampleRadios1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="female">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Female
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 my-3 d-none d-md-block">
                                <div class="container">
                                    <div class="w-100 d-flex flex-column">
                                        <h1 class="h1">Basic Proof Information</h1>

                                        <div class="d-flex flex-column">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="p-3">
                                    <!-- Contact No -->
                                    <div class="form-group">
                                        <label for="contactno">Contact No</label>
                                        <input type="text" class="form-control" name="contactno"
                                            placeholder="1234 525 265" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="johndoe@gmail.com" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="p-3">
                                    <!-- Address -->
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing" required>
                                    </div>

                                    <!-- City -->
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" placeholder="lorem"
                                            required>
                                    </div>

                                    <!-- State -->
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" name="state" placeholder="Karnataka"
                                            required>
                                    </div>

                                    <!-- Postal code -->
                                    <div class="form-group">
                                        <label for="postalcode">Postalcode</label>
                                        <input type="text" class="form-control" name="postalcode" placeholder="581-334"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                </div>
                <!-- Password -->
                <div class="form-group w-25 mx-auto">
                    <label for="postalcode">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-danger btn-block w-25 mx-auto" name="signup">SignUp</button>
                </form>
            </div>
        </div>
    </div>
    <!-- signup form section end -->

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