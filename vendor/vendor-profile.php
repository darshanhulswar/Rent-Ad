<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    if(!isset($_SESSION['vendor']['id'])) {
        header('location: index.php?direct-access-permission-denied-status=1');
    } else {

    }


    if(isset($_GET['delete-vendor-account-status']) && isset($_GET['vendor-account-id'])) {
        if(isset($_SESSION['vendor']['id'])) {
            $vendorID = $_SESSION['vendor']['id'];
            $deleteVendorAccountQuery = "DELETE FROM `vendors` WHERE id = '$vendorID'";

            if($conn->query($deleteVendorAccountQuery)) {
                unset($_SESSION['vendor']);
                header('location: ../index.php?vendor-account-delete-success-status=1');
            }
        } else {
            header('location: index.php?direct-access-permission-denied-status=1');
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
    <title>Rent-Ad | Vendor Profile</title>

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
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <ul class="navbar-nav mx-auto">
                    <h2 class="h1 nav-item text-secondary">Vendor Profile</h2>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->


    <!-- vendor profile section -->
    <section id="user-profile" class="mt-5">
        <div class="container rounded-lg">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="card my-5 p-5">
                        <div class="profile-col mt-4 container">

                            <!-- Profile Name and Email -->
                            <div class="profile-head" class="">
                                <h6 class="mb-0 text-center text-whdarkite">
                                    <?php echo $_SESSION['vendor']['first_name']; ?>
                                </h6>
                                <p class="text-dark text-center">
                                    <?php echo $_SESSION['vendor']['email']; ?>
                                </p>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-left text-dark mb-2 border-bottom border-primary border-2">
                                        <div class="text-center">
                                            <a class="text-info text-decoration-none font-weight-bolder"
                                                href="#account-privacy">Account and
                                                Privacy</a>
                                        </div>
                                    </div>

                                    <!-- Delete Account -->
                                    <div class="col-12 text-left text-dark mb-2 border-bottom border-primary">
                                        <div class="text-center">
                                            <a class="text-danger text-decoration-none font-weight-bolder"
                                                href="#delete-user-account">Delete My
                                                Account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati ad ut id possimus unde
                nesciunt officia hic asperiores tempora! Tempora fugit, nostrum fuga quisquam minus in voluptatibus
                necessitatibus dolore sit?</p>
        </div>
    </section>

    <!-- Account and Privacy -->
    <section id="account-privacy">
        <div class="container">
            <h1 class="h1 text-center mb-2">Account and Privacy</h1>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group form-inline">
                    <label for="vendor-id">Vendor ID</label>
                    <input type="text" name="vendor-id" id="vendor-id" class="form-control font-weight-bolder text-info"
                        readonly value="<?php echo $_SESSION['vendor']['id']; ?>">
                </div>
            </form>
        </div>
    </section>


    <!-- Delete User Account -->
    <section id="delete-user-account">
        <div class="container">
            <h1 class="h1 text-center text-danger"><i class="fa fa-danger"></i> Delete Account</h1>

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Warning Delete Account !!</h4>
                <p>Aww Really? All the information and Uploaded properties will be deleted permanently Do you really
                    want to continue?</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>

            <div class="alert alert-danger my-3" role="alert">
                By clicking the next link you will agree to delete your vendor account permanently.<a
                    href="<?php echo $_SERVER['PHP_SELF'] ?>?delete-vendor-account-status=1&vendor-account-id=<?php echo $_SESSION['vendor']['id']; ?>"
                    class="alert-link"> Confirm Delete
                </a>. Give it a click
                if you
                like.
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