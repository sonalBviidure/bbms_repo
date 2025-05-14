<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve the 'updateid' from the query string
    $Id = $_GET['updateid'] ?? '';

    // Check if the ID is valid
    if (!is_numeric($Id)) {
        // echo "Invalid ID";
        exit;
    }

    // Construct and execute the SQL query to fetch the record
    $sql = "SELECT * FROM `franchise` WHERE t_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $Id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the record
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo "Record not found";
            exit;
        }

        $srno = $row['t_id'];
        $name = $row['t_ownername'];
        $email = $row['t_email'];
        $contact = $row['t_contact'];
        $image = $row['t_image'];
        $firmName = $row['t_frimname'];
        $state = $row['t_state'];
        $district = $row['t_district'];
        $subdistrict = $row['t_taluka'];
        $location = $row['t_location'];
        $pincode = $row['t_pincode'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $franchiseId = $_POST['id'];
    $franchiseName = $_POST['name'];
    $franchiseEmail = $_POST['email'];
    $franchiseContact = $_POST['contact'];
    $franchiseImage = $_FILES['franchiseImage']['name']; // Assuming you have a field for image in the form
    $firmName = $_POST['franchiseName'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $subdistrict = $_POST['subdistrict'];
    $location = $_POST['village'];
    $pincode = $_POST['zip'];
    $Id = $_POST['updateid'] ?? '';

    // Use prepared statements to update the record
    $sql = "UPDATE `franchise` SET 
    t_ownername = ?, 
    t_email = ?, 
    t_contact = ?, 
    t_image = ?, 
    t_frimname = ?, 
    t_state = ?, 
    t_district = ?, 
    t_taluka = ?, 
    t_location = ?, 
    t_pincode = ? 
    WHERE t_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssssi", $franchiseName, $franchiseEmail, $franchiseContact, $franchiseImage, $firmName, $state, $district, $subdistrict, $location, $pincode, $franchiseId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: ./viewfranchise.php');
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
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
                            <a class="nav-link" href="#">
                                <span class="material-icons">person</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main-content">

    <div class="container card shadow p-3 bg-white rounded">
                <h2 class="text-center">Update Franchise</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id">Franchise Id:</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $srno; ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name">Franchise Owner Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="contact">Contact No:</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="contact" name="contact" placeholder="Phone Number" value="<?php echo $contact; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="franchiseImage">Franchise Image:</label>
                            <div class="border p-1" style="border-radius:5px;">
                                <input type="file" class="form-control-file" id="franchiseImage" name="franchiseImage" accept="image/*" value="<?php echo $image; ?>" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="franchiseName">Frim Name:</label>
                            <input type="text" class="form-control" id="franchiseName" name="franchiseName" value="<?php echo $firmName; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="state">State:</label>
                            <select class="form-control" id="state" name="state" onchange="loadDistricts()" value="<?php echo $state; ?>" required>
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
                            <select class="form-control" id="district" name="district" onchange="loadSubDistricts()" value="<?php echo $district; ?>" required>
                                <option value="">Select District</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="subdistrict">Subdistrict:</label>
                            <select class="form-control" id="subdistrict" name="subdistrict" value="<?php echo $subdistrict; ?>" required>
                                <option value="">Select Sub District</option>
                                  </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="village">Village:</label>
                            <input type="text" class="form-control" id="village" name="village" value="<?php echo $location; ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pincode">Pincode:</label>
                            <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $pincode; ?>" required>
                        </div>
                    </div>

                    <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Update Franchise</button>
                </form>
            </div>

        </div>

    </div>
</div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/dist.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function() {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });

        });
    </script>
</body>

</html>