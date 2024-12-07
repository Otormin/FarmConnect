<?php
include 'connect.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmConnect - About Us</title>
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
                            <a href="About.php" class="nav-item nav-link active">About</a>
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
                            <a href="About.php" class="nav-item nav-link active">About</a>
                            <a href="Contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <a href="Profile.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Profile<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </nav>
            <!-- Navbar End -->
        <?php
            }
        ?>
<body>
    
    <style>

h3 {
    font-size: 40px;
    text-align: center;
    margin-bottom: 17.5px;
    color: #343a40;
}

p {
    text-align: center;
    font-size: 1.05rem;
    line-height: 1.75rem;
    letter-spacing: 0.6px;
    color: rgb(0, 0, 0, .5);
}

.section-section1 {
    margin: 2.5rem 170px;
    padding: 2rem 80px;
    background-color: #e6ffe6;
}

.section-section3 .second-image {
    position: relative;
    height: 450px;
    margin: auto;
}

.section-section3 .second-image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
}

.second-image-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

h6 {
    color: white;
    font-size: 3.5rem;
    font-weight: 900;
    letter-spacing: 2px;
}

.overlay2 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.55);
}

.inside-section3, .inside-section3-1 {
    display: flex;
    padding: 1.5rem 170px;
    margin-bottom: 25px;
    text-align: center;
    justify-content: space-between;
    align-items: center;
}

span {
    margin-bottom: 10px;
}

span img {
    height: 55px;
}

h4 {
    margin-bottom: 10px;
}

.section-inside {
    padding-left: 7px;
    padding-right: 7px;
}
    </style>



    <div class="about-us-section">
        <div class="section-section1">
            <h3> About Us </h3>
            <p> Welcome to FarmConnect, your trusted partner in bridging the gap between farmers, consumers, and agricultural workers. We are dedicated to revolutionizing the agricultural ecosystem by creating a seamless platform that connects all stakeholders for a more efficient and sustainable food supply chain.
            </p>
        </div>
        <div class="section-section1">
            <h3> Who We Are </h3>
            <p> FarmConnect is a dynamic web application that empowers farmers by giving them direct access to consumers and skilled workers. Our platform ensures that fresh produce reaches the market faster while helping farmers find the labor they need to grow and harvest their crops efficiently.
            </p>
        </div>
        <div class="section-section1">
            <h3> Our Mission </h3>
            <p> To enhance agricultural productivity and accessibility by connecting farmers to the resources and people they need to thrive, while delivering fresh, quality produce to consumers.
            </p>
        </div>
        <div class="section-section1 ">
            <h3> Our Vision </h3>
            <p> We envision a world where technology transforms agriculture into a collaborative, transparent, and sustainable industry. A world where farmers are valued, consumers enjoy affordable access to fresh goods, and workers find meaningful opportunities in agriculture.
            </p>
        </div>

        <div class="section-section2">
            <h3> What We Offer </h3>
            <div class="inside-section3">
                <div class="section-inside">
                    <span><img src="img/farmer.png" alt=""></span>
                    <h4> For Farmers </h4>
                    <p> Easy access to consumers and workers, empowering you to grow your business and streamline operations. </p>
                </div>
            <div class="section-inside">
                    <span><img src="img/consumer.png" alt=""></span>
                    <h4> For consumers </h4>
                    <p> A direct line to fresh, affordable farm products, straight from the source. </p>
                    </div>
            <div class="section-inside">
                    <span><img src="img/worker.png" alt=""></span>
                    <h4> For Workers </h4>
                    <p> Opportunities to connect with farmers who need your skills, creating job prospects across the agricultural value chain. </p>
                </div>
        </div>
        </div>

        <div class="section-section2-1">
            <h3> Why choose FarmConnect? </h3>
            <div class="inside-section3-1">
                <div class="section-inside">
                    <span><img src="img/transparency.png" alt=""></span>
                    <h4> Transparency </h4>
                    <p> Build trust with real-time communication and secure transactions. </p>
                </div>
            <div class="section-insid1">
                    <span><img src="img/efficiency.png" alt=""></span>
                    <h4> Efficiency </h4>
                    <p> Simplify the process of buying, selling, and hiring within the agricultural sector. </p>
                    </div>
            <div class="section-inside">
                    <span><img src="img/sustainability.png" alt=""></span>
                    <h4> Sustainability </h4>
                    <p> Support local farming communities and reduce food waste by cutting out unnecessary intermediaries. </p>
                </div>
        </div>
        </div>

        <div class="section-section3">
        <div class="second-image">
        <img src="img/strawberries.jpg" alt="Strawberries">
        <div class="overlay2"></div>
            <div class="second-image-text"><h6> Our mission is to make crop production more profitable, efficient and safe. </h6></div>
            <p></p>
        </div>
        </div>

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