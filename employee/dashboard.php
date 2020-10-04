<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    $rentVerifiedHouses = $rentunVerifiedHouses = [];
    $totalHouses = 0;
    if(isset($_SESSION['employee']['id'])) {
        $verifiedHouseQuery = "SELECT * FROM properties Where is_verified > 0";

        $unVerifiedHouses = "SELECT * FROM properties Where is_verified < 1";

        $verifiedHouses = $conn->query($verifiedHouseQuery);
        $unVerifiedHouses = $conn -> query($unVerifiedHouses);

        // Verified Houses
        foreach ($verifiedHouses as $verifiedHouse ) {
            $rentVerifiedHouses[] = $verifiedHouse;
        }

        // UnVerified Houses
        foreach ($unVerifiedHouses as $unVerifiedHouse ) {
            $rentunVerifiedHouses[] = $unVerifiedHouse;
        }

        $totalHouses = count($rentVerifiedHouses) + count($rentunVerifiedHouses);
    } else {
        header('location: index.php?employee-must-login');
    }
    
    if(isset($_GET['logout-employee'])) {
        if($_GET['logout-employee'] === '1') {
            session_start();
            if(isset($_SESSION['employee']['id'])) {
               unset($_SESSION['employee']);
                header('location: index.php?employee-logout-status=1');
            } else {
                header('location: index.php?error=1');
            }
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
    <title>Rent-Ad | Employee Dashboard</title>

    <!-- Link Tags -->
    <?php include 'inc/links.inc.php'; ?>
</head>

<body class="bg-light">

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
                <img src="../assets/icons/favicon.png" alt="rent-ad">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <ul class="navbar-nav mx-auto">
                    <h2 class="h1 nav-item text-secondary font-weight-bolder">Employee Dash Board</h2>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="dashboard.php?logout-employee=1" class="text-secondary nav-link"><i
                                class="fa fa-user-times"></i>
                            Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Count Section -->
    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-5 shadow user-select-none">
                        <h4 class="h4 text-center font-weight-bolder user-select-none">Total
                            Rent Houses</h4>
                        <h3 class="h3 text-center font-weight-bolder user-select-none">
                            <?php echo $totalHouses; ?>
                        </h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="#verified-houses" class="text-decoration-none">
                        <div class="card p-5 shadow user-select-none">
                            <h4 class="h4 text-center font-weight-bolder text-success user-select-none">Verified Houses
                            </h4>
                            <h3 class="h3 text-center text-success font-weight-bolder user-select-none">
                                <?php echo count($rentVerifiedHouses); ?>
                            </h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#unverified-houses" class="text-decoration-none">

                        <div class="card p-5 shadow">
                            <h4 class="h4 text-center font-weight-bolder text-danger user-select-none">Unverified Houses
                            </h4>
                            <h3 class="h3 text-center font-weight-bolder text-danger user-select-none">
                                <?php echo count($rentunVerifiedHouses); ?>
                            </h3>
                        </div>
                    </a>
                </div>
            </div>

            <hr class="border-primary">
        </div>
    </section>


    <!-- Verified Houses -->
    <section id="verified-houses" class="my-5 card w-75 mx-auto p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success mt-3 font-weight-bolder">Click on Verified House to reject the
                        approved house</div>
                    <h1 class="h1 text-success">Verified Properties</h1>

                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-dark">
                                <td>Sl No.</td>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Location</td>
                                <td>Details</td>
                                <td>Bed</td>
                                <td>Parking</td>
                                <td>Rent</td>
                                <td>Time</td>
                                <td>Vendor</td>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($rentVerifiedHouses as $verifiedHouse): ?>
                                <tr class="table-success clickable-row"
                                    data-href="unverify-house.php?property-id=<?php echo $verifiedHouse['id']; ?>">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $verifiedHouse['id'] ?></td>
                                    <td><?php echo $verifiedHouse['name'] ?></td>
                                    <td><?php echo $verifiedHouse['location'] ?></td>
                                    <td class="font-weight-bolder"><?php echo $verifiedHouse['details'] ?></td>
                                    <td><?php echo $verifiedHouse['bed'] ?></td>
                                    <td><?php echo $verifiedHouse['parking'] ?></td>
                                    <td><?php echo $verifiedHouse['rpm'] ?></td>
                                    <td><?php echo $verifiedHouse['time'] ?></td>
                                    <td><?php echo $verifiedHouse['vendor_id'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Unverified Houses -->
    <section id="unverified-houses" class="my-5 card w-75 mx-auto p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h1 text-danger">UnVerified Properties</h1>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <td>Sl No.</td>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Location</td>
                                <td>Details</td>
                                <td>Bed</td>
                                <td>Parking</td>
                                <td>Rent</td>
                                <td>Time</td>
                                <td>Vendor</td>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($rentunVerifiedHouses as $rentunVerifiedHouse): ?>
                                <tr class="clickable-row table-danger"
                                    data-href="verify-house.php?property-id=<?php echo $rentunVerifiedHouse['id']; ?>">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['id']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['name']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['location']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['details']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['bed']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['parking']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['rpm']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['time']; ?></td>
                                    <td><?php echo $rentunVerifiedHouse['vendor_id']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark p-2 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer text-center">
                        <p class="text-white span-strong text-secondary my-2">
                            <span class="text-danger">Note:</span> Only Admin Can Add an Employee So you're not allowed
                            to Signup to Our Rent-Ad
                            Information System
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php' ?>
    <script>
    jQuery(document).ready(function($) {

        $(".clickable-row").click(function() {

            window.location = $(this).data("href");

        });

    });
    </script>
</body>

</html>