<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start(); // Ensure session_start is called for using $_SESSION

if (isset($_POST['submit'])) {
    $subcourseName = $_POST['subcourseName'];
    $stuts=$_POST['courseStatus'];

    // Handle file uploads
    
    $subcourseImage = $_FILES["subcourseImage"]["name"];

    // Validate image extension and handle file upload
    $valid_extensions = ["jpg", "jpeg", "png"];
    $imageFileType = strtolower(pathinfo($subcourseImage, PATHINFO_EXTENSION));

    if (in_array($imageFileType, $valid_extensions)) {
        $target_dir = "image/";
        $subcourseImage = $target_dir . basename($_FILES["subcourseImage"]["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["subcourseImage"]["tmp_name"], $subcourseImage)) {
            // Now you can proceed with database insertion
            $query = "INSERT INTO course (t_name, t_image, status) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "sss", $subcourseName, $subcourseImage, $stuts);

                // Execute the statement
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "<script>alert('Data Inserted Successfully');</script>";
                    header('Location: addcourses.php');
                    exit; // Important to exit after redirection
                } else {
                    echo "<script>alert('Error inserting data');</script>";
                    header('Location: viewcourses.php');
                    exit; // Important to exit after redirection
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing statement');</script>";
                header('Location: viewcourses.php');
                exit; // Important to exit after redirection
            }
        } else {
            echo "<script>alert('Error uploading file');</script>";
            header('Location: viewcourses.php');
            exit; // Important to exit after redirection
        }
    } else {
        echo "<script>alert('Only JPG, JPEG, PNG images are allowed');</script>";
        header('Location: viewcourses.php');
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
        <title>Add Courses
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
    <h2 class="text-center">Add Main Course</h2>
    <form class="mt-4" method="POST" enctype="multipart/form-data" >
        

      <div >
        <div >
          <label for="courseMembers">Main Course:</label>
          <input type="text" class="form-control" id="subcourseName" name="subcourseName" required>
        </div>
        
      </div>

        <div >
          <label for="courseImage">Main Course Image:</label>   
          <div class="border p-1" style="border-radius:5px;">
            <input type="file" class="form-control-file" id="subcourseImage" name="subcourseImage" accept="image/*" required>
          </div>
        </div>
      
      <div>
          <label for="courseStatus">Status:</label>
          <select type="number" class="form-control" id="courseStatus" name="courseStatus" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
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


