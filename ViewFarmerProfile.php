<?php
include 'connect.php';

session_start();

$farmerId = $_GET['farmerId'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmConnect - Farmer Profile</title>
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
        #jobsSection {
            display: block; 
            padding: 50px;
        }
        #productsSection {
            display: none; 
            padding: 50px;
        }
    </style>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <?php
            if(!isset($_SESSION['role'])){
        ?>
            <!-- Navbar Start -->
                <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
                    <a href="Index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                        <h1>FarmConnect</h1>
                    </a>
                    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto p-4 p-lg-0">
                            <a href="Index.php" class="nav-item nav-link">Home</a>
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
                            <a href="Farmers.php" class="nav-item nav-link">Farmers</a>
                            <a href="Weather.php" class="nav-item nav-link">Weather</a>
                            <a href="Blog.php" class="nav-item nav-link">Blog</a>
                            <a href="About.php" class="nav-item nav-link">About</a>
                            <a href="Contact.php" class="nav-item nav-link">Contact</a>
                            <a href="./LoginAs.html" class="nav-item nav-link">Login</a>
                        </div>
                        <a href="SignUpRoles.html" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">SIGN UP<i class="fa fa-arrow-right ms-3"></i></a>

                    </div>
                </nav>
            <!-- Navbar End -->
        <?php
            }
            else{
        ?>
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
                            <a href="Cart.php" class="nav-item nav-link">Cart</a>
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
            }
        ?>

        <!-- Header Start -->
            <?php
                $getFarmerDetails = "SELECT * FROM farmers WHERE farmerId = $farmerId";
            
                $getFarmerDetailsResult = mysqli_query($conn, $getFarmerDetails);
            
                if($getFarmerDetailsResult){
                    while($row = mysqli_fetch_assoc($getFarmerDetailsResult)){
                        $firstName = htmlspecialchars($row['firstName']);
                        $lastName = htmlspecialchars($row['lastName']);
                        $email = htmlspecialchars($row['email']);
                        $phoneNumber = htmlspecialchars($row['phoneNumber']);
                        $farmLocation = htmlspecialchars($row['farmLocation']);
                        $accountNumber = htmlspecialchars($row['accountNumber']);
                        $accountName = htmlspecialchars($row['accountName']);
                        $bankName = htmlspecialchars($row['bankName']);
                        $image = 'data:image/jpeg;base64,' . base64_encode($row['image']);

                        echo '<div>
                                <img src="'.$image.'" alt="" style="width: 100%; height: 650px"">
                                <div style="padding-left: 50px; padding-top: 40px; padding-bottom: 40px; background-color: #EFFDF5;">
                                    <h4 style="display: inline;">Name: '.$firstName.'</h4>
                                    <h4 style="display: inline;">'.$lastName.'</h4>
                                    <h4>Email: '.$email.'</h4>
                                    <h4>Farm location: '.$farmLocation.'</h4>
                                    <h4>Phone Number: '.$phoneNumber.'</h4>
                                    <h4>Bank Account Number: '.$accountNumber.'</h4>
                                    <h4>Bank Account Name: '.$accountName.'</h4>
                                    <h4>Bank Name: '.$bankName.'</h4>
                                </div>
                            </div>';
                    }
                }

            ?>
        <!-- Header End -->

            <?php
                echo '<div id="buttons" style="padding: 10px; width: 100%; display: flex; justify-content: center; align-items: center; background-color: #EFFDF5; cursor: pointer;">
                            <button id="jobsSectionBtn" class="btn btn-primary" style="padding: 15px; margin: 20px; width: 175px;">Jobs</button>
                            <button id="productsSectionBtn" class="btn btn-primary" style="padding: 15px; margin: 20px; width: 175px;">Products</button>
                        </div>';
            ?>

        <!-- Profile Start -->
            <section id="jobsSection" style="background-color: #EFFDF5;">
                <h2>Jobs</h2>
                <?php
                    $getJob = "SELECT * FROM jobs WHERE farmerId = $farmerId";
                    $getJobResult = mysqli_query($conn, $getJob);

                    if ($getJobResult && mysqli_num_rows($getJobResult) > 0) {
                        while ($row = mysqli_fetch_assoc($getJobResult)) {
                            $jobId = $row['jobId'];
                            $jobType = htmlspecialchars($row['jobType']);
                            $jobCategory = htmlspecialchars($row['jobCategory']);
                            $dailyRate = htmlspecialchars($row['dailyRate']);
                            $farmLocation = htmlspecialchars($row['farmLocation']);
                            $dateLine = htmlspecialchars($row['dateLine']);

                            echo '<div class="tab-content">
                                        <div id="tab-1" class="tab-pane fade show p-0 active">
                                            <div class="job-item p-4 mb-4">
                                                <div class="row g-4">
                                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                        <div class="text-start ps-4">
                                                            <h5 class="mb-3">' . $jobType . '</h5>
                                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $farmLocation . '</span>
                                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>' . $dailyRate . '</span></br></br>
                                                            <span class="text-truncate me-3">' . $jobCategory . '</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                        <div class="d-flex mb-3">
                                                            <a class="btn btn-primary" href="job-detail.php?jobId=' . $jobId . '">Details</a>
                                                        </div>
                                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: ' . $dateLine . '</small>
                                                    </div>
                                                </div></br>
                                            </div>
                                        </div>
                                    </div>';
                        }
                    }
                    else {
                        echo "<p>No jobs available.</p>";
                    }
                ?>
            </section>

            <section id="productsSection" style="background-color: #EFFDF5;">
                <h2>Products</h2>
                <div style="display: flex; flex: wrap;"> 
                    <?php
                        $getProduct = "SELECT * FROM products WHERE farmerId = $farmerId";
                        $getProductsResult = mysqli_query($conn, $getProduct);

                        if ($getProductsResult && mysqli_num_rows($getProductsResult) > 0) {
                            while ($row = mysqli_fetch_assoc($getProductsResult)) {
                                $farmerId = $row['farmerId'];
                                $productId = $row['productId'];
                                $productName = htmlspecialchars($row['productName']);
                                $productCategory = htmlspecialchars($row['productCategory']);
                                $unitPrice = htmlspecialchars($row['unitPrice']);
                                $quantity = htmlspecialchars($row['quantity']);
                                $image = 'data:image/jpeg;base64,' . base64_encode($row['image']);

                                echo '
                                    <div style="background-color: white; width: 300px; margin-right: 30px">
                                        <div class="cat-item rounded p-4">
                                            <div style="width = 100%;">
                                                <img src="'.$image.'" alt="" style="height: 200px; width: 100%; padding-bottom: 10px;">
                                            </div>
                                            <h6 class="mb-3">'.$productName.'</h6>
                                            <p>Category: '.$productCategory.'</p>
                                            <p>Unit Price: '.$unitPrice.'</p>
                                            <p>Product Quantity: '.$quantity.'</p>
                                            <a class="btn btn-primary" href="product-detail.php?productId=' . $productId . '">Details</a>
                                        </div>
                                    </div></br></br>';
                            }
                        }
                        else {
                            echo "<p>No products available.</p>";
                        }
                    ?>
                </div>
            </section>
        <!-- Profile End -->


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
        let jobsSection = document.getElementById("jobsSection");
        let productsSection = document.getElementById("productsSection");

        let jobsSectionBtn = document.getElementById("jobsSectionBtn");
        let productsSectionBtn = document.getElementById("productsSectionBtn");

        jobsSectionBtn.addEventListener("click", function(){
            jobsSection.style.display = "block";
            productsSection.style.display = "none";
        });
        productsSectionBtn.addEventListener("click", function(){
            jobsSection.style.display = "none";
            productsSection.style.display = "block";
        });
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