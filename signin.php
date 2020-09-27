<?php
    include 'inc/dbconnection.inc.php';

    $invalidCredentialsStatus = 0;
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if($result->num_rows === 1) {
            $data = $result->fetch_assoc();

            if($email === $data['email'] && $password === $data['password']) {
                session_start();
                $_SESSION['user']['id'] = $data['id'];
                $_SESSION['user']['firstname'] = $data['firstname'];
                $_SESSION['user']['lastname'] = $data['lastname'];
                $_SESSION['user']['contactno'] = $data['contactno'];
                $_SESSION['user']['email'] = $data['email'];
                $_SESSION['user']['password'] = $data['password'];
                header('location: registered-user/index.php?login-success-status=1');
            } else {
                $invalidCredentialsStatus = 1;
            }
            
        } else {
            $invalidCredentialsStatus = 1;
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
                <div class="col-lg-12">
                    <div class="card w-50 p-5 mx-auto">

                        <div class="d-flex justify-content-center">
                            <img src="assets/icons/favicon.png" alt="Rent-Ad">
                        </div>
                        <h1 class="display-4 text-center border-bottom mb-3">Own Your House</h1>

                        <!-- Invalid Credentials Alert -->
                        <?php if($invalidCredentialsStatus === 1): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span>Invalid</span><strong class="text-danger"> Email </strong>
                            or<strong class="text-danger"> Password </strong> Please enter the
                            valid Username or Password

                            <button type="button" data-dismiss="alert" aler-label="close" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>

                        <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" class="form">

                            <!-- User Email -->
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" id="email" placeholder="email"
                                    minlength="10" maxlength="20" autofocus="on" autocomplete="off" required>
                                <small class="form-text text-muted">Email ID</small>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="Password" minlength="4" maxlength="20" required>
                            </div>

                            <!-- Login Button -->
                            <div class="text-center">
                                <input class="btn btn-outline-success" type="submit" name="login" value="Login">
                            </div>
                        </form>

                        <p class="text-center text-secondary">Not Yet Registered as a vendor? <a href="signup.php"
                                class="text-decoration-none font-weight-bolder">Signup
                                Here!</a></p>
                        <p class="text-center text-muted">If you have verified <span class="text-danger">Email
                                ID</span>
                            and <span class="text-danger">Password</span> then only you can proceed to your
                            account</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signin section end -->

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