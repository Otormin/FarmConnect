<?php
include 'connect.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmConnect - Job Details</title>
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
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


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
                        <a href="job-list.php" class="nav-item nav-link active">Jobs</a>
                        <a href="Cart.php" class="nav-item nav-link">Cart</a>
                        <a href="Farmers.php" class="nav-item nav-link">Farmers</a>
                        <a href="Weather.html" class="nav-item nav-link">Weather</a>
                        <a href="blog.html" class="nav-item nav-link">Blog</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="Profile.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-lg-block">Profile<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </nav>
        <!-- Navbar End -->

        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <?php
                        $jobId = $_GET['jobId'];
                        $getJobDetails = "SELECT * FROM jobs WHERE jobId = $jobId";
                        $getJobDetailsResult = mysqli_query($conn, $getJobDetails);

                        if($getJobDetailsResult){
                            while($row = mysqli_fetch_assoc($getJobDetailsResult)){
                                $farmerId = $row['farmerId'];
                                $jobId = $row['jobId'];
                                $jobType = htmlspecialchars($row['jobType']);
                                $jobCategory = htmlspecialchars($row['jobCategory']);
                                $jobDescription = htmlspecialchars($row['jobDescription']);
                                $jobResponsibility = htmlspecialchars($row['jobResponsibility']);
                                $farmLocation = htmlspecialchars($row['farmLocation']);
                                $dailyRate = htmlspecialchars($row['dailyRate']);
                                $creationDate = htmlspecialchars($row['creationDate']);
                                $dateLine = htmlspecialchars($row['dateLine']);

                                $getFarmerDetails = "SELECT * FROM farmers WHERE farmerId = $farmerId";
                                $getFarmerDetailsResult = mysqli_query($conn, $getFarmerDetails);

                                if($getFarmerDetailsResult){
                                    while($row = mysqli_fetch_assoc($getFarmerDetailsResult)){
                                        $firstName = htmlspecialchars($row['firstName']);
                                        $lastName = htmlspecialchars($row['lastName']);
                                    }
                                }

                                echo    '<div class="col-lg-8">
                                            <div class="d-flex align-items-center mb-5">
                                                <div class="text-start ps-4">
                                                    <h3 class="mb-3">'.$jobType.'</h3>
                                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>'.$farmLocation.'</span>
                                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>'.$dailyRate.'</span></br></br>
                                                    <span class="text-truncate me-3">Job Category: '.$jobCategory.'</span>
                                                </div>
                                            </div>

                                            <div class="mb-5">
                                                <h4 class="mb-3">Job description</h4>
                                                <p>'.$jobDescription.'</p>
                                                <h4 class="mb-3">Responsibility</h4>
                                                <p>'.$jobResponsibility.'</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                                                <h4 class="mb-4">Job Summary</h4>
                                                <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: '.$creationDate.'</p>
                                                <p><i class="fa fa-angle-right text-primary me-2"></i>Job Category: '.$jobCategory.'</p>
                                                <p><i class="fa fa-angle-right text-primary me-2"></i>Daily Rate: '.$dailyRate.'</p>
                                                <p><i class="fa fa-angle-right text-primary me-2"></i>Location: '.$farmLocation.'</p>
                                                <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: '.$dateLine.'</p>
                                            </div>
                                            <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                                                <h4 class="mb-4">Job Posted by:</h4>
                                                <p class="m-0">'.$firstName.' '.$lastName.'</p>
                                            </div>
                                        </div>';
                            }
                        }    
                        else {
                            echo "<p>No Jobs.</p>";
                        }
                    ?>
                </div>
            </div>        
        </div>
        <!-- Job Detail End -->

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
                            &copy; <a href="#">FarmConnect</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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