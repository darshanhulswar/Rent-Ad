<?php
    include '../inc/dbconnection.inc.php';
    session_start();
    $userDeletedStatus = 0;
    
    if(!isset($_SESSION['admin'])) {
        header('location: index.php?admin-must-logged-in');
    } else {
        
        // Users Details
        {
            $viewUserQuery = "SELECT * FROM `users`";
            $usersRawData = $conn->query($viewUserQuery);

            $usersFinalData = [];

            foreach($usersRawData as $singleUser) {
                $usersFinalData[] = $singleUser;
            }
        }
    
    }


    if(isset($_GET['user-id'])) {
        if(isset($_SESSION['admin'])) {
            $userID = $_GET['user-id'];
            $deleteUser = "DELETE FROM `users` WHERE id = '$userID'";
            if($conn->query($deleteUser)) {
                $userDeletedStatus = 1;
            }
        } else {
            header('location: index.php?admin-must-logged-in');
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
                        <a href="user-controller.php" class="nav-link"><i class="fa fa-cog mr-2"></i>User Controller</a>
                    </li>

                    <li class="nav-item  text-dark">
                        <a href="dashboard.php" class="nav-link"><i class="fa fa-cog mr-2"></i>Dashoard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <section id="view-users-section">
        <div class="container">
            <!-- User Deleted Alert -->
            <?php if($userDeletedStatus === 1): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                User Delete successfull.

                <button type="button" data-dismiss="alert" aler-label="close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>

            <h1 class="h1 text-center">Total Users <?php echo  count($usersFinalData); ?></h1>
            <div class="table-responsive-md">
                <table class="table table-hover table-striped table-sm">
                    <thead class="thead-primary">
                        <tr>
                            <th>Sl No.</th>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Postal Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; foreach($usersFinalData as $singleUSer): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $singleUSer['id']; ?></td>
                            <td><?php echo $singleUSer['firstname']; ?></td>
                            <td><?php echo $singleUSer['lastname']; ?></td>
                            <td><?php echo $singleUSer['dob']; ?></td>
                            <td><?php echo $singleUSer['age']; ?></td>
                            <td><?php echo $singleUSer['gender']; ?></td>
                            <td><?php echo $singleUSer['contactno']; ?></td>
                            <td><?php echo $singleUSer['email']; ?></td>
                            <td><?php echo $singleUSer['address']; ?></td>
                            <td><?php echo $singleUSer['city']; ?></td>
                            <td><?php echo $singleUSer['state']; ?></td>
                            <td><?php echo $singleUSer['postalcode']; ?></td>
                            <td><a href="<?php echo $_SERVER['PHP_SELF'];?>?user-id=<?php echo $singleUSer['id'] ?>"
                                    class="btn btn-danger btn-sm font-weight-bolder">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>