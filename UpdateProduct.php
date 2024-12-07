<?php
include 'connect.php';

$productId = $_GET['productId'];

$getProductDetails = "SELECT * FROM products WHERE productId = $productId";
$getProductDetailsResult = mysqli_query($conn, $getProductDetails);

$row = mysqli_fetch_assoc($getProductDetailsResult);

$previousProductName = htmlspecialchars($row['productName']);
$previousProductDescription = htmlspecialchars($row['productDescription']);
$previousProductCategory = htmlspecialchars($row['productCategory']);
$previousProductQuantity = htmlspecialchars($row['quantity']);
$previousUnitPrice = htmlspecialchars($row['unitPrice']);
$previousImage = 'data:image/jpeg;base64,' . base64_encode($row['image']);

if(isset($_POST['submit'])){
    $productName=$_POST['pName'];
    $productDescription=$_POST['pDescription'];
    $productCategory=$_POST['pCategory'];
    $quantity=$_POST['quantity'];
    $unitPrice=$_POST['uPrice'];
    $creationDate = date('Y-m-d');
    $image=$_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    
    $updateQueue = "UPDATE products SET productName = '$productName', productDescription = '$productDescription', productCategory = '$productCategory', quantity = '$quantity', unitPrice = '$unitPrice', creationDate = '$creationDate', image = '$imgContent' WHERE productId = $productId";

    $updateQueueResult = mysqli_query($conn, $updateQueue);

    if ($updateQueueResult) {
        header("Location: ./Profile.php");
    }
    else {
        echo "Error updating product: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #007856;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #EFFDF5;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 70px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2B3940;
        }

        form input, form select, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }

        form input[type="submit"], .cancel-button button {
            background-color: #00B074;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            padding: 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover, .cancel-button button:hover {
            background-color: #007856;
        }

        label {
            font-weight: bold;
            color: #2B3940;
        }

        .cancel-button {
            text-align: center;
            margin-top: 20px;
        }

        .cancel-button a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="pName">Product Name</label>
            <input type="text" name="pName" id="pName" placeholder="Product Name" value="<?php echo $previousProductName; ?>" required>

            <label for="pDescription">Product Description</label>
            <input type="text" name="pDescription" id="pDescription" placeholder="Product Description e.g.(a basket of apples)" value="<?php echo $previousProductDescription; ?>" required>

            <label for="pCategory">Product Category</label>
            <select name="pCategory" id="productCategory" required>
                <option <?php if ($previousProductCategory == 'Vegetable') echo 'selected'; ?>>Vegetable</option>
                <option <?php if ($previousProductCategory == 'Fruit') echo 'selected'; ?>>Fruit</option>
                <option <?php if ($previousProductCategory == 'Grain') echo 'selected'; ?>>Grain</option>
                <option <?php if ($previousProductCategory == 'Legume') echo 'selected'; ?>>Legume</option>
                <option <?php if ($previousProductCategory == 'Egg') echo 'selected'; ?>>Egg</option>
                <option <?php if ($previousProductCategory == 'Meat or Fish') echo 'selected'; ?>>Meat or Fish</option>
                <option <?php if ($previousProductCategory == 'Dairy') echo 'selected'; ?>>Dairy</option>
                <option <?php if ($previousProductCategory == 'Other') echo 'selected'; ?>>Other</option>
            </select>

            <label for="quantity">Product Quantity</label>
            <input type="number" name="quantity" id="quantity" placeholder="Quantity"  value="<?php echo $previousProductQuantity; ?>" required>

            <label for="uPrice">Unit Price</label>
            <input type="number" name="uPrice" id="uPrice" placeholder="Unit Price" value="<?php echo $previousUnitPrice; ?>" required>

            <label for="image">Image</label>
            <div>
                <img src="<?php echo $previousImage; ?>" alt="Previous Image" style="height: 100px; width: 100px; object-fit: cover; margin-bottom: 10px;">
            </div>
            <input type="file" name="image" id="image" required>

            <input type="submit" value="Update" name="submit">
        </form>
        <div class="cancel-button">
            <a href="Profile.php"><button type="button">Cancel</button></a>
        </div>
    </div>
</body>
</html>