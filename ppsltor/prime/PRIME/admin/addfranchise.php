<?php
include 'connection.php';
session_start(); // Start the session

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $franchiseImage = $_FILES["franchiseImage"]['name'];
    $franchiseName = $_POST['franchiseName'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $subdistrict = $_POST['subdistrict'];
    $village = $_POST['village'];
    $pincode = $_POST['zip'];

    // Validate image extension
    $validate_img_extension = in_array($_FILES["franchiseImage"]["type"], ["image/jpg", "image/jpeg", "image/png"]);

    if ($validate_img_extension) {
        // Check if image already exists
        if (file_exists("image/" . $_FILES["franchiseImage"]["name"])) {
            $store = $_FILES["franchiseImage"]["name"];
            $_SESSION['status'] = "Image already exists: $store";
            header('Location: viewfranchise.php');
        } else {
            // Use prepared statement to avoid SQL injection
            $sql = "INSERT INTO `franchise` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

            $stmt = mysqli_prepare($con, $sql);
            $status=1;
            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "sssssssssssi", $id, $name, $email, $contact, $franchiseImage, $franchiseName, $state, $district, $subdistrict, $village, $pincode,$status);

                // Execute the statement
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    move_uploaded_file($_FILES["franchiseImage"]["tmp_name"], "image/" . $_FILES["franchiseImage"]["name"]);
                    $_SESSION['success'] = "Franchise Added";
                    header('Location:./addfranchise.php');
                } else {
                    $_SESSION['success'] = "Franchise Not Added";
                    header('Location: ./addfranchise.php');
                }

                mysqli_stmt_close($stmt);
            } else {
                $_SESSION['status'] = "Error in prepared statement: " . mysqli_error($con);
                header('Location: ./addfranchise.php');
            }
        }
    } else {
        $_SESSION['status'] = "Only PNG, JPG, JPEG Images are allowed";
        header('Location: ./addfranchise.php');
    }
}

// Close the database connection
mysqli_close($con);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Add Franchise
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>




    <div class="wrapper">


        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
        <!-- Page Content  -->
        <div id="content" style="background-color:white;">

            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>

                        <a class="navbar-brand" href="#"> Dashboard </a>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                            id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">
                                    <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #f9fafb;"></i>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2 class="text-center">Add Franchise</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id">Franchise Id:</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name">Franchise Owner Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contact">Contact No:</label>
                                <div class="input-group">
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="franchiseImage">Franchise Image:</label>
                                <div class="border p-1" style="border-radius:5px;">
                                    <input type="file" class="form-control-file" id="franchiseImage"
                                        name="franchiseImage" accept="image/*" required>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="franchiseName">Frim Name:</label>
                                <input type="text" class="form-control" id="franchiseName" name="franchiseName"
                                    required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="state">State:</label>
                                <select class="form-control" id="state" name="state" onchange="loadDistricts()"
                                    required>
                                    <option value="">Select State</option>
                                    <option value="AndraPradesh">Andhra Pradesh</option>
                                    <option value="ArunachalPradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="HimachalPradesh">HimachalPradesh</option>
                                    <option value="JammuKashmir">JammuKashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="MadhyaPradesh">MadhyaPradesh</option>
                                    <option value="Sehore">Sehore</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="TamilNadu">TamilNadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="UttarPradesh">UttarPradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="WestBengal">WestBengal</option>
                                    <option value="AndamanNicobar">AndamanNicobar</option>
                                    <option value="DamanDiu">DamanDiu</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                </select>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="district">District:</label>
                                <select class="form-control" id="district" name="district" onchange="loadSubDistricts()"
                                    required></select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="subdistrict">Subdistrict:</label>
                                <select id="subdistrict" name="subdistrict" class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="village">Village:</label>
                                <input type="text" class="form-control" id="village" name="village" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="pincode">Pincode:</label>
                                <input type="text" class="form-control" id="zip" name="zip" required>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3  mt-4"
                            style="width: 200px;">Add Franchise</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/dist.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });

    });
    </script>

</body>

</html>