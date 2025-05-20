<?php
include 'connect.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmConnect - Product Details</title>
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
                                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Products</a>
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
                        <a href="SignUpRoles.html" class="btn btn-primary rounded-0 py-4 px-lg-5 d-lg-block">SIGN UP<i class="fa fa-arrow-right ms-3"></i></a>

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
                                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Products</a>
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
                        <a href="Profile.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-lg-block">Profile<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </nav>
            <!-- Navbar End -->
        <?php
            }
        ?>

            <!-- Product Detail Start -->
                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="row gy-5 gx-4">
                            <?php
                                $productId = $_GET['productId'];
                                $getProductDetails = "SELECT * FROM products WHERE productId = $productId";
                                $getProductDetailsResult = mysqli_query($conn, $getProductDetails);

                                if($getProductDetailsResult) {
                                    while($row = mysqli_fetch_assoc($getProductDetailsResult)) {
                                        $farmerId = $row['farmerId'];
                                        $productId = $row['productId'];
                                        $productName = htmlspecialchars($row['productName']);
                                        $productCategory = htmlspecialchars($row['productCategory']);
                                        $productDescription = htmlspecialchars($row['productDescription']);
                                        $unitPrice = htmlspecialchars($row['unitPrice']);
                                        $quantity = htmlspecialchars($row['quantity']);
                                        $image = 'data:image/jpeg;base64,' . base64_encode($row['image']);
                                        $creationDate = htmlspecialchars($row['creationDate']);

                                        $getFarmerDetails = "SELECT * FROM farmers WHERE farmerId = $farmerId";
                                        $getFarmerDetailsResult = mysqli_query($conn, $getFarmerDetails);

                                        if($getFarmerDetailsResult) {
                                            while($row = mysqli_fetch_assoc($getFarmerDetailsResult)) {
                                                $firstName = htmlspecialchars($row['firstName']);
                                                $lastName = htmlspecialchars($row['lastName']);
                                                $farmLocation = htmlspecialchars($row['farmLocation']);
                                                $role = htmlspecialchars($row['role']);
                                            }
                                        }

                                        if(!isset($_SESSION['role']) || $_SESSION['role'] != "Consumer") {
                                            echo '
                                            <div class="col-lg-8">
                                                <div class="d-flex align-items-center mb-5">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="'.$image.'" alt="" style="width: 100%; height: 400px;"></br></br></br>
                                                </div>

                                                <div class="mb-5">
                                                    <h4 class="mb-3">Product Description</h4>
                                                    <p>'.$productDescription.'</p>
                                                    <h4 class="mb-3">Product Quantity</h4>
                                                    <p>'.$quantity.'</p>
                                                </div>

                                                <div class="">
                                                    <h4 class="mb-4">Purchase</h4>
                                                    <form>
                                                        <div class="row g-3">
                                                            <div class="col-12 col-sm-6" style="width: 100%">
                                                                <input type="number" class="form-control" placeholder="Input Purchasing Quantity" name="pQuantity" style="width: 100%">
                                                            </div>
                                                            <div class="col-12">
                                                                <a href="LoginAsConsumer.php"><button type="button" class="btn btn-primary w-100">Add to Cart</button></a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                                                    <h4 class="mb-4">Product Summary</h4>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Product Name: '.$productName.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: '.$creationDate.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Product Category: '.$productCategory.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Unit Price: '.$unitPrice.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Farm Location: '.$farmLocation.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Quantity: '.$quantity.'</p>
                                                </div>
                                                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                                                    <h4 class="mb-4">Product Posted by:</h4>
                                                    <p class="m-0">'.$firstName.' '.$lastName.'</p>
                                                    <div class="col-12">
                                                        <a href="ViewFarmerProfile.php?farmerId='.$farmerId.'&role='.$role.'"><button class="btn btn-primary w-100" style="color: white;">Visit Profile</button></a>
                                                    </div>
                                                </div>
                                            </div>';
                                        } else {
                                            echo '
                                            <div class="col-lg-8">
                                                <div class="d-flex align-items-center mb-5">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="'.$image.'" alt="" style="width: 100%; height: 400px;"></br></br></br>
                                                    <div class="text-start ps-4">
                                                        <h3 class="mb-3">'.$productName.'</h3>
                                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>'.$farmLocation.'</span>
                                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>' . $unitPrice . '</span>
                                                        <span class="text-truncate me-3">'.$productCategory.'</span>
                                                    </div>
                                                </div>

                                                <div class="mb-5">
                                                    <h4 class="mb-3">Product Description</h4>
                                                    <p>'.$productDescription.'</p>
                                                    <h4 class="mb-3">Product Quantity</h4>
                                                    <p>'.$quantity.'</p>
                                                </div>

                                                <div class="">
                                                    <h4 class="mb-4">Purchase</h4>
                                                    <form method="post" action="ProductPurchase.php">
                                                        <div class="row g-3">
                                                            <div class="col-12 col-sm-6">
                                                                <input type="number" class="form-control" placeholder="Input Purchasing Quantity" name="pQuantity" style="width: 735px" required>
                                                            </div>
                                                            <input type="hidden" name="productId" value="'.$productId.'">
                                                            <input type="hidden" name="farmerId" value="'.$farmerId.'">
                                                            <div class="col-12">
                                                                <button class="btn btn-primary w-100" type="submit" name="purchase">Add to Cart</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                                                    <h4 class="mb-4">Product Summary</h4>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: '.$creationDate.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Product Category: '.$productCategory.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Unit Price: '.$unitPrice.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Farm Location: '.$farmLocation.'</p>
                                                    <p><i class="fa fa-angle-right text-primary me-2"></i>Quantity: '.$quantity.'</p>
                                                </div>
                                                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                                                    <h4 class="mb-4">Product Posted by:</h4>
                                                    <p class="m-0">'.$firstName.' '.$lastName.'</p>
                                                    <div class="col-12">
                                                        <a href="ViewFarmerProfile.php?farmerId='.$farmerId.'&role='.$role.'"><button class="btn btn-primary w-100" style="color: white;">Visit Profile</button></a>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    }
                                } else {
                                    echo "<p>No Product details.</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <!-- Product Detail End -->


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