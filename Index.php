<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmConnect - Connecting Farmers to Consumers & Workers</title>
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
                    <a href="Index.php" class="nav-item nav-link active">Home</a>
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


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/product.jpeg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Discover the Freshest, High-Quality Produce You Deserve</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Experience the taste of farm-fresh quality. Browse a wide range of locally grown produce, nurtured with care and delivered straight from the farm to your table.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/farmer.jpeg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find Your Dream Farming Opportunity</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Unlock rewarding opportunities in agriculture. Connect with farms looking for skilled workers and make a meaningful impact while pursuing your passion.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Products By Category</h1>
                <div class="row g-4">
                    <?php
                        $category = 'Vegetable';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-vegetable.php">
                            <img src="img/vegetable.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Vegetable</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>

                    <?php
                        $category = 'Fruit';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-fruit.php">
                            <img src="img/fruits.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Fruit</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>

                    <?php
                        $category = 'Grain';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-grain.php">
                            <img src="img/grain.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Grain</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>

                    <?php
                        $category = 'Legume';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-legume.php">
                            <img src="img/legumes.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Legume</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>

                    <?php
                        $category = 'Egg';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-egg.php">
                            <img src="img/egg.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Egg</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>

                    <?php
                        $category = 'Meat or Fish';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-meatOrFish.php">
                            <img src="img/proteins.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Meat or Fish</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>

                    <?php
                        $category = 'Dairy';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-dairy.php">
                            <img src="img/dairy.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Dairy</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>

                    <?php
                        $category = 'Other';
                        $query = "SELECT COUNT(*) as count FROM products WHERE productCategory = '$category'";
                        $result = mysqli_query($conn, $query);
                        $amountOfProducts = 0;
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $amountOfProducts = $row['count'];
                        }
                    ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="product-list-other.php">
                            <img src="img/others.png" alt="" style="height: 75px; width: 75px; padding-bottom: 10px;">
                            <h6 class="mb-3">Other</h6>
                            <p class="mb-0"><?php echo $amountOfProducts ?> Available</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Image Section -->
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="img/FarmPics.jpg" alt="Farm Image">
                    </div>
                    <!-- Text Section -->
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Connecting Farmers, Consumers, and Workers</h1>
                        <p class="mb-4">
                            Our platform bridges the gap between farmers, consumers, and workers by providing a seamless way to find fresh produce, farm labor, or agricultural opportunities.
                        </p>
                        <ul class="list-unstyled mb-4">
                            <li><i class="fa fa-check text-primary me-3"></i>Access fresh and local farm produce</li>
                            <li><i class="fa fa-check text-primary me-3"></i>Connect with reliable farm workers</li>
                            <li><i class="fa fa-check text-primary me-3"></i>Support local farmers and communities</li>
                        </ul>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="about.php">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div class="job-item p-4 mb-4">
                            <?php
                                $getJobs = "SELECT * FROM jobs LIMIT 7"; 

                                $getJobsResult = mysqli_query($conn, $getJobs);

                                if ($getJobsResult && mysqli_num_rows($getJobsResult) > 0) {
                                    while ($row = mysqli_fetch_assoc($getJobsResult)) {
                                        $farmerId = $row['farmerId'];
                                        $jobId = $row['jobId'];
                                        $jobType = htmlspecialchars($row['jobType']);
                                        $jobCategory = htmlspecialchars($row['jobCategory']);
                                        $dailyRate = htmlspecialchars($row['dailyRate']);
                                        $farmLocation = htmlspecialchars($row['farmLocation']);
                                        $dateLine = htmlspecialchars($row['dateLine']);

                                        echo '
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3">' . $jobType . '</h5>
                                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $farmLocation . '</span>
                                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>' . $dailyRate . '</span></br></br>
                                                        <span class="text-truncate me-3">Job Category: ' . $jobCategory . '</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <a class="btn btn-primary" href="job-detail.php?jobId=' . $jobId . '">Details</a>
                                                    </div>
                                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: ' . $dateLine . '</small>
                                                </div>
                                            </div></br>';
                                    }
                                } else {
                                    echo "<p>No Jobs Found.</p>";
                                }
                            ?>
                        </div>
                        <a class="btn btn-primary py-3 px-5" href="job-list.php">Browse More Jobs</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Clients Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>"Using this platform has made it so much easier to find reliable workers for my farm. It saves me time and effort."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/BayoDaniel.jpeg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Bayo Daniel</h5>
                                <small>Farmer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>"Through FarmConnect, I have been able to get farm fresh produce to feed my husband and 10 kids."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/UgbochiChristabel.jpeg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Ugbochi Christabel</h5>
                                <small>Consumer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>"I’ve always preferred buying directly from farmers, and this app makes it so simple to get fresh produce."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/BelloTemitope.jpeg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Bello Temitope</h5>
                                <small>Consumer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>"I’ve found consistent work through this platform. It’s been a great way to connect with farmers who need help."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/EzeChukwudi.jpeg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Eze Chukwudi</h5>
                                <small>Worker</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        

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