<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    $duplicationEntryError = 0;
    $userRegisterationSuccessStatus = 0;

    
    if(!isset($_SESSION['admin'])) {
        header('location: index.php?admin-must-logged-in');
    }


    if(isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$dob = $_POST['dob'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$contactno = $_POST['contactno'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$postalcode = $_POST['postalcode'];
	$password = $_POST['password'];

	$saveDataQuery = "INSERT INTO `users` (`firstname`, `lastname`, `dob`, `age`, `gender`, `contactno`, `email`, `address`, `city`, `state`, `postalcode`, `password`) VALUES ('$firstname', '$lastname', '$dob', '$age', '$gender', '$contactno', '$email', '$address', '$city', '$state', '$postalcode', '$password')";

	if($conn->query($saveDataQuery)){
        $userRegisterationSuccessStatus = 1;
	} else {
		$duplicationEntryError = 1;
    }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-Ad | Admin | Add User Section</title>

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

    <!-- Add User Form -->
    <div class="container">
        <div class="card pb-2 bg-light">
            <h4 class="card-header display-4 text-center bg-light m-3 card-head"><strong>Register Now</strong></h4>
            <div class="card-body">
                <div class="container">

                    <!-- Duplication Entry Error Alert -->
                    <?php if($duplicationEntryError === 1): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div>
                            <span>Duplication of</span><strong class="text-danger"> Email </strong>

                        </div>
                        Email already exist in our application please try different Email or Creddentials to proceed

                        <button type="button" data-dismiss="alert" aler-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <!-- Registration Success -->
                    <?php if($userRegisterationSuccessStatus === 1): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        User Registration Successfull. Now you can log on to the newely registered user account.

                        <button type="button" data-dismiss="alert" aler-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" method="POST">
                        <div class="row">
                            <div class="col-md-6 my-3">
                                <div class="p-3">
                                    <!-- Firstname -->
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="John"
                                            required>
                                    </div>

                                    <!-- Lastname -->
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Doe"
                                            required>
                                    </div>

                                    <!-- DOB -->
                                    <div class="form-group">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" name="dob" placeholder="yyyy-mm-dd"
                                            required>
                                    </div>

                                    <!-- Age -->
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" name="age" placeholder="Age" required>
                                    </div>

                                    <!-- Gender -->
                                    <div class="form-group">
                                        <label class="d-block">Gender</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="male"
                                                checked>
                                            <label class="form-check-label" for="exampleRadios1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="female">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Female
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 my-3 d-none d-md-block">
                                <div class="container">
                                    <div class="w-100 d-flex flex-column">
                                        <h1 class="h1">Basic Proof Information</h1>

                                        <div class="d-flex flex-column">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="p-3">
                                    <!-- Contact No -->
                                    <div class="form-group">
                                        <label for="contactno">Contact No</label>
                                        <input type="text" class="form-control" name="contactno"
                                            placeholder="1234 525 265" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="johndoe@gmail.com" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="p-3">
                                    <!-- Address -->
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing" required>
                                    </div>

                                    <!-- City -->
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" placeholder="lorem"
                                            required>
                                    </div>

                                    <!-- State -->
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" name="state" placeholder="Karnataka"
                                            required>
                                    </div>

                                    <!-- Postal code -->
                                    <div class="form-group">
                                        <label for="postalcode">Postalcode</label>
                                        <input type="text" class="form-control" name="postalcode" placeholder="581-334"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                </div>
                <!-- Password -->
                <div class="form-group w-25 mx-auto">
                    <label for="postalcode">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-danger btn-block w-25 mx-auto" name="signup">SignUp</button>
                </form>
            </div>
        </div>
    </div>
    <!-- signup form section end -->

    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>