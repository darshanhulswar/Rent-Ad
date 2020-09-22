<?php
    include '../inc/dbconnection.inc.php';
    
    // if the user submitted the credentials then
    if(isset($_POST['login'])) {

        $userID = $_POST['userid'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM employee WHERE user_id = '$userID' AND password = '$password'";
        $result = $conn->query($sql);

        if($result->num_rows === 1) {
            $data = $result->fetch_assoc();

            if($userID === $data['user_id'] && $password === $data['password']) {
                session_start();
                $_SESSION['employee']['id'] = $data['id'];
                $_SESSION['employee']['user_id'] = $data['user_id'];
                $_SESSION['employee']['password'] = $data['password'];
                header('location: dashboard.php');
            } else {
                header('location: invalid-credentials.php');
            }
            
        } else {
            header('location: invalid-credentials.php');
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
    <title>Rent-Ad | Employee Login Board</title>

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
            <a href="index.php" class="navbar-brand text-center">
                <img src="../assets/icons/favicon.png" alt="">
                <h6 class="navbar-brand-name py-1">Rent-Ad</h6>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">

                <ul class="navbar-nav mx-auto">
                    <h2 class="h1 nav-item text-secondary">Employee Login</h2>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Employee Login Section -->
    <section>
        <div class="container p-5">
            <div class="card w-50 p-5 mx-auto">
                <p class="text-center text-muted">If you have authorised <span class="text-danger">User ID</span>
                    and <span class="text-danger">Password</span>
                    from the Admin Permission then only you can proceed to Employee's Dashboard</p>
                <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" class="form">

                    <!-- User ID -->
                    <div class="form-group">
                        <input class="form-control" type="text" name="userid" id="userid" placeholder="User ID"
                            minlength="6" maxlength="6" autofocus="on" autocomplete="off" autofocus="on" required>
                        <small class="form-text text-muted">4 Digit Unique ID</small>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password"
                            minlength="3" maxlength="20" required>
                    </div>

                    <!-- Login Button -->
                    <div class="text-center">
                        <button class="btn btn-outline-success" type="submit" name="login">
                            Login
                        </button>
                    </div>

                    <p class="text-center text-secondary mt-3"></p>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark p-2 fixed-bottom">
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
</body>

</html>