<?php
include 'connect.php';

$jobId = $_GET['updateId'];

$getJobDetails = "SELECT * FROM jobs WHERE jobId = $jobId";
$getJobDetailsResult = mysqli_query($conn, $getJobDetails);

$row = mysqli_fetch_assoc($getJobDetailsResult);

$previousJobType = htmlspecialchars($row['jobType']);
$previousJobDescription = htmlspecialchars($row['jobDescription']);
$previousJobCategory = htmlspecialchars($row['jobCategory']);
$previousJobResponsibility = htmlspecialchars($row['jobResponsibility']);
$previousFarmLocation = htmlspecialchars($row['farmLocation']);
$previousDailyRate = htmlspecialchars($row['dailyRate']);
$previousCreationDate = htmlspecialchars($row['creationDate']);
$previousDateLine = htmlspecialchars($row['dateLine']);

if(isset($_POST['submit'])){
    $jobType=$_POST['jType'];
    $jobCategory=$_POST['jCategory'];
    $jobDescription=$_POST['jDescription'];
    $jobResponsibility=$_POST['jResponsibility'];
    $farmLocation=$_POST['fLocation'];
    $dailyRate=$_POST['dRate'];
    $creationDate = date('Y-m-d');
    $dateLine = $_POST['dLine'];

    $updateQueue = "UPDATE jobs SET jobType = '$jobType', jobDescription = '$jobDescription', jobCategory = '$jobCategory', jobResponsibility = '$jobResponsibility', farmLocation = '$farmLocation', dailyRate = '$dailyRate', creationDate = '$creationDate', dateLine = '$dateLine' WHERE jobId = $jobId";

    $updateQueueResult = mysqli_query($conn, $updateQueue);

    if ($updateQueueResult) {
        header("Location: ./Profile.php");
    }
    else {
        echo "Error updating jobs: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Job</title>
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
        <h1>Update Job</h1>
        <form method="post">
            <label for="jType">Job Type</label>
            <input type="text" name="jType" id="jType" placeholder="Job Type" value="<?php echo $previousJobType; ?>" required>

            <label for="jCategory">Job Category</label>
            <select name="jCategory" id="jCategory" required>
                <option <?php if ($previousJobCategory == 'Farming Tools') echo 'selected'; ?>>Farming Tools</option>
                <option <?php if ($previousJobCategory == 'Farming Machinery') echo 'selected'; ?>>Farming Machinery</option>
                <option <?php if ($previousJobCategory == 'Other') echo 'selected'; ?>>Other</option>
            </select>

            <label for="jDescription">Job Description</label>
            <input type="text" name="jDescription" id="jobDescription" placeholder="Job Description" value="<?php echo $previousJobDescription; ?>" required>

            <label for="jResponsibility">Job Responsibility</label>
            <input type="text" name="jResponsibility" id="jResponsibility" placeholder="Job Responsibility" value="<?php echo $previousJobResponsibility; ?>" required>

            <label for="fLocation">Farm Location</label>
            <input type="text" name="fLocation" id="fLocation" placeholder="Farm Location" value="<?php echo $previousFarmLocation; ?>" required>

            <label for="dLine">Date line</label>
            <input type="date" name="dLine" id="dLine" placeholder="Date Line" value="<?php echo $previousDateLine; ?>" required>

            <label for="dRate">Daily Rate</label>
            <input type="number" name="dRate" id="dRate" placeholder="Daily Rate" value="<?php echo $previousDailyRate; ?>" required>
            
            <input type="submit" value="Update" name="submit">
        </form>
        <div class="cancel-button">
            <a href="Profile.php"><button type="button">Cancel</button></a>
        </div>
    </div>
</body>
</html>