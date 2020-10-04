<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    if(!isset($_SESSION['vendor']['id'])) {
        header('location: index.php?direct-access-permission-denied-status=1');
    } else {

    }

    if(isset($_GET['user-logout-status'])) {
        if(isset($_SESSION['vendor']['id'])) {
            unset($_SESSION['vendor']);
            header('location: index.php?user-logout-status=1');
        } else {
            header('location: index.php?direct-access-permission-denied-status=10');
        }
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

                    <li class="nav-item">
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?user-logout-status=1" class="nav-link">
                            <i class="fa fa-user-times-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->


    <!-- vendor profile section -->
    <section id="user-profile" class="mt-5">
        <div class="container rounded-lg">

            <h2 class="h1 text-center text-secondary">Vendor Profile</h2>

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
                                            <a class="d-block text-danger text-decoration-none font-weight-bolder"
                                                href="#delete-user-account">Delete My
                                                Account</a>

                                            <small class="text-muted">You'll be scrolled to down page</small>
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
            <p class="lead text-secondary">This Agreement governs the provision of Services by Rent-Ad Pvt Ltd to you.
                The terms “you”
                and “your” refer to the person that obtains, uses or otherwise
                accesses the Services</p>

            <p class="lead text-secondary font-weight-bolder">

                Disclaimer: Rent-Ad Realty Services Limited is only an intermediary offering its platform to
                advertise properties of Seller for a Customer/Buyer/User coming on its Website and is not and cannot be
                a party to or privy to or control in any manner any transactions between the Seller and the
                Customer/Buyer/User. All the offers and discounts on this Website have been extended by various
                Builder(s)/Developer(s) who have advertised their products. Magicbricks is only communicating the offers
                and not selling or rendering any of those products or services. It neither warrants nor is it making any
                representations with respect to offer(s) made on the site. Magicbricks Realty Services Limited shall
                neither be responsible nor liable to mediate or resolve any disputes or disagreements between the
                Customer/Buyer/User and the Seller and both Seller and Customer/Buyer/User shall settle all such
                disputes without involving Magicbricks Realty Services Limited in any manner.
            </p>
        </div>
    </section>

    <!-- Account and Privacy -->
    <section id="account-privacy" class="my-5">
        <div class="container">
            <h1 class="h1 text-center mb-2">Account and Privacy</h1>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="w-50 mx-auto shadow p-3">
                <h1 class="h1 text-center">Vendor Profile</h1>
                <div class="form-row">
                    <div class="form-group col">
                        <input type="text" name="vendor-id" id="vendor-id"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['id']; ?>">
                        <small class="form-text">Vendor ID</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-name" id="vendor-name"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['first_name']; ?>">
                        <small class="form-text">Vendor Name</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-name" id="vendor-name"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['last_name']; ?>">
                        <small class="form-text">Last Name</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <input type="text" name="vendor-email" id="vendor-email"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['email']; ?>">
                        <small class="form-text">Vendor email</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-dob" id="vendor-dob"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['dob']; ?>">
                        <small class="form-text">Vendor dob In (YYYY/MM/DD)</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-age" id="vendor-age"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['age']; ?>">
                        <small class="form-text">Last age</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <input type="text" name="vendor-gender" id="vendor-gender"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['gender']; ?>">
                        <small class="form-text">Vendor gender</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-phone" id="vendor-phone"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['phone']; ?>">
                        <small class="form-text">Vendor Phone</small>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col">
                        <input type="text" name="vendor-address" id="vendor-address"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['address']; ?>">
                        <small class="form-text">Vendor address</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-postalcode" id="vendor-postalcode"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['postal_code']; ?>">
                        <small class="form-text">Vendor postalcode</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-state" id="vendor-state"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['state']; ?>">
                        <small class="form-text">Vendor state</small>
                    </div>

                    <div class="form-group col">
                        <input type="text" name="vendor-city" id="vendor-city"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['city']; ?>">
                        <small class="form-text">Vendor city</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <input type="text" name="vendor-aadhar" id="vendor-aadhar"
                            class="form-control font-weight-bolder text-info" readonly
                            value="<?php echo $_SESSION['vendor']['aadhar']; ?>">
                        <small class="form-text">Vendor aadhar</small>
                    </div>

                </div>

            </form>
        </div>
    </section>


    <!-- Delete User Account -->
    <section id="delete-user-account" class="border border-rop my-5">
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
                </a>. Be Sure before confirm delete.
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