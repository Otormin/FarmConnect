<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00795a;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 60px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2B3940;
        }

        form input, 
        form select, 
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #2B3940;
            border-radius: 4px;
            font-size: 14px;
            color: #2B3940;
            background-color: #EFFDF5;
        }

        form textarea {
            resize: none;
        }

        form input[type="submit"] {
            background-color: #00B074;
            color: white;
            cursor: pointer;
            border: none;
            font-weight: bold;
        }

        form input[type="submit"]:hover {
            background-color: #00795a;
        }

        .cancel-btn {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .cancel-btn a {
            text-decoration: none;
        }

        .cancel-btn button {
            background: #2B9BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancel-btn button:hover {
            background: #1e7bd6;
        }

        label {
            font-weight: bold;
            color: #2B3940;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Create Job</h1>
            <form method="post" action="Product.php" enctype="multipart/form-data">
                <input type="text" name="pName" id="pName" placeholder="Product Name" required>
                <input type="text" name="pDescription" id="pDescription" placeholder="Product Description e.g.(a basket of apples)" required>
                <select class="dropDown" name="pCategory" id="productCategory" required>
                    <option disabled selected>Product Category</option>
                    <option>Vegetable</option>
                    <option>Fruit</option>
                    <option>Grain</option>
                    <option>Legume</option>
                    <option>Egg</option>
                    <option>Meat or Fish</option>
                    <option>Dairy</option>
                    <option>Other</option>
                </select>
                <input type="number" name="quantity" id="quantity" placeholder="Quantity" required>
                <input type="number" name="uPrice" id="uPrice" placeholder="Unit Price" required>
                <p>Image of Product</p>
                <input type="file" name="image" required>
                <input type="submit" class="btn" value="Create" name="create">
            </form>
            <div class="cancel-btn">
                <a href="Profile.php"><button>Cancel</button></a>
            </div>
    </div>
</body>
</html>
