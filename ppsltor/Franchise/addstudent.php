<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $studentId = $_POST['studentId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $courseId = $_POST['courseId'];
    $batchNo = $_POST['batchNo'];
    $franchiseId = $_POST['franchiseId'];
    
    // Use prepared statement to avoid SQL injection
    $sql = "INSERT INTO `studentinfo` VALUES (?, ?, ?, ?, ?, ?, ?,?, 1)";
    
    $stmt = mysqli_prepare($con, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "issssiii", $studentId, $name, $email, $contact, $gender, $courseId, $batchNo, $franchiseId);
    
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
          
            header('location:./addstudent.php');
        } else {
            echo 'Error: ' . mysqli_error($con) . '';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <b>Error in prepared statement: ' . mysqli_error($con) . '</b>
              </div>';
    }
}

// Close the database connection
mysqli_close($con);
?>



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
        <link rel="stylesheet" href="css/style.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	
	
	
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
                         <h2 class="text-center">Add Student</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <!-- Student ID -->
                            <div class="form-group col-md-6">
                                <label for="studentId" class="form-label">Student ID</label>
                                <input type="text" class="form-control" name="studentId" id="studentId"
                                    placeholder="Enter Student ID" required>
                            </div>

                            <!-- Name -->
                            <div class="form-group col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                                    required>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Email -->
                            <div class="form-group col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Email" required>
                                <div class="invalid-feedback" id="emailFeedback">
                                    Please enter a valid email address in the format test@gmail.com.
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="form-group col-md-6">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="tel" class="form-control" name="contact" id="contact"
                                    placeholder="Enter Contact" pattern="[0-9]{10}" required>
                                <div class="invalid-feedback" id="contactFeedback">
                                    Please enter a valid 10-digit contact number.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                    checked required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                    required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                                    required>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Course ID -->
                            <div class="form-group col-md-4">
                                <label for="courseId" class="form-label">Course ID</label>
                                <input type="text" class="form-control" name="courseId" id="courseId"
                                    placeholder="Enter Course ID" required>
                            </div>

                            <!-- Batch No -->
                            <div class="form-group col-md-4">
                                <label for="batchNo" class="form-label">Batch No</label>
                                <input type="text" class="form-control" name="batchNo" id="batchNo"
                                    placeholder="Enter Batch No" required>
                            </div>

                            <!-- Franchise ID -->
                            <div class="form-group col-md-4">
                                <label for="franchiseId" class="form-label">Franchise ID</label>
                                <input type="text" class="form-control" name="franchiseId" id="franchiseId"
                                    placeholder="Enter Franchise ID" required>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3  mt-4"
                            style="width: 200px;">Add Student</button>

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