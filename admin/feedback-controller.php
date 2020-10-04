<?php
    include '../inc/dbconnection.inc.php';
    session_start();
    
    if(!isset($_SESSION['admin'])) {
        header('location: index.php?admin-must-logged-in');
    } else {
        

        // User Feedback Block
        {
            $userFeedbackQuery = "SELECT * FROM `user_feedback` ORDER BY feedback_date";

            $rawUserFeedbackData = $conn->query($userFeedbackQuery);
            $userFinalFeedbackData = [];
            
            foreach($rawUserFeedbackData as $singleUserFeedback) {
                $userFinalFeedbackData[] = $singleUserFeedback;
            }
        }

        // Vendor Feedback Block 
        {
            $vendorFeedbackQuery = "SELECT * FROM `vendor_feedback` ORDER BY feedback_date";

            $rawVendorFeedbackData = $conn->query($vendorFeedbackQuery);
            $vendorFinalFeedbackData = [];
            
            foreach($rawVendorFeedbackData as $singleVendorFeedback) {
                $vendorFinalFeedbackData[] = $singleVendorFeedback;
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
            <a href="index.php" class="navbar-brand text-center">
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
            <h1 class="h1 text-left my-3 text-secondary"><i class="fa fa-comments mr-2"></i> Feedback Controller</h1>
            <div class="row">
                <div class="col-md-4">
                    <a href="#users-feedback-section" class="text-decoration-none">
                        <div class="card p-5 bg-vendors">
                            <h1 class="text-center">
                                <i class="fa fa-user d-block"></i> Users
                            </h1>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#vendor-feedback-section" class="text-decoration-none">
                        <div class="card p-5 bg-vendors">
                            <h1 class="text-center">
                                <i class="fa fa-user d-block"></i> Vendors
                            </h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Users feedback section -->
    <section id="users-feedback-section" class="border border-top border-bottom my-5 bg-light p-4">
        <div class="container">

            <h1 class="h1 text-center">Users Feedback</h1>
            <div class="row">
                <?php foreach($userFinalFeedbackData as $oneFeedback): ?>
                <div class="col-md-4">
                    <div class="card shadow-none rounded-0 p-4 w-100 feedback-card">
                        From: <span class="lead font-weight-bolder"><?php echo $oneFeedback['user_name'] ?></span>

                        <div class="d-flex justify-content-between">
                            <span class="text-dark">feedbackID :</span> <?php echo $oneFeedback['id'] ?>
                            <span class="text-dark">Vendor ID :</span> <?php echo $oneFeedback['user_id'] ?>
                        </div>

                        <div class="d-flex flex-column">
                            <span class="text-dark">Email : <span
                                    class="font-weight-bolder"><?php echo $oneFeedback['user_email']  ?></span></span>
                            <span class="text-dark">Phone : <?php echo $oneFeedback['phone']  ?></span>
                            <span></span>
                        </div>

                        <div>
                            <small class="text-muted">Date: <?php echo $oneFeedback['feedback_date']  ?></small>
                        </div>

                        <hr>

                        <div>
                            <?php echo $oneFeedback['desrciption']; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Vendors feedback Section -->
    <section id="vendor-feedback-section" class="my-5 bg-secondary p-5">
        <div class="container">
            <h1 class="h1 text-center text-light">Vendors Feedback</h1>

            <div class="row">
                <?php foreach($vendorFinalFeedbackData as $oneFeedback): ?>
                <div class="col-md-4">
                    <div class="card shadow-none rounded-0 p-4 w-100 feedback-card">
                        From: <span class="lead font-weight-bolder"><?php echo $oneFeedback['vendor_name'] ?></span>

                        <div class="d-flex justify-content-between">
                            <span class="text-dark">feedbackID :</span> <?php echo $oneFeedback['id'] ?>
                            <span class="text-dark">Vendor ID :</span> <?php echo $oneFeedback['vendor_id'] ?>
                        </div>

                        <div class="d-flex flex-column">
                            <span class="text-dark">Email : <span
                                    class="font-weight-bolder"><?php echo $oneFeedback['email']  ?></span></span>
                            <span class="text-dark">Phone : <?php echo $oneFeedback['phone']  ?></span>
                            <span></span>
                        </div>

                        <div>
                            <small class="text-muted">Date: <?php echo $oneFeedback['feedback_date']  ?></small>
                        </div>

                        <hr>

                        <div>
                            <?php echo $oneFeedback['description']; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- Script Tags -->
    <?php include 'inc/scripts.inc.php'; ?>
</body>


</html>