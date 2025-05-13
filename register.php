<?php
require 'connection.php';

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $subdistrict = $_POST["subdistrict"];
    $village = $_POST["village"];
    $pincode = $_POST["pincode"];

    // Validate and sanitize input (you should enhance this based on your requirements)
    $firstName = mysqli_real_escape_string($con, $firstName);
    $middleName = mysqli_real_escape_string($con, $middleName);
    $lastName = mysqli_real_escape_string($con, $lastName);
    $contactNumber = mysqli_real_escape_string($con, $contactNumber);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
    $state = mysqli_real_escape_string($con, $state);
    $district = mysqli_real_escape_string($con, $district);
    $subdistrict = mysqli_real_escape_string($con, $subdistrict);
    $village = mysqli_real_escape_string($con, $village);
    $pincode = mysqli_real_escape_string($con, $pincode);

    
    // SQL query to insert data into the database
    $sql = "INSERT INTO registration VALUES ('','$firstName', '$middleName', '$lastName', '$contactNumber', '$email', '$password', '$state', '$district', '$subdistrict', '$village', '$pincode')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Registration successful')</script>";
        header('location:default.php');
    } else {
        echo "<script>alert('Some Error .Try Again !')</script>";
        header('location:register.php');
    }
}

// Close the database connection (you should do this at the end of your script)
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Registration Page</title>

    <!-- Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/register.css">
</head>

<body>

    <a href="default.php" class="back-arrow text-center"><i class="fas fa-arrow-left"></i></a>
    <div class="registration-container container">
        <form action="register.php" method="post" enctype="multipart/form-data">
    <h3 class="text-center">Register Now!</h3>
    <div class="form-row row mt-5 mb-3">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="middleName" placeholder="Middle Name">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-row row mb-3">
                <div class="form-group col-md-6">
                    <input type="tel" class="form-control" name="contactNumber" placeholder="Contact Number" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row row mb-3">
                <div class="form-group col-md-12">
                    <input type="password" class="form-control" name="password" placeholder="Create Password" required>
                </div>
            </div>

            <div class="form-row row mb-3">
                <div class="form-group col-md-4">
                    <select class="form-control" id="state" name="state" onchange="loadDistricts()" required>
                        <option value="">Select State</option>
                        <?php
                        require 'connection.php';
                        $sql = "SELECT id, state_name FROM states ORDER BY state_name";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id']."'>".$row['state_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select id="district" name="district" class="form-control" onchange="loadSubDistricts()">
                    <option value="">Select District</option></select>
                </div>
                <div class="form-group col-md-4">
                    <select id="subdistrict" name="subdistrict" class="form-control">
                    <option value="">Select Sub District</option>
                    </select>
                </div>
            </div>
            <div class="form-row row mb-3">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="village"  id="village" placeholder="Village" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" required>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/dist.js"></script>
</body>

</html>