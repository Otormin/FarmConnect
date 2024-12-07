<?php
include 'connect.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmConnect - Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <style>
        #appliedWorkersSection{
            display: block; 
            padding: 50px;
        }

        #orderSection{
            display: none; 
            padding: 50px;
        }

        #acceptedJobsSection{
            display: block; 
            padding: 50px;
        }

        #unacceptedJobsSection{
            display: none; 
            padding: 50px;
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="Homepage.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1>FarmConnect</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="Homepage.php" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Products</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="product-list-vegetable.php" class="dropdown-item">Vegetable</a>
                            <a href="product-list-fruit.php" class="dropdown-item">Fruit</a>
                            <a href="product-list-grain.php" class="dropdown-item">Grain</a>
                            <a href="product-list-legume.php" class="dropdown-item">Legume</a>
                            <a href="product-list-egg.php" class="dropdown-item">Egg</a>
                            <a href="product-list-meatOrFish.php" class="dropdown-item">Meat or Fish</a>
                            <a href="product-list-dairy.php" class="dropdown-item">Dairy</a>
                            <a href="product-list-other.php" class="dropdown-item">Other</a>
                        </div>
                    </div>
                    <a href="job-list.php" class="nav-item nav-link">Jobs</a>
                    <a href="Cart.php" class="nav-item nav-link active">Cart</a>
                    <a href="Farmers.php" class="nav-item nav-link">Farmers</a>
                    <a href="Weather.php" class="nav-item nav-link">Weather</a>
                    <a href="Blog.php" class="nav-item nav-link">Blog</a>
                    <a href="About.php" class="nav-item nav-link">About</a>
                    <a href="Contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="Profile.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Profile<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->

        <?php
            $role = $_SESSION['role'];
            if($role == 'Farmer'){
                echo '<div id="buttons" style="padding: 10px; width: 100%; display: flex; justify-content: center; align-items: center; background-color: #EFFDF5;">
                        <button id="appliedWorkersSectionBtn" style="background-color: #007856; color: white; padding: 20px; margin: 20px; border-radius: 10px; width: 200px;">Applied Workers</button>
                        <button id="orderSectionBtn" style="background-color: #007856; color: white; padding: 20px; border-radius: 10px; width: 200px;">Order</button>
                    </div>';
            }
            if($role == 'Worker'){
                echo '<div id="buttons" style="padding: 10px; width: 100%; display: flex; justify-content: center; align-items: center; background-color: #EFFDF5;">
                        <button id="acceptedJobsSectionBtn" style="background-color: #007856; color: white; padding: 20px; margin: 20px; border-radius: 10px; width: 200px;">Accepted Jobs</button>
                        <button id="unacceptedJobsSectionBtn" style="background-color: #007856; color: white; padding: 20px; border-radius: 10px; width: 200px;">Unaccepted Jobs</button>
                    </div>';
            }
            if($role == 'Consumer'){
                echo '';
            }
        ?>

        <!-- Cart Start -->
            <?php
                if ($role == 'Farmer') {
            ?>
                    <section id="appliedWorkersSection" style="background-color: #EFFDF5;">
                        <h2>Applied Workers</h2>
                        <?php
                            $farmerId = $_SESSION['farmerId'];
                            $getDetails = "SELECT * FROM applied_workers WHERE farmerId = $farmerId AND isApplied = 1";
        
                            $getDetailsResult = mysqli_query($conn, $getDetails);
        
                            if ($getDetailsResult && mysqli_num_rows($getDetailsResult) > 0) {
                                while ($row = mysqli_fetch_assoc($getDetailsResult)) {
                                    $jobId = $row['jobId'];
                                    $workerId = $row['workerId'];
                                    $coverLetter = htmlspecialchars($row['coverLetter']);
                                    $applicationDate = htmlspecialchars($row['applicationDate']);
                                    $isAccepted = htmlspecialchars($row['isAccepted']);
        
                                    $getJobDetails = "SELECT * FROM jobs WHERE jobId = $jobId";
                                    $getJobDetailsResult = mysqli_query($conn, $getJobDetails);
        
                                    if ($getJobDetailsResult) {
                                        while ($row = mysqli_fetch_assoc($getJobDetailsResult)) {
                                            $jobType = htmlspecialchars($row['jobType']);
                                            $jobDescription = htmlspecialchars($row['jobDescription']);
                                            $dateLine = htmlspecialchars($row['dateLine']);
        
                                            $getWorkerDetails = "SELECT * FROM workers WHERE workerId = $workerId";
                                            $getWorkerDetailsResult = mysqli_query($conn, $getWorkerDetails);
        
                                            if ($getWorkerDetailsResult) {
                                                while ($row = mysqli_fetch_assoc($getWorkerDetailsResult)) {
                                                    $firstName = htmlspecialchars($row['firstName']);
                                                    $lastName = htmlspecialchars($row['lastName']);
                                                    $email = htmlspecialchars($row['email']);

                                                    if($isAccepted == 1){
                                                        echo '<div class="tab-content">
                                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                                <div class="job-item p-4 mb-4">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                                            <div class="text-start ps-4">
                                                                                <h4 class="mb-3" style="display: inline;">Worker Name: '.$firstName.'</h4>
                                                                                <h4 class="mb-3" style="display: inline;">'.$lastName.'</h4>
                                                                                <h4 class="mb-3">Worker Email: '.$email.'</h4>
                                                                                <h4 class="mb-3">Cover letter: '.$coverLetter.'</h4>
                                                                                <h4 class="mb-3">Job Type: '.$jobType.'</h4>
                                                                                <h4 class="mb-3">Job Description: '.$jobDescription.'</h4>
                                                                                <h4 class="mb-3">Status: Accepted</h4>
                                                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date of application: '.$applicationDate.'</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: '.$dateLine.'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary" href="Unaccept.php?workerId=' . $workerId . '&jobId=' . $jobId . '">Unaccept</a>
                                                            <a class="btn btn-primary" href="Accept.php?workerId=' . $workerId . '&jobId=' . $jobId . '">Accept</a>
                                                            <a class="btn btn-primary" href="ViewWorkerProfile.php?workerId=' . $workerId . '">View Worker Profile</a>
                                                        </div></br></br>';
                                                    }
                                                    else{
                                                        echo '<div class="tab-content">
                                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                                <div class="job-item p-4 mb-4">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                                            <div class="text-start ps-4">
                                                                                <h4 class="mb-3" style="display: inline;">Worker Name: '.$firstName.'</h4>
                                                                                <h4 class="mb-3" style="display: inline;">'.$lastName.'</h4>
                                                                                <h4 class="mb-3">Worker Email: '.$email.'</h4>
                                                                                <h4 class="mb-3">Cover letter: '.$coverLetter.'</h4>
                                                                                <h4 class="mb-3">Job Type: '.$jobType.'</h4>
                                                                                <h4 class="mb-3">Job Description: '.$jobDescription.'</h4>
                                                                                <h4 class="mb-3">Status: Not accepted</h4>
                                                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date of application: '.$applicationDate.'</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: '.$dateLine.'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary" href="Unaccept.php?workerId=' . $workerId . '&jobId=' . $jobId . '">Unaccept</a>
                                                            <a class="btn btn-primary" href="Accept.php?workerId=' . $workerId . '&jobId=' . $jobId . '">Accept</a>
                                                            <a class="btn btn-primary" href="ViewWorkerProfile.php?workerId=' . $workerId . '">View Worker Profile</a>
                                                        </div></br></br>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else {
                                echo "<p>No workers have applied.</p>";
                            }
                        ?>
                    </section>
            <?php
                }
            ?>

            <?php
                if ($role == 'Farmer') {
            ?>
                    <section id="orderSection" style="background-color: #EFFDF5">
                        <h2>Order</h2>
                        <div style="display: flex; flex-wrap; wrap">
                        <?php
                            $farmerId = $_SESSION['farmerId'];
                            $getDetails = "SELECT * FROM product_purchase WHERE farmerId = $farmerId AND isSelected = 1";
        
                            $getDetailsResult = mysqli_query($conn, $getDetails);
        
                            if ($getDetailsResult && mysqli_num_rows($getDetailsResult) > 0) {
                                while ($row = mysqli_fetch_assoc($getDetailsResult)) {
                                    $productId = $row['productId'];
                                    $consumerId = $row['consumerId'];
                                    $purchaseQuantity = htmlspecialchars($row['purchaseQuantity']);
                                    $selectedDate = htmlspecialchars($row['selectedDate']);
        
                                    $getProductDetails = "SELECT * FROM products WHERE productId = $productId";
                                    $getProductDetailsResult = mysqli_query($conn, $getProductDetails);
        
                                    if ($getProductDetailsResult) {
                                        while ($row = mysqli_fetch_assoc($getProductDetailsResult)) {
                                            $productName = htmlspecialchars($row['productName']);
                                            $productCategory = htmlspecialchars($row['productCategory']);
                                            $unitPrice = htmlspecialchars($row['unitPrice']);
                                            $quantity = htmlspecialchars($row['quantity']);
                                            $image = 'data:image/jpeg;base64,' . base64_encode($row['image']);
        
                                            $getCustomerDetails = "SELECT * FROM consumers WHERE consumerId = $consumerId";
                                            $getCustomerDetailsResult = mysqli_query($conn, $getCustomerDetails);
        
                                            if ($getCustomerDetailsResult) {
                                                while ($row = mysqli_fetch_assoc($getCustomerDetailsResult)) {
                                                    $phoneNumber = htmlspecialchars($row['phoneNumber']);
                                                    $email = htmlspecialchars($row['email']);

                                                    echo '<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="display: flex; padding-left: 30px">
                                                        <div class="cat-item rounded p-4">
                                                            <div style="width = 100%;">
                                                                <img src="'.$image.'" alt="" style="height: 200px; width: 100%; padding-bottom: 10px;">
                                                            </div>
                                                            <h6 class="mb-3">'.$productName.'</h6>
                                                            <p>Category: '.$productCategory.'</p>
                                                            <p>Unit Price: '.$unitPrice.'</p>
                                                            <p>Product Quantity: '.$quantity.'</p>
                                                            <p>Purchase Quantity: '.$purchaseQuantity.'</p>
                                                            <p>Date of Product Selection: '.$selectedDate.'</p>
                                                            <p>Customer Phone Number: '.$phoneNumber.'</p>
                                                            <p>Customer Email: '.$email.'</p>
                                                            <a class="btn btn-primary" href="ViewConsumerProfile.php?consumerId=' . $consumerId . '">View Customer Profile</a></br></br>
                                                            <a class="btn btn-primary" href="product-detail-farmer.php?productId=' . $productId . '">Product Details</a>
                                                        </div>
                                                    </div>';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else {
                                echo "<p>No customers have ordered any products.</p>";
                            }
                        ?>
                        </div>
                    </section>
            <?php
                }
            ?>

            <?php
                if ($role == 'Worker') {
            ?>
                    <section id="acceptedJobsSection" style="background-color: #EFFDF5;">
                        <h2>Accepted Jobs</h2>
                        <?php
                            $workerId = $_SESSION['workerId'];
                            $getDetails = "SELECT * FROM applied_workers WHERE workerId = $workerId AND isAccepted = 1";
        
                            $getDetailsResult = mysqli_query($conn, $getDetails);
        
                            if ($getDetailsResult && mysqli_num_rows($getDetailsResult) > 0) {
                                while ($row = mysqli_fetch_assoc($getDetailsResult)) {
                                    $jobId = $row['jobId'];
                                    $farmerId = $row['farmerId'];
                                    $serialNumber = $row['serialNumber'];
                                    $coverLetter = htmlspecialchars($row['coverLetter']);
                                    $applicationDate = htmlspecialchars($row['applicationDate']);
                                    $isApplied = htmlspecialchars($row['isApplied']);
        
                                    $getJobDetails = "SELECT * FROM jobs WHERE jobId = $jobId";
                                    $getJobDetailsResult = mysqli_query($conn, $getJobDetails);
        
                                    if ($getJobDetailsResult) {
                                        while ($row = mysqli_fetch_assoc($getJobDetailsResult)) {
                                            $jobType = htmlspecialchars($row['jobType']);
                                            $jobDescription = htmlspecialchars($row['jobDescription']);
                                            $dateLine = htmlspecialchars($row['dateLine']);
        
                                            $getFarmerDetails = "SELECT * FROM farmers WHERE farmerId = $farmerId";
                                            $getFarmerDetailsResult = mysqli_query($conn, $getFarmerDetails);
        
                                            if ($getFarmerDetailsResult) {
                                                while ($row = mysqli_fetch_assoc($getFarmerDetailsResult)) {
                                                    $firstName = htmlspecialchars($row['firstName']);
                                                    $lastName = htmlspecialchars($row['lastName']);
                                                    $email = htmlspecialchars($row['email']);

                                                    if($isApplied == 1){
                                                        echo '<div class="tab-content">
                                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                                <div class="job-item p-4 mb-4">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                                            <div class="text-start ps-4">
                                                                                <h4 class="mb-3" style="display: inline;">Farmer Name: '.$firstName.'</h4>
                                                                                <h4 class="mb-3" style="display: inline;">'.$lastName.'</h4>
                                                                                <h4 class="mb-3">Farmer Email: '.$email.'</h4>
                                                                                <h4 class="mb-3">Cover letter: '.$coverLetter.'</h4>
                                                                                <h4 class="mb-3">Job Type: '.$jobType.'</h4>
                                                                                <h4 class="mb-3">Job Description: '.$jobDescription.'</h4>
                                                                                <h4 class="mb-3">Status: Applied</h4>
                                                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date of application: '.$applicationDate.'</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: '.$dateLine.'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary" href="unapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Unapply</a>
                                                            <a class="btn btn-primary" href="Reapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Apply</a>
                                                            <a class="btn btn-primary" href="DeleteApplication.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Delete</a>
                                                            <a class="btn btn-primary" href="ViewFarmerProfile.php?farmerId=' . $farmerId . '">View Farmer Profile</a>
                                                        </div></br></br>';
                                                    }
                                                    if($isApplied == 0){
                                                        echo '<div class="tab-content">
                                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                                <div class="job-item p-4 mb-4">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                                            <div class="text-start ps-4">
                                                                                <h4 class="mb-3" style="display: inline;">Farmer Name: '.$firstName.'</h4>
                                                                                <h4 class="mb-3" style="display: inline;">'.$lastName.'</h4>
                                                                                <h4 class="mb-3">Farmer Email: '.$email.'</h4>
                                                                                <h4 class="mb-3">Cover letter: '.$coverLetter.'</h4>
                                                                                <h4 class="mb-3">Job Type: '.$jobType.'</h4>
                                                                                <h4 class="mb-3">Job Description: '.$jobDescription.'</h4>
                                                                                <h4 class="mb-3">Status: Not Applied</h4>
                                                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date of application: '.$applicationDate.'</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: '.$dateLine.'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary" href="unapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Unapply</a>
                                                            <a class="btn btn-primary" href="Reapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Apply</a>
                                                            <a class="btn btn-primary" href="DeleteApplication.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Delete</a>
                                                            <a class="btn btn-primary" href="ViewFarmerProfile.php?farmerId=' . $farmerId . '">View Farmer Profile</a>
                                                        </div></br></br>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else {
                                echo "<p>No applied jobs have been accepted.</p>";
                            }
                        ?>
                    </section>
            <?php
                }
            ?>

            <?php
                if ($role == 'Worker') {
            ?>
                    <section id="unacceptedJobsSection" style="background-color: #EFFDF5;">
                        <h2>Unaccepted Jobs</h2>
                        <?php
                            $workerId = $_SESSION['workerId'];
                            $getDetails = "SELECT * FROM applied_workers WHERE workerId = $workerId AND isAccepted = 0";
        
                            $getDetailsResult = mysqli_query($conn, $getDetails);
        
                            if ($getDetailsResult && mysqli_num_rows($getDetailsResult) > 0) {
                                while ($row = mysqli_fetch_assoc($getDetailsResult)) {
                                    $jobId = $row['jobId'];
                                    $farmerId = $row['farmerId'];
                                    $serialNumber = $row['serialNumber'];
                                    $coverLetter = htmlspecialchars($row['coverLetter']);
                                    $applicationDate = htmlspecialchars($row['applicationDate']);
                                    $isApplied = htmlspecialchars($row['isApplied']);
        
                                    $getJobDetails = "SELECT * FROM jobs WHERE jobId = $jobId";
                                    $getJobDetailsResult = mysqli_query($conn, $getJobDetails);
        
                                    if ($getJobDetailsResult) {
                                        while ($row = mysqli_fetch_assoc($getJobDetailsResult)) {
                                            $jobType = htmlspecialchars($row['jobType']);
                                            $jobDescription = htmlspecialchars($row['jobDescription']);
                                            $dateLine = htmlspecialchars($row['dateLine']);
        
                                            $getFarmerDetails = "SELECT * FROM farmers WHERE farmerId = $farmerId";
                                            $getFarmerDetailsResult = mysqli_query($conn, $getFarmerDetails);
        
                                            if ($getFarmerDetailsResult) {
                                                while ($row = mysqli_fetch_assoc($getFarmerDetailsResult)) {
                                                    $firstName = htmlspecialchars($row['firstName']);
                                                    $lastName = htmlspecialchars($row['lastName']);
                                                    $email = htmlspecialchars($row['email']);

                                                    if($isApplied == 1){
                                                        echo '<div class="tab-content">
                                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                                <div class="job-item p-4 mb-4">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                                            <div class="text-start ps-4">
                                                                                <h4 class="mb-3" style="display: inline;">Farmer Name: '.$firstName.'</h4>
                                                                                <h4 class="mb-3" style="display: inline;">'.$lastName.'</h4>
                                                                                <h4 class="mb-3">Farmer Email: '.$email.'</h4>
                                                                                <h4 class="mb-3">Cover letter: '.$coverLetter.'</h4>
                                                                                <h4 class="mb-3">Job Type: '.$jobType.'</h4>
                                                                                <h4 class="mb-3">Job Description: '.$jobDescription.'</h4>
                                                                                <h4 class="mb-3">Status: Applied</h4>
                                                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date of application: '.$applicationDate.'</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: '.$dateLine.'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary" href="unapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Unapply</a>
                                                            <a class="btn btn-primary" href="Reapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Apply</a>
                                                            <a class="btn btn-primary" href="DeleteApplication.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Delete</a>
                                                            <a class="btn btn-primary" href="ViewFarmerProfile.php?farmerId=' . $farmerId . '">View Farmer Profile</a>
                                                        </div></br></br>';
                                                    }
                                                    if($isApplied == 0){
                                                        echo '<div class="tab-content">
                                                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                                                <div class="job-item p-4 mb-4">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                                            <div class="text-start ps-4">
                                                                                <h4 class="mb-3" style="display: inline;">Farmer Name: '.$firstName.'</h4>
                                                                                <h4 class="mb-3" style="display: inline;">'.$lastName.'</h4>
                                                                                <h4 class="mb-3">Farmer Email: '.$email.'</h4>
                                                                                <h4 class="mb-3">Cover letter: '.$coverLetter.'</h4>
                                                                                <h4 class="mb-3">Job Type: '.$jobType.'</h4>
                                                                                <h4 class="mb-3">Job Description: '.$jobDescription.'</h4>
                                                                                <h4 class="mb-3">Status: Not Applied</h4>
                                                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date of application: '.$applicationDate.'</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: '.$dateLine.'</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary" href="unapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Unapply</a>
                                                            <a class="btn btn-primary" href="Reapply.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Apply</a>
                                                            <a class="btn btn-primary" href="DeleteApplication.php?workerId=' . $workerId . '&jobId=' . $jobId . '&serialNumber=' . $serialNumber . '">Delete</a>
                                                            <a class="btn btn-primary" href="ViewFarmerProfile.php?farmerId=' . $farmerId . '">View Farmer Profile</a>
                                                        </div></br></br>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else {
                                echo "<p>You have not applied for any jobs.</p>";
                            }
                        ?>
                    </section>
            <?php
                }
            ?>

            <?php
                if ($role == 'Consumer') {
            ?>
                    <section style="background-color: #EFFDF5; padding: 50px;">
                        <h2>Order</h2>
                        <div style="display: flex; flex-wrap: wrap">
                        <?php
                            $consumerId = $_SESSION['consumerId'];
                            $getDetails = "SELECT * FROM product_purchase WHERE consumerId = $consumerId";
        
                            $getDetailsResult = mysqli_query($conn, $getDetails);
        
                            if ($getDetailsResult && mysqli_num_rows($getDetailsResult) > 0) {
                                while ($row = mysqli_fetch_assoc($getDetailsResult)) {
                                    $serialNumber = $row['serialNumber'];
                                    $productId = $row['productId'];
                                    $farmerId = $row['farmerId'];
                                    $purchaseQuantity = htmlspecialchars($row['purchaseQuantity']);
                                    $selectedDate = htmlspecialchars($row['selectedDate']);
        
                                    $getProductDetails = "SELECT * FROM products WHERE productId = $productId";
                                    $getProductDetailsResult = mysqli_query($conn, $getProductDetails);
        
                                    if ($getProductDetailsResult) {
                                        while ($row = mysqli_fetch_assoc($getProductDetailsResult)) {
                                            $productName = htmlspecialchars($row['productName']);
                                            $productCategory = htmlspecialchars($row['productCategory']);
                                            $unitPrice = htmlspecialchars($row['unitPrice']);
                                            $quantity = htmlspecialchars($row['quantity']);
                                            $image = 'data:image/jpeg;base64,' . base64_encode($row['image']);
        
                                            $getFarmerDetails = "SELECT * FROM farmers WHERE farmerId = $farmerId";
                                            $getFarmerDetailsResult = mysqli_query($conn, $getFarmerDetails);
        
                                            if ($getFarmerDetailsResult) {
                                                while ($row = mysqli_fetch_assoc($getFarmerDetailsResult)) {
                                                    $phoneNumber = htmlspecialchars($row['phoneNumber']);
                                                    $email = htmlspecialchars($row['email']);

                                                    echo '<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="display: flex; padding-left: 30px">
                                                            <div class="cat-item rounded p-4">
                                                                <div style="width = 100%;">
                                                                    <img src="'.$image.'" alt="" style="height: 200px; width: 100%; padding-bottom: 10px;">
                                                                </div>
                                                                <h6 class="mb-3">'.$productName.'</h6>
                                                                <p>Category: '.$productCategory.'</p>
                                                                <p>Unit Price: '.$unitPrice.'</p>
                                                                <p>Product Quantity: '.$quantity.'</p>
                                                                <p>Purchase Quantity: '.$purchaseQuantity.'</p>
                                                                <p>Date of Product Selection: '.$selectedDate.'</p>
                                                                <p>Farmer Phone Number: '.$phoneNumber.'</p>
                                                                <p>Farmer Email: '.$email.'</p>
                                                                <a class="btn btn-primary" href="ViewFarmerProfile.php?farmerId=' . $farmerId . '">View Farmer Profile</a></br></br>
                                                                <a class="btn btn-primary" href="product-detail.php?productId=' . $productId . '">Product Details</a>
                                                                <a class="btn btn-primary" href="DeleteSelectedProduct.php?consumerId=' . $consumerId . '&productId=' . $productId . '&serialNumber=' . $serialNumber . '&purchaseQuantity=' . $purchaseQuantity . '">Delete</a>
                                                            </div>
                                                        </div>';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else {
                                echo "<p>You have not selected any products.</p>";
                            }
                        ?>
                        </div>
                    </section>
            <?php
                }
            ?>
        <!-- Cart End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5" style="display: flex; align-items: start; justify-content: center;">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="About.php">About Us</a>
                        <a class="btn btn-link text-white-50" href="Contact.php">Contact Us</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Babcock, Ilishan-Remo, Ogun State, Nigeria</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(+234-9073372467)</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>yjesse@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a href="#">FarmConnect</a>, All Right Reserved. Designed By Group 1
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
        let appliedWorkersSection = document.getElementById("appliedWorkersSection");
        let orderSection = document.getElementById("orderSection");
        let acceptedJobsSection = document.getElementById("acceptedJobsSection");
        let unacceptedJobsSection = document.getElementById("unacceptedJobsSection");

        let appliedWorkersSectionBtn = document.getElementById("appliedWorkersSectionBtn");
        let orderSectionBtn = document.getElementById("orderSectionBtn");
        let acceptedJobsSectionBtn = document.getElementById("acceptedJobsSectionBtn");
        let unacceptedJobsSectionBtn = document.getElementById("unacceptedJobsSectionBtn");

        let role = "<?php echo $_SESSION['role']; ?>"

        if(role == "Farmer"){
            appliedWorkersSectionBtn.addEventListener("click", function(){
            appliedWorkersSection.style.display = "block";
            orderSection.style.display = "none";
            });
            orderSectionBtn.addEventListener("click", function(){
                appliedWorkersSection.style.display = "none";
                orderSection.style.display = "block";
            });
        }
        if(role == "Worker"){
            acceptedJobsSectionBtn.addEventListener("click", function(){
            acceptedJobsSection.style.display = "block";
            unacceptedJobsSection.style.display = "none";
            console.log("i am working")
            });
            unacceptedJobsSectionBtn.addEventListener("click", function(){
                acceptedJobsSection.style.display = "none";
                unacceptedJobsSection.style.display = "block";
                console.log("i am working")
            });
        }
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>