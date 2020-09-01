<?php
    include '../inc/dbconnection.inc.php';
    if(isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if($result->num_rows === 1) {
            $data = $result->fetch_assoc();

            if($email === $data['email'] && $password === $data['password']) {
                session_start();
                $_SESSION['admin']['id'] = $data['id'];
                $_SESSION['admin']['email'] = $data['email'];
                $_SESSION['admin']['password'] = $data['password'];
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-Ad | Admin Login Panel</title>

    <!-- Favicon and Stylesheets -->
    <?php include 'inc/links.inc.php'; ?>
</head>

<body>

    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-md navbar-light bg-light sticky-top pt-1 pb-0 border border-bottom border-light shadow">
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
                    <li class="nav-item h1 text-dark">
                        <i class="fa fa-user mr-3"></i>Admin Login
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="login-board" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 col-md-4 col-lg-4"></div>
                <div class="col-sm-10 col-md-4 col-lg-4 mt-5">
                    <div class="card px-5 pt-5 pb-2">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <!-- Email -->
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" id="email" autocomplete="off"
                                    placeholder="Email" required autofocus="true" tabIndex="1">
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" id="password"
                                    autocomplete="off" placeholder="Password" required autofocus="true" tabIndex="2">
                            </div>

                            <!-- Login Button -->
                            <div class="text-center">
                                <button class="btn btn-outline-secondary" name="login" type="submit"
                                    tabIndex="3">Login</button>
                            </div>

                            <p class="text-center text-muted mt-3">
                                Rent-Ad Admin Login Panel
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-1 col-md-4 col-lg-4"></div>
            </div>
        </div>
    </section>

    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>