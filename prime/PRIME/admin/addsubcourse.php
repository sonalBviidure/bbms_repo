<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start(); // Ensure session_start is called for using $_SESSION

if (isset($_POST['submit'])) {
    $courseName = $_POST['courseName'];
    $subcourseName = $_POST['subcourseName'];
    $Trainer = $_POST['Trainer'];
    $startingDate = $_POST['startingDate'];
    $courseMode = $_POST['courseMode'];
    $courseStatus = $_POST['courseStatus'];
    $courseDuration = $_POST['courseDuration'];

    // Handle file uploads
    
    $subcourseImage = $_FILES["subcourseImage"]["name"];
    $courseSyllabus = $_FILES["courseSyllabus"]["name"];

    // Validate image extension and handle file upload
    $valid_extensions = ["jpg", "jpeg", "png", "pdf"];
    $imageFileType = strtolower(pathinfo($subcourseImage, PATHINFO_EXTENSION));

    if (in_array($imageFileType, $valid_extensions)) {
        $target_dir = "image/";
        $target_subcourseImage = $target_dir . basename($subcourseImage); // Target path for subcourseImage
        $target_courseSyllabus = $target_dir . basename($courseSyllabus); // Target path for courseSyllabus


        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["subcourseImage"]["tmp_name"], $target_subcourseImage) &&
        move_uploaded_file($_FILES["courseSyllabus"]["tmp_name"], $target_courseSyllabus)) {
        // Now you can proceed with database insertion
        $query = "INSERT INTO subcourse (coursename, subcoursename, trainer, subcourseimage, starting_date, syllabus, mode, status, duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $courseName, $subcourseName, $Trainer, $target_subcourseImage, $startingDate, $target_courseSyllabus, $courseMode, $courseStatus, $courseDuration);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<script>alert('Data Inserted Successfully');</script>";
                header('Location: viewsubcourse.php');
                exit; // Important to exit after redirection
            } else {
                echo "<script>alert('Error inserting data');</script>";
                header('Location: viewsubcourse.php');
                exit; // Important to exit after redirection
            }
           
        } else {
            echo "<script>alert('Error preparing statement');</script>";
            header('Location: viewsubcourse.php');
            exit; // Important to exit after redirection
        }
    } else {
        echo "<script>alert('Error uploading files');</script>";
        header('Location: viewsubcourse.php');
        exit; // Important to exit after redirection
    }
} else {
    echo "<script>alert('Only JPG, JPEG, PNG images are allowed');</script>";
    header('Location: viewsubcourse.php');
    exit; // Important to exit after redirection
}
}
// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add SubCourses
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
  <div class="container">
    <h2 class="text-center">Add Sub Course</h2>
    <form class="mt-4" method="POST" enctype="multipart/form-data">
        <div class="form-row sticky-top">
            <div class="form-group col">
                <label for="mainCourse">Main Course:</label>
                <select class="form-control" id="courseName" name="courseName" required>
                                <?php
                                include 'connection.php'; // Include your database connection file

                                // Fetch course names from the database
                                $query = "SELECT t_name FROM course";
                                $result = mysqli_query($con, $query);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['t_name'] . "'>" . $row['t_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
            </div>

        
        </div>


      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="courseMembers">Sub Course:</label>
          <input type="text" class="form-control" id="subcourseName" name="subcourseName" required>
        </div>
        <div class="form-group col">
          <label for="mainCourse">Trainer:</label>
          <input type="text" class="form-control" id="Trainer" name="Trainer" required>
        </div>
        
      </div>

      <div class="form-row">
        <div class="form-group col">
          <label for="courseSyllabus" style="border-radius:5px;">Syllabus:</label>
          <div class="border p-1">
            <input type="file" class="form-control-file" id="courseSyllabus" name="courseSyllabus" >
          </div>
        </div>

        <div class="form-group col">
          <label for="courseImage">Sub Course Image:</label>
          <div class="border p-1" style="border-radius:5px;">
            <input type="file" class="form-control-file" id="subcourseImage" name="subcourseImage" accept="image/*" required>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col">
          <label for="startingDate">Starting Date:</label>
          <input type="date" class="form-control" id="startingDate" name="startingDate" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col">
          <label for="courseStatus">Status:</label>
          <select class="form-control" id="courseStatus" name="courseStatus" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="courseDuration">Duration:</label>
          <select class="form-control" id="courseDuration" name="courseDuration" required>
            <option value="1 Month">1 Month</option>
            <option value="2 Month">2 Month</option>
            <option value="3 Month">3 Month</option>
            <option value="6 Month">6 Month</option>
            <option value="1 Year">1 Year</option>
          </select>
        </div>
        
      </div>

      <div class="form-group col">
        <label for="courseMode">Mode:</label>
        <select class="form-control" id="courseMode" name="courseMode" required>
          <option value="online">Online</option>
          <option value="offline">Offline</option>
        </select>
      </div>

      <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Add Course</button>
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


