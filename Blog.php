<?php
include 'connect.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmConnect - Blog</title>
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
                            <a href="Blog.php" class="nav-item nav-link active">Blog</a>
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
                            <a href="Blog.php" class="nav-item nav-link active">Blog</a>
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


  <!-- Parallax Section -->
  <div class="parallax"></div>

  <!-- Blog Section -->
  <div class="blog-section">
    <h1 class="blog-title">Agricultural Blogs</h1>

    <!-- Blog Card 1 -->
    <div class="blog-card">
      <img src="img/sustainable_farming.jpeg" alt="Sustainable Farming" class="blog-image" style="width: 35.5%">
      <div class="blog-content">
        <h3>Sustainable Farming Practices</h3>
        <p>Explore innovative and eco-friendly farming methods to boost productivity while conserving resources. Discover how to implement these practices on your farm.</p>
        <a href="article1.php" class="read-more">Read More</a>
      </div>
    </div>

    <!-- Blog Card 2 -->
    <div class="blog-card">
      <img src="img/soilhealth.jpeg" alt="Improving Soil Health" class="blog-image" style="width: 40%">
      <div class="blog-content">
        <h3>Improving Soil Health for Better Yields</h3>
        <p>Learn the best techniques for enhancing soil quality through organic matter, crop rotation, and sustainable fertilization strategies.</p>
        <a href="article2.php" class="read-more">Read More</a>
      </div>
    </div>

    <!-- Blog Card 3 -->
    <div class="blog-card">
      <img src="img/marketaccess1.jpeg" alt="Connecting Farmers to Markets" class="blog-image" style="width: 40%">
      <div class="blog-content">
        <h3>Connecting Farmers to Markets</h3>
        <p>Find out how digital platforms and innovative approaches are helping farmers reach new markets and connect directly with consumers.</p>
        <a href="article3.php" class="read-more">Read More</a>
      </div>
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

 
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #f4f4f4;
      overflow-x: hidden;
    }

    /* Parallax Background Section */
    .parallax {
      background-image: url('farmland-background.jpg');
      height: 230px;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .blog-section {
      max-width: 1100px;
      margin: -200px auto 50px; /* Overlap with parallax */
      padding: 20px;
    }

    .blog-title {
      text-align: center;
      font-size: 40px;
      font-weight: bold;
      color: #2d3436;
      margin-bottom: 50px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .blog-card {
      display: flex;
      align-items: center;
      background: linear-gradient(135deg, #ffffff, #e8f5e9);
      margin-bottom: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transform: scale(1);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .blog-card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .blog-image {
      flex: 1;
      max-width: 40%;
      height: 250px;
      object-fit: cover;
      filter: brightness(90%);
      transition: filter 0.4s;
    }

    .blog-card:hover .blog-image {
      filter: brightness(100%);
    }

    .blog-content {
      flex: 2;
      padding: 20px 30px;
      animation: fadeIn 1s ease-in-out;
    }

    .blog-content h3 {
      font-size: 26px;
      color: #27ae60;
      margin-bottom: 10px;
    }

    .blog-content p {
      font-size: 16px;
      color: #636e72;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .read-more {
      text-decoration: none;
      color: white;
      background-color: #27ae60;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.4s, transform 0.4s;
    }

    .read-more:hover {
      background-color: #218c53; 
      transform: scale(1.1);
      color: white !important;
    }

    /* Fade-in Animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  