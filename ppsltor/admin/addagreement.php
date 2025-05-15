<?php
include 'connection.php';
session_start();

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $agreementId = $_POST['agreementId'];
    $partyA = $_POST['partyA'];
    $partyB = $_POST['partyB'];
    $agreementPdf = $_FILES["agreementPdf"]['name'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $joiningFee = $_POST['joiningFee'];
    $revenueAPercentage = $_POST['revenueAPercentage'];
    $revenueBPercentage = $_POST['revenueBPercentage'];
    $revenueDate = $_POST['revenueDate'];
    $partyBImage = $_FILES["partybimage"]['name']; // Corrected the file input name
    $partyBContact = $_POST['partyBContact'];
    $partyBEmail = $_POST['partyBEmail'];
    $Franchiseid = $_POST['Franchiseid'];

    $validate_img_extension = in_array($_FILES["partybimage"]["type"], ["image/jpg", "image/jpeg", "image/png"]);

    if ($validate_img_extension) {
        $sql = "INSERT INTO `agreementdetails` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $agreementId, $partyA, $partyB, $agreementPdf, $startDate, $endDate, $joiningFee, $revenueAPercentage, $revenueBPercentage, $revenueDate, $partyBContact, $partyBEmail, $partyBImage, $Franchiseid);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            move_uploaded_file($_FILES["partybimage"]["tmp_name"], "image/" . $_FILES["partybimage"]["name"]);
            move_uploaded_file($_FILES["agreementPdf"]["tmp_name"], "syllabus/" . $_FILES["agreementPdf"]["name"]);

             echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "Agreement Details Added successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./addagreement.php";
                    }
                });
            });
        </script>';
        } else {
            echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Agreement Details not Added ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./addagreement.php";
                    }
                });
            });
        </script>';
        }

        mysqli_stmt_close($stmt);
    } else {
         echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Only PNG, JPG, JPEG Images are allowed",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./addagreement.php";
                    }
                });
            });
        </script>';
    }
}

mysqli_close($con);
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Add Agreement
		</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	
	  <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
	
	<!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
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
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
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
                <h2 class="text-center">Add Agreement</h2>
                <form action="#" method="post" enctype="multipart/form-data">
                    <!-- Agreement ID -->
                    <div class="form-group">
                        <label for="agreementId">Agreement ID:</label>
                        <input type="text" class="form-control" id="agreementId" name="agreementId" placeholder="Enter ID">
                    </div>

                    <div class="form-row">
                        <!-- Party A -->
                        <div class="form-group col-md-6">
                            <label for="partyA">Party A:</label>
                            <input type="text" class="form-control" id="partyA" name="partyA" placeholder="Enter a Name">
                        </div>

                        <!-- Party B -->
                        <div class="form-group col-md-6">
                            <label for="partyB">Party B:</label>
                            <input type="text" class="form-control" id="partyB" name="partyB" placeholder="Enter a Name" required>
                        </div>
                    </div>

                    <!-- Agreement Copy PDF -->
                    <div class="form-group">
                        <label for="agreementPdf">Agreement Copy PDF:</label>
                        <div class="border p-1" style="border-radius:5px;">
                            <input type="file" class="form-control-file" id="agreementPdf" name="agreementPdf" accept=".pdf" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Start Date -->
                        <div class="form-group col-md-6">
                            <label for="startDate">Start Date:</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>

                        <!-- End Date -->
                        <div class="form-group col-md-6">
                            <label for="endDate">End Date:</label>
                            <input type="date" class="form-control" id="endDate" name="endDate" required>
                        </div>
                    </div>
                    <!-- Fee of Joining -->
                    <div class="form-group">
                        <label for="joiningFee">Fee of Joining:</label>
                        <input type="number" class="form-control" id="joiningFee" name="joiningFee" required>
                    </div>

                    <div class="form-row">
                        <!-- Revenue A Percentage -->
                        <div class="form-group col-md-6">
                            <label for="revenueAPercentage">Revenue A Percentage:</label>
                            <input type="number" class="form-control" id="revenueAPercentage" name="revenueAPercentage" required>
                        </div>

                        <!-- Revenue B Percentage -->
                        <div class="form-group col-md-6">
                            <label for="revenueBPercentage">Revenue B Percentage:</label>
                            <input type="number" class="form-control" id="revenueBPercentage" name="revenueBPercentage" required>
                        </div>
                    </div>

                    <!-- Revenue Date -->
                    <div class="form-group">
                        <label for="revenueDate">Revenue Date:</label>
                        <input type="date" class="form-control" id="revenueDate" name="revenueDate" required>
                    </div>
                    <div class="form-row">
                        <!-- Party B Name -->
                        <div class="form-group col-md-6">
                            <label for="partybimage">Party B Image:</label>
                            <div class="border p-1">
                                <input type="file" class="form-control-file" id="partybimage" name="partybimage" accept=".jpg,.jpeg,.png" required>
                            </div>
                        </div>

                        <!-- Party B Contact -->
                        <div class="form-group col-md-6">
                            <label for="partyBContact">Party B Contact:</label>
                            <input type="text" class="form-control" id="partyBContact" name="partyBContact" placeholder="Enter a 10 digit number" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Party B Name -->
                        <div class="form-group col-md-6">
                            <label for="partyBEmail">Party B Email:</label>
                            <input type="email" class="form-control" id="partyBEmail" name="partyBEmail" placeholder="Enter an E-mail">
                        </div>

                        <!-- Party B Contact -->
                        <div class="form-group col-md-6">
                            <label for="Franchiseid">Franchise Id:</label>
                            <input type="text" class="form-control" id="Franchiseid" name="Franchiseid" placeholder="Enter an Franchise Id">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3  mt-4" style="width: 200px;">Add Agreement</button>
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
  
  
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });

   
</script>
  
  </body>
  
  </html>


