<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $batchId = $_POST['batchId'];
    $startDate = $_POST['startDate'];
    $duration = $_POST['duration'];
    $batchName = $_POST['batchName'];
    $endDate = $_POST['endDate'];
    $mode = $_POST['mode'];
    $batchcapacity = $_POST['batchcapacity'];
    $facultyName = $_POST['facultyName'];
    $Franchiseid = $_POST['Franchiseid'];

    // Use prepared statement to avoid SQL injection
    $sql = "INSERT INTO `batch` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $batchId, $batchName, $startDate, $endDate, $facultyName, $duration, $mode, $batchcapacity, $Franchiseid);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('Data Inserted Successfully');</script>";
            header('location:./addbatch.php');
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";

        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";

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
        <title>Add Batch
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
                <h2 class="text-center">Add Batch</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- First Line -->
                            <div class="form-group">
                                <label for="batchId">Batch ID:</label>
                                <input type="text" class="form-control" id="batchId" name="batchId" required>
                            </div>
                            <div class="form-group">
                                <label for="startDate">Starting Date:</label>
                                <input type="date" class="form-control" id="startDate" name="startDate" required>
                            </div>

                            <div class="form-group">
                                <label for="duration">Duration:</label>
                                <select class="form-control" id="duration" name="duration" required>
                                    <option value="1 Month">1 Month</option>
                                    <option value="2 Month">2 Month</option>
                                    <option value="3 Month">3 Month</option>
                                    <option value="4 Month">4 Month</option>
                                    <option value="5 Month">5 Month</option>
                                    <option value="6 Month">6 Month</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="facultyName">Faculty Name:</label>
                                <input type="text" class="form-control" id="facultyName" name="facultyName" required>
                            </div>
                            <div class="form-group">
                                <label for="courseMembers">Batch Capacity:</label>
                                <input type="number" class="form-control" id="courseMembers" name="batchcapacity" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Second Line -->
                            <div class="form-group">
                                <label for="batchName">Batch Name:</label>
                                <input type="text" class="form-control" id="batchName" name="batchName" required>
                            </div>

                            <div class="form-group">
                                <label for="endDate">Ending Date:</label>
                                <input type="date" class="form-control" id="endDate" name="endDate" required>
                            </div>

                            <div class="form-group">
                                <label for="mode">Mode:</label>
                                <select class="form-control" id="mode" name="mode">
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Franchiseid">Franchise Id:</label>
                                <select class="form-control" id="Franchiseid" name="Franchiseid" required>
                                <?php
                                include 'connection.php'; // Include your database connection file

                                // Fetch course names from the database
                                $query = "SELECT t_id FROM franchise";
                                $result = mysqli_query($con, $query);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['t_id'] . "'>" . $row['t_id'] . "</option>";
                                    }
                                }
                                ?>
                            </select>                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3  mt-4" style="width: 200px;">Add Batch</button>
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


