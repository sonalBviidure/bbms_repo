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
    $sql = "SELECT * FROM `agreementdetails` WHERE t_id = ?";
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
                $partyAName = $row['t_partyaname'];
                $partyBName = $row['t_partybname'];
                $agreementCopy = $row['t_agreementcopypdf'];
                $startDate = $row['t_startdate'];
                $endDate = $row['t_enddate'];
                $feeOfJoining = $row['t_feeofjoining'];
                $revenueAPercentage = $row['t_revenueofA'];
                $revenueBPercentage = $row['t_revenueofB'];
                $renewalDate = $row['t_renewaldate'];
                $partyBContact = $row['t_partybcontact'];
                $partyBEmail = $row['t_partybemail'];
                $partyBPhoto = $row['t_partybphoto'];
                $franchiseId = $row['t_franchiseid'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $agreementId = $_POST['agreementId'];
    $partyA = $_POST['partyA'];
    $partyB = $_POST['partyB'];
    $agreementCopy = $_FILES['agreementPdf']['name']; // Assuming you have a field for PDF in the form
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $joiningFee = $_POST['joiningFee'];
    $revenueAPercentage = $_POST['revenueAPercentage'];
    $revenueBPercentage = $_POST['revenueBPercentage'];
    $revenueDate = $_POST['revenueDate'];
    $partyBContact = $_POST['partyBContact'];
    $partyBEmail = $_POST['partyBEmail'];
    $partyBPhoto = $_FILES['partybimage']['name']; // Assuming you have a field for image in the form
    $franchiseId = $_POST['Franchiseid'];
    $Id = $_POST['updateid'] ?? '';

    // Use prepared statements to update the record
    $sql = "UPDATE agreementdetails SET 
    t_partyaname = ?, 
    t_partybname = ?, 
    t_agreementcopypdf = ?, 
    t_startdate = ?, 
    t_enddate = ?, 
    t_feeofjoining = ?, 
    t_revenueofA = ?, 
    t_revenueofB = ?, 
    t_renewaldate = ?, 
    t_partybcontact = ?, 
    t_partybemail = ?, 
    t_partybphoto = ?, 
    t_franchiseid = ? 
    WHERE t_id = ?";
$stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssssssi", $partyA, $partyB, $agreementCopy, $startDate, $endDate, $joiningFee, $revenueAPercentage, $revenueBPercentage, $revenueDate, $partyBContact, $partyBEmail, $partyBPhoto, $franchiseId, $agreementId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "Your Agreement Details Updated successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./viewagreement.php";
                    }
                });
            });
        </script>';
        } else {
             echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Agreement Details not Updated ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./viewagreement.php";
                    }
                });
            });
        </script>';
        }
    } else {
          echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Agreement Details not Updated ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./viewagreement.php";
                    }
                });
            });
        </script>';
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

<!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
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
                <h2 class="text-center">Update Agreement</h2>
                <form action="#" method="post" enctype="multipart/form-data">
            <!-- Agreement ID -->
            <div class="form-group">
              <label for="agreementId">Agreement ID:</label>
              <input type="text" class="form-control" id="agreementId" name="agreementId" value="<?php echo $srno; ?>" placeholder="Enter ID">
            </div>

            <div class="form-row">
              <!-- Party A -->
              <div class="form-group col-md-6">
                <label for="partyA">Party A:</label>
                <input type="text" class="form-control" id="partyA" name="partyA" value="<?php echo $partyAName; ?>" placeholder="Enter a Name">
              </div>

              <!-- Party B -->
              <div class="form-group col-md-6">
                <label for="partyB">Party B:</label>
                <input type="text" class="form-control" id="partyB" name="partyB" value="<?php echo $partyBName; ?>"  placeholder="Enter a Name" required>
              </div>
            </div>

            <!-- Agreement Copy PDF -->
            <div class="form-group">
              <label for="agreementPdf">Agreement Copy PDF:</label>
              <div class="border p-1" style="border-radius:5px;">
                <input type="file" class="form-control-file" id="agreementPdf" value="<?php echo $agreementCopy; ?>" name="agreementPdf" accept=".pdf" required>
              </div>
            </div>

            <div class="form-row">
              <!-- Start Date -->
              <div class="form-group col-md-6">
                <label for="startDate">Start Date:</label>
                <input type="date" class="form-control" id="startDate" value="<?php echo $startDate; ?>" name="startDate" required>
              </div>

              <!-- End Date -->
              <div class="form-group col-md-6">
                <label for="endDate">End Date:</label>
                <input type="date" class="form-control" id="endDate" value="<?php echo $endDate; ?>" name="endDate" required>
              </div>
            </div>
            <!-- Fee of Joining -->
            <div class="form-group">
              <label for="joiningFee">Fee of Joining:</label>
              <input type="number" class="form-control" id="joiningFee" value="<?php echo $feeOfJoining; ?>" name="joiningFee" required>
            </div>

            <div class="form-row">
              <!-- Revenue A Percentage -->
              <div class="form-group col-md-6">
                <label for="revenueAPercentage">Revenue A Percentage:</label>
                <input type="number" class="form-control" id="revenueAPercentage" value="<?php echo $revenueAPercentage; ?>" name="revenueAPercentage" required>
              </div>

              <!-- Revenue B Percentage -->
              <div class="form-group col-md-6">
                <label for="revenueBPercentage">Revenue B Percentage:</label>
                <input type="number" class="form-control" id="revenueBPercentage" value="<?php echo $revenueBPercentage; ?>" name="revenueBPercentage" required>
              </div>
            </div>

            <!-- Revenue Date -->
            <div class="form-group">
              <label for="revenueDate">Revenue Date:</label>
              <input type="date" class="form-control" id="revenueDate" value="<?php echo $renewalDate; ?>" name="revenueDate" required>
            </div>
            <div class="form-row">
              <!-- Party B Name -->
              <div class="form-group col-md-6">
                <label for="partybimage">Party B Image:</label>
                <div class="border p-1">
                  <input type="file" class="form-control-file" id="partybimage" value="<?php echo $partyBPhoto; ?>" name="partybimage" accept=".jpg,.jpeg,.png" required>
                </div>
              </div>

              <!-- Party B Contact -->
              <div class="form-group col-md-6">
                <label for="partyBContact">Party B Contact:</label>
                <input type="text" class="form-control" id="partyBContact" name="partyBContact" value="<?php echo $partyBContact; ?>" placeholder="Enter a 10 digit number" required>
              </div>
            </div>
            <div class="form-row">
              <!-- Party B Name -->
              <div class="form-group col-md-6">
                <label for="partyBEmail">Party B Email:</label>
                <input type="email" class="form-control" id="partyBEmail" name="partyBEmail" value="<?php echo $partyBEmail; ?>" placeholder="Enter an E-mail">
              </div>

              <!-- Party B Contact -->
              <div class="form-group col-md-6">
                <label for="Franchiseid">Franchise Id:</label>
                <input type="text" class="form-control" id="Franchiseid" name="Franchiseid" value="<?php echo $franchiseId; ?>" placeholder="Enter an Franchise Id">
              </div>
            </div>
            <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4"
                        style="width: 200px;">Update Agreement</button>
          </form>
            </div>

        </div>

    </div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>


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