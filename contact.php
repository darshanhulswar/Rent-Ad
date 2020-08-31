<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Required meta-tags  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>Rent-Ad | Contact | Connect With Us And Improve Our Services In Your Location</title>

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
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
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
                    <li class="nav-item"><a href="properties.php" class="nav-link">Properties</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
                    <li class="nav-item active"><a href="contact.php" class="nav-link">Contact Us</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="signin.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="signup.php" class="nav-link">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--  Navbar End    -->

    <!--  Aboutus Header        -->
    <section id="aboutus">
        <div class="darkoverlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card bg-light py-3 my-5">
                            <div class="card-body">
                                <h2 class="display-4 text-right"><span class="span-strong">Contact Us<i
                                            class="fa fa-forward px-5 text-danger"></i></span></h2>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 text-white">
                        <div class="container m-5">
                            <ul class="lead py-3 list-unstyled">
                                <li>Office <span class="span-strong">SDM College,</span> Honnavar</li>
                                <li>Phone <span class="span-strong">+919483376591</span></li>
                                <li>e-mail <span class="span-strong">dhulswar591@gmail.com</span></li>
                                <li>Working Hours <span class="span-strong">Mon-Sat at 9:00 Am - 5:00 Pm</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End        -->

    <section id="subscribe" class="bg-dark my-5">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <div class="container ">
                        <div class="text-center">
                            <p class="lead text-white">Subscribe to our latest <span class="span-strong">property <i
                                        class="fa fa-building px-2"></i></span> updates!</p>
                            <button class="btn btn-lg btn-danger"><i class="fa fa-inbox px-3"></i>Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-4 my-3">
                    <div class="container text-white">
                        <h4>Site Map</h4>
                        <ul class="list-unstyled px-3">
                            <li>Home</li>
                            <li>Property</li>
                            <li>Services</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="container text-white">
                        <h4>Socialmedia Links</h4>
                        <ul class="list-unstyled px-3">
                            <li><i class="fa fa-twitter pr-2 text-info"></i>Twitter</li>
                            <li><i class="fa fa-instagram pr-2 text-danger"></i>Instagram</li>
                            <li><i class="fa fa-facebook pr-2 text-primary"></i>Facebook</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="container text-white">
                        <h4>About Our Team</h4>
                        <ul class="list-unstyled px-3">
                            <li><span class="span-strong">Darshan Hulswar</span>Lead Developer</li>
                            <li><span class="span-strong">Vinayak</span> Team-cordinator</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer text-center">
                        <p class="text-white span-strong">Copyright &copy; All right reserved | Site Desinged and
                            Developed by
                            Darshan Hulswar and Vinayak Ravi with <i class="fa fa-heart text-danger"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php' ?>
</body>

</html>