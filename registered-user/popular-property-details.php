<?php
    include '../inc/dbconnection.inc.php';
    session_start();

    if($_SESSION['user']['id'] < 0) {
        header('location: ../signin.php?user-must-logged-in');
    }

    if(isset($_SESSION['user']['id'])) {
        $propertyid = $_GET['property-id'];
        $vendorid = $_GET['vendor-id'];
        $getPropertyDetailsQuery = "SELECT properties.id, properties.name, properties.details, properties.location, properties.bed, properties.parking, properties.rpm, images.house, images.hall, images.kitchen, images.bathroom, images.bedroom, images.property, properties.vendor_id FROM properties INNER JOIN images ON  properties.is_verified > 0 AND properties.id = '$propertyid'";

        $rawData = $conn->query($getPropertyDetailsQuery);
        $propertyDetails = $rawData->fetch_assoc();
    } else {
        echo "please Login to your account";
    }
?>

<!-- Modal Properties -->
<section>
    <div class="container">
        <div class="card my-3 p-3">
            <ul class="nav nav-tabs" id="myTab-<?php echo $propertyDetails['id']; ?>" role="tablist">

                <!-- Home 1stTab -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="house-tab-<?php echo $propertyDetails['id']; ?>" data-toggle="tab"
                        href="#house-<?php echo $propertyDetails['id']; ?>" role="tab"
                        aria-controls="house-<?php echo $propertyDetails['id']; ?>" aria-selected="true">House</a>
                </li>

                <!-- Home Details -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="details-tab-<?php echo $propertyDetails['id']; ?>" data-toggle="tab"
                        href="#details-<?php echo $propertyDetails['id']; ?>" role="tab"
                        aria-controls="details-<?php echo $propertyDetails['id']; ?>" aria-selected="false">Details</a>
                </li>

                <!-- Contact Vendor -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab-<?php echo $propertyDetails['id']; ?>" data-toggle="tab"
                        href="#contact-<?php echo $propertyDetails['id']; ?>" role="tab"
                        aria-controls="contact-<?php echo $propertyDetails['id']; ?>" aria-selected="false">Contact
                        Vendor</a>
                </li>

                <!-- Property Images -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="img-tab-<?php echo $propertyDetails['id']; ?>" data-toggle="tab"
                        href="#img-<?php echo $propertyDetails['id']; ?>" role="tab"
                        aria-controls="img-<?php echo $propertyDetails['id']; ?>" aria-selected="false">Property
                        Images</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="house-<?php echo $propertyDetails['id']; ?>" role="tabpanel"
                    aria-labelledby="house-tab-<?php echo $propertyDetails['id']; ?>">
                    <p class="lead">
                        Details: <?php echo $propertyDetails['details']; ?>
                    </p>

                    <p class="lead"> Bedrooms:
                        Bedrooms: <?php echo $propertyDetails['bed'] ?>
                    </p>

                    <p class="lead">
                        Parking Lot: <?php echo $propertyDetails['parking'] ?>
                    </p>

                    <p class="lead">
                        ID: <?php echo $propertyDetails['id']; ?>
                    </p>
                </div>

                <div class="tab-pane fade" id="details-<?php echo $propertyDetails['id']; ?>" role="tabpanel"
                    aria-labelledby="details-tab-<?php echo $propertyDetails['id']; ?>">
                    <p class="lead">
                        Details: <?php echo $propertyDetails['details']; ?>
                    </p>

                    <p class="lead">
                        Location: <?php echo $propertyDetails['location'] ?>
                    </p>
                </div>

                <div class="tab-pane fade" id="contact-<?php echo $propertyDetails['id']; ?>" role="tabpanel"
                    aria-labelledby="contact-tab">
                    <?php 
                            $vendorID = $vendorid;
                            $getVendorDetails = "SELECT phone FROM vendors WHERE id = '$vendorID'";
                            $rawData = $conn->query($getVendorDetails);
                            $phoneNumber = $rawData->fetch_assoc();
                        ?>

                    <p class="lead">
                        Phone Number: <?php echo $phoneNumber['phone']; ?>
                    </p>
                </div>

                <!-- Images -->
                <div class="tab-pane fade" id="img-<?php echo $propertyDetails['id']; ?>" role="tabpanel"
                    aria-labelledby="img-tab-<?php echo $propertyDetails['id']; ?>">
                    <div class="container">
                        <div class="row my-2">
                            <div class="col-md-4">
                                <a data-fancybox="gallery-<?php echo $propertyDetails['id']; ?>"
                                    href="../uploads/property-uploads/hall/<?php echo $propertyDetails['hall']; ?>">
                                    <img class="img-fluid"
                                        src="../uploads/property-uploads/hall/<?php echo $propertyDetails['hall']; ?>"
                                        alt="Hall">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a data-fancybox="gallery-<?php echo $propertyDetails['id']; ?>"
                                    href="../uploads/property-uploads/kitchen/<?php echo $propertyDetails['kitchen']; ?>">
                                    <img class="img-fluid"
                                        src="../uploads/property-uploads/kitchen/<?php echo $propertyDetails['kitchen']; ?>"
                                        alt="Kitchen">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a data-fancybox="gallery-<?php echo $propertyDetails['id']; ?>"
                                    href="../uploads/property-uploads/bedroom/<?php echo $propertyDetails['bedroom']; ?>">
                                    <img class="img-fluid"
                                        src="../uploads/property-uploads/bedroom/<?php echo $propertyDetails['bedroom']; ?>"
                                        alt="Bedroom">
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <a data-fancybox="gallery-<?php echo $propertyDetails['id']; ?>"
                                    href="../uploads/property-uploads/bathroom/<?php echo $propertyDetails['bathroom']; ?>">
                                    <img class="img-fluid"
                                        src="../uploads/property-uploads/bathroom/<?php echo $propertyDetails['bathroom']; ?>"
                                        alt="Bathroom">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a data-fancybox="gallery-<?php echo $propertyDetails['id']; ?>"
                                    href="../uploads/property-uploads/house/<?php echo $propertyDetails['house']; ?>">
                                    <img class="img-fluid"
                                        src="../uploads/property-uploads/house/<?php echo $propertyDetails['house']; ?>"
                                        alt="House">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a data-fancybox="gallery-<?php echo $propertyDetails['id']; ?>"
                                    href="../uploads/property-uploads/property/<?php echo $propertyDetails['property']; ?>">
                                    <img class="img-fluid"
                                        src="../uploads/property-uploads/property/<?php echo $propertyDetails['property']; ?>"
                                        alt="Property">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>