<?php
    include '../inc/dbconnection.inc.php';
    session_start();
   
    if(isset($_POST['upload'])) {
        var_dump($_FILES);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Rent-Ad | Vendor Upload Property Details</title>

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

    <!-- Upload Property Images Section -->
    <section>
        <div class="container">
            <form class="form p-5 my-5 w-50 shadow rounded-lg mx-auto" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                method="POST" enctype="multipart/form-data">
                <h2 class="display-4">Upload Property</h2>
                <div class="form-row">
                    <div class="form-group col">
                        <!-- hall -->
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="hall">
                            <label for="" class="custom-file-label">Hall</label>
                        </div>
                    </div>

                    <!-- Kitchen -->
                    <div class="form-group col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="kitchen">
                            <label for="" class="custom-file-label">Kitchen</label>
                        </div>
                    </div>
                </div>

                <!-- Bathroom -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="bedroom">
                        <label for="" class="custom-file-label">Bedroom</label>
                    </div>
                </div>

                <!-- Bathroom -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="bathroom">
                        <label for="" class="custom-file-label">Bathroom</label>
                    </div>
                </div>

                <!-- Property -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="property">
                        <label for="" class="custom-file-label">Property</label>
                    </div>
                </div>

                <!-- House -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="house">
                        <label for="" class="custom-file-label">House</label>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-outline-danger" type="submit" name="upload">Upload</button>

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