<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Signin</title>

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
                <img src="img/icons/favicon.png" alt="">
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
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="signin.php" class="nav-link">Sign in</a></li>
                    <li class="nav-item"><a href="signup.php" class="nav-link">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Signin Section -->
    <section id="signin">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="php/signin.php" class="form p-3 bg-dark signin" method="POST">

                                <h6 class="text-center form-head">Login</h6>
                                <input type="text" name="email" tabindex="1" autofocus="true" required="required"
                                    placeholder="Email">


                                <input type="password" name="password" placeholder="Password" name="password"
                                    tabindex="2" required="required">

                                <input type="submit" name="login" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-block">
                    <div class="container">
                        <div class="carousel slide p-3 " data-ride="carousel">
                            <div class="carousel-inner  carousel-border">
                                <div class="carousel-item  active">
                                    <img src="img/image3.jpeg" alt="" class="img-fluid">
                                </div>

                                <div class="carousel-item">
                                    <img src="img/image2.jpeg" alt="" class="img-fluid">
                                </div>

                                <div class="carousel-item">
                                    <img src="img/image1.jpeg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signin section end -->

    <!--  Footer        -->
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
                        <h4>About Our Team members</h4>
                        <ul class="list-unstyled px-3">
                            <li><span class="span-strong">Darshan Hulswar</span> Team-Manager</li>
                            <li><span class="span-strong">Vinayak</span> Team-cordinator</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer text-center">
                        <p class="text-white span-strong">Copyright &copy; All right reserved | site developed by
                            Darshan Hulswar and XXXXXXX</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--  Footer End    -->

    <!--  JQuery JS     -->
    <script src="js/jquery.js"></script>

    <!--  Bootstrap JS  -->
    <script src="js/bootstrap/js/bootstrap.js"></script>

    <!--  Custom JS     -->
    <script src="js/script.js"></script>
</body>

</html>