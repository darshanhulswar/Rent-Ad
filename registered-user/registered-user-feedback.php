<?php
    include '../inc/dbconnection.inc.php';

    session_start();
   
    if(!isset($_SESSION['user']['id'])) {
        header('location: index.php?vendor-must-logged-in');
    }

    if(isset($_GET['user-logout-status'])) {
        if(isset($_SESSION['user']['id'])) {
            unset($_SESSION['user']);
            header('location: ./../signin.php?user-logout-status=1');
        } else {
            header('location: ./../signin.php?direct-access-permission-denied-status=1');
        }
    }

    if(isset($_POST['submit'])) {
        if(isset($_SESSION['user']['id'])) {
            $userID = $_POST['id'];
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $userPhone = $_POST['phone'];
            $Description = $_POST['description'];

            $saveFeedbackQuery = "INSERT INTO `user_feedback`(`user_id`, `user_name`, `user_email`, `phone`, `feedback_date`, `desrciption`) VALUES ('$userID', '$userName', '$userEmail', '$userPhone', CURDATE(), '$Description')";

            if($conn->query($saveFeedbackQuery)) {
                $_SESSION['user']['feedback-saved-status'] = 1;
            header('location: registered-user-feedback-submission-success.php?user-feedback-submit-success-status=1');

            }
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
    <title>Rent-Ad | User Feedback Section</title>

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
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
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
                    <li class="nav-item active"><a href="<?php echo $_SERVER['PHP_SELF']; ?>"
                            class="nav-link">Feedback</a></li>
                </ul>

                <!-- SignIn and SignOut Links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="signin.php" class="nav-link">
                            <?php echo $_SESSION['user']['firstname']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php $_SERVER['PHP_SELF']; ?>?user-logout-status=1" class="nav-link">
                            <i class="fa fa-sign-out"></i>
                            Sign Out</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Navbar end -->



    <section class="my-5">
        <div class="container">
            <h1 class="display-4 text-center text-secondary">We always here from you to improve our services. <i
                    class="fa fa-smile"></i></h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                class="form w-50 mx-auto border p-5 bg-light">

                <div class="form-row">
                    <!-- Vendor ID -->
                    <div class="form-group col">
                        <input class="form-control font-weight-bolder text-info" type="text" name="id" id="id"
                            value="<?php echo $_SESSION['user']['id'] ?>" readonly>
                        <small class="text-dark font-weight-bolder">User ID</small>
                    </div>

                    <!-- Vendor Name -->
                    <div class="form-group col">
                        <input class="form-control font-weight-bolder text-info" type="text" name="name" id="name"
                            value="<?php echo $_SESSION['user']['firstname'] ?>" readonly>
                        <small class="text-dark font-weight-bolder">Name</small>
                    </div>
                </div>

                <!-- UI Section -->

                <div class="form-row">
                    <!-- Vendor Email -->
                    <div class="form-group col">
                        <input class="form-control font-weight-bolder text-info" type="text" name="email" id="email"
                            value="<?php echo $_SESSION['user']['email'] ?>" readonly>
                        <small class="text-dark font-weight-bolder">Email</small>

                    </div>

                    <!-- Vendor Phone -->
                    <div class="form-group col">
                        <input class="form-control font-weight-bolder text-info" type="text" name="phone" id="phone"
                            value="<?php echo $_SESSION['user']['contactno'] ?>" readonly>
                        <small class="text-dark font-weight-bolder">Phone</small>

                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bolder" for="feedback"><i class="fa fa-envelope text-success"></i>
                        Feedback
                        Description</label>
                    <textarea class="form-control font-weight-bolder text-info" name="description" id="description"
                        cols="30" rows="10" placeholder="Type in your feedback..."></textarea>
                </div>

                <div class="text-center">
                    <input name="submit" type="submit" value="Send Feedback" class="btn btn-success">
                </div>
            </form>
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