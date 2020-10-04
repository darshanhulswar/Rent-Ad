<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    $invalidCredentialsStatus = 0;
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM vendors WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
    
        if($result->num_rows === 1) {
            $data = $result->fetch_assoc();

            if($email === $data['email'] && $password === $data['password']) {
                $_SESSION['vendor']['id'] = $data['id'];
                $_SESSION['vendor']['first_name'] = $data['first_name'];
                $_SESSION['vendor']['last_name'] = $data['last_name'];
                $_SESSION['vendor']['email'] = $data['email'];
                $_SESSION['vendor']['dob'] = $data['dob'];
                $_SESSION['vendor']['age'] = $data['age'];
                $_SESSION['vendor']['gender'] = $data['gender'];
                $_SESSION['vendor']['phone'] = $data['phone'];
                $_SESSION['vendor']['address'] = $data['address'];
                $_SESSION['vendor']['state'] = $data['state'];
                $_SESSION['vendor']['city'] = $data['city'];
                $_SESSION['vendor']['postal_code'] = $data['postal_code'];
                $_SESSION['vendor']['aadhar'] = $data['aadhar'];
                $_SESSION['vendor']['password'] = $data['password'];
                header('location: vendor-home.php');
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
    <title>Rent-Ad | Vendor Login</title>

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
    <nav class="navbar navbar-expand-md navbar-light bg-light">
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
                    <h2 class="h1 nav-item text-secondary">Vendor Login</h2>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Vendor Login Section -->
    <section>
        <div class="container p-5">
            <div class="card w-50 p-5 mx-auto">

                <!-- <h1 class="display-4 text-secondary text-center">You are the Gem of our Business</h1>
                <p class="lead text-center text-secondary"><span class="font-weight-bolder">Peace</span> of Our Users
                </p> -->

                <!-- Logo -->
                <div class="d-flex justify-content-center mb-3">
                    <img src="../assets/icons/favicon.png" alt="Rent-Ad">
                </div>

                <!-- Short Highlight -->
                <p class="text-center text-muted">If you have authorised <span class="text-danger">User Email</span>
                    and <span class="text-danger">Password</span>
                    then only you can get most of our benefits</p>

                <!-- Invalid Credentials Alert -->
                <?php if($invalidCredentialsStatus === 1): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Invalid Email ID or Password</strong> Please enter the valid Email and Password

                    <button type="button" data-dismiss="alert" aler-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" class="form">

                    <!-- User Email -->
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" id="email" placeholder="email"
                            minlength="10" maxlength="50" autofocus="on" autocomplete="off" required>
                        <small class="form-text text-muted">Email ID</small>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password"
                            minlength="4" maxlength="20" required>
                    </div>

                    <!-- Login Button -->
                    <div class="text-center">
                        <button class="btn btn-outline-success" type="submit" name="login">
                            Login
                        </button>
                    </div>

                    <p class="text-center text-secondary mt-3"></p>
                </form>

                <p class="text-center text-secondary">Not Yet Registered as a vendor? <a href="signup.php"
                        class="text-decoration-none font-weight-bolder">Signup Here!</a></p>
                <p class="text-center text-muted">If you have verified <span class="text-danger">Email ID</span>
                    and <span class="text-danger">Password</span> then only you can proceed to your account</p>
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