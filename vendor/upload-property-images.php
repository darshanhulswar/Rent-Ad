<?php
    include '../inc/dbconnection.inc.php';
    session_start();


    if(isset($_POST['upload'])) {
        if(isset($_SESSION['vendor'])) {
            
            if($_SESSION['property']['id']) {
                
                // Upload Folder Setup
                $dir = "../uploads/property-uploads/";
                $hallFolder = "hall/";
                $kitchenFolder = "kitchen/";
                $bedroomFolder = "bedroom/";
                $bathroomFolder = "bathroom/";
                $propertyFolder = "property/";
                $houseFolder = "house/";
                $propertyImages = [];

                // prefix unique ID to uploaded images
                foreach ($_FILES as $file) {
                    $propertyImages[] = uniqid().$file['name'];
                }

                // Store all images name in a variable for further processing
                $hall = $propertyImages[0];
                $kitchen = $propertyImages[1];
                $bedroom = $propertyImages[2];
                $bathroom = $propertyImages[3];
                $property = $propertyImages[5];
                $house = $propertyImages[4];

                $property_id = $_SESSION['property']['id'];

                // Move Uploaded images to rent-ad/uploads/property-uploads
                move_uploaded_file($_FILES['hall']['tmp_name'], $dir.$hallFolder.$hall);
                move_uploaded_file($_FILES['kitchen']['tmp_name'], $dir.$kitchenFolder.$kitchen);
                move_uploaded_file($_FILES['bedroom']['tmp_name'], $dir.$bedroomFolder.$bedroom);
                move_uploaded_file($_FILES['bathroom']['tmp_name'], $dir.$bathroomFolder.$bathroom);
                move_uploaded_file($_FILES['property']['tmp_name'], $dir.$propertyFolder.$property);
                move_uploaded_file($_FILES['house']['tmp_name'], $dir.$houseFolder.$house);

                $sql = "INSERT INTO images ( `hall`, `kitchen`, `bathroom`, `bedroom`, `house`, `property`, `property_id`) VALUES('$hall', '$kitchen', '$bathroom', '$bedroom', '$house', '$property', '$property_id')";

                // Save the uploaded images names into the database
                if($conn->query($sql)) {
                    echo "image uploaded";
                    unset($_SESSION['property']['upload']['textual-format']);
                    header('location: property-upload-success.php?upload-image-property-success-status=1');
                } else {
                    header('location: image-upload-error.php?property-id=' . $property_id);
                }
            } else {
                header('location: upload-property.php?direct-access-permission-denied-status=1');
            }
            
        } else {
            header('location: index.php?direct-access-permission-denied-status=1');
        }
    }

    // If vendor logged in but directly accessing upload property images page
    if(isset($_SESSION['vendor']) && ($_SESSION['property']['upload']['textual-format'] === 0)) {
            header('location: upload-property.php?stage-one-process-status=0');
    }

    // if vendor is not logged in and textual data not uploaded then handle this
    if(!isset($_SESSION['vendor']) && !isset($_SESSION['property']['upload']['textual-format'])) {
        header('location: index.php?direct-access-permission-denied-status=1');
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
            <a href="vendor-home.php" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <!-- Navbar Heading  -->
                <ul class="navbar-nav mx-auto">
                    <h2 class="h1 nav-item text-secondary">
                        <i class="fa fa-house"></i>
                        Upload Property Images - STEP 2
                    </h2>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Upload Property Images Section -->
    <section>
        <div class="container">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"
                class="form p-5 my-5 w-50 shadow rounded-lg mx-auto">
                <h2 class="display-4">Upload Property</h2>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6">
                        <!-- hall -->
                        <div class="custom-file">
                            <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                class="custom-file-input" name="hall" id="validatedCustomFile-hall" required>
                            <label for="validatedCustomFile-hall" class="custom-file-label">Hall</label>
                            <!-- <div class="invalid-feedback">Please select proper Images</div> -->
                        </div>
                    </div>

                    <!-- Kitchen -->
                    <div class="form-group col-sm-12 col-md-6">
                        <div class="custom-file">
                            <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                class="custom-file-input" name="kitchen" required>
                            <label for="" class="custom-file-label">Kitchen</label>
                        </div>
                    </div>
                </div>

                <!-- Bathroom -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="custom-file-input"
                            name="bedroom" required>
                        <label for="" class="custom-file-label">Bedroom</label>
                    </div>
                </div>

                <!-- Bathroom -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="custom-file-input"
                            name="bathroom" required>
                        <label for="" class="custom-file-label">Bathroom</label>
                    </div>
                </div>

                <!-- Property -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="custom-file-input"
                            name="property" required>
                        <label for="" class="custom-file-label">Property</label>
                    </div>
                </div>

                <!-- House -->
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="custom-file-input"
                            name="house" required>
                        <label for="" class="custom-file-label">House</label>
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" name="upload" class="btn btn-outline-danger" value="Upload">
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