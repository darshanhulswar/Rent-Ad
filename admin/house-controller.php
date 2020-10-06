<?php
    include '../inc/dbconnection.inc.php';
    session_start();
    
    if(!isset($_SESSION['admin'])) {
        header('location: index.php?admin-must-logged-in');
    } else {
        
        // House Details
        {
            $viewHouseQuery = "SELECT * FROM `properties` INNER JOIN `images` ON images.property_id = properties.id";
            $houseRawData = $conn->query($viewHouseQuery);

            $houseFinalData = [];

            foreach($viewHouseQuery as $house) {
                $houseFinalData[] = $house;
            }
        }
    
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-Ad | Admin Feedback Controller</title>

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






    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>