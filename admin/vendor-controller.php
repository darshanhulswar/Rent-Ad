<?php
    include '../inc/dbconnection.inc.php';
    session_start();
    
    if(!isset($_SESSION['admin'])) {
        header('location: index.php?admin-must-logged-in');
    } else {
        
        // Users Details
        {
            $viewVendorQuery = "SELECT * FROM `vendors`";
            $vendorsRawData = $conn->query($viewVendorQuery);

            $vendorsFinalData = [];

            foreach($vendorsRawData as $singleVendor) {
                $vendorsFinalData[] = $singleVendor;
            }
        }
    
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-Ad | Admin | Vendor Controller</title>

    <!-- Favicon and Stylesheets -->
    <?php include 'inc/links.inc.php'; ?>
</head>

<body>

    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-md navbar-light bg-light sticky-top pt-1 pb-0 border border-bottom border-light shadow">
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
                    <li class="nav-item  text-dark">
                        <a href="dashboard.php" class="nav-link"><i class="fa fa-cog mr-2"></i>Back to Dashoard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container">
            <h1 class="h1 text-left my-3 text-secondary"><i class="fa fa-user mr-2"></i> Vendor Controller</h1>
            <div class="row">
                <div class="col-md-4">
                    <a href="view-vendor.php" class="text-decoration-none">
                        <div class="card p-5 bg-vendors bg-light">
                            <h1 class="text-center font-weight-bolder">
                                <i class="fa fa-users d-block"></i> View Vendors
                                <span
                                    class="badge badge-pill badge-primary"><?php echo  count($vendorsFinalData); ?></span>
                            </h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="add-vendor.php" class="text-decoration-none">
                        <div class="card p-5 bg-vendors">
                            <h1 class="text-center font-weight-bolder">
                                <i class="fa fa-plus d-block"></i> Add Vendor
                            </h1>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="delete-vendor.php" class="text-decoration-none">
                        <div class="card p-5 bg-vendors">
                            <h1 class="text-center text-danger font-weight-bolder">
                                <i class="fa fa-minus d-block"></i> Delete Vendor
                            </h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>




    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>