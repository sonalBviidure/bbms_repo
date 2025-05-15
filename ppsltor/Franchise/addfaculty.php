<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $facultyId = $_POST['facultyId'];
    $facultyName = $_POST['facultyName'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $dob = $_POST['dob'];
    $Experience = $_POST['Experience'];
    $Skill1 = $_POST['Skill1'];
    $Skill2 = $_POST['Skill2'];
    $Skill3 = $_POST['Skill3'];
    $Achievement1 = $_POST['Achievement1'];
    $Achievement2 = $_POST['Achievement2'];
    $Achievement3 = $_POST['Achievement3'];
    $maxStudentsHandled = $_POST['maxStudentsHandled'];
    $Franchiseid = $_POST['Franchiseid'];
    $Education = $_POST['Education'];
    $qualification = $_POST['qualification'];

    // Use prepared statement to avoid SQL injection
    $sql = "INSERT INTO `facultyinfo` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $facultyId, $facultyName, $gender, $contactNumber, $dob, $Experience, $Skill1, $Skill2, $Skill3, $Achievement1, $Achievement2, $Achievement3, $maxStudentsHandled, $Education, $qualification, $Franchiseid);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
          echo "<script>alert('Data Inserted Successfully');</script>";
          header('location:./addfaculty.php');
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
                    <h2 class="text-center">Add Faculty</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="facultyId">Faculty ID:</label>
                                <input type="text" class="form-control" id="facultyId" name="facultyId" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facultyName">Name:</label>
                                <input type="text" class="form-control" id="facultyName" name="facultyName" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center">
                            <!-- Gender -->
                            <div class="form-group col-md-6 mb-3">
                                <label class="form-label d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                        checked required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                                        required>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="contactNumber">Contact Number:</label>
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Date of Birth -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>

                            <!-- Experience -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="Experience">Experience:</label>
                                <select class="form-control" id="Experience" name="Experience" required>
                                    <option value="fresher">Fresher</option>
                                    <option value="6 Month">6 Month</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="3 Year">3 Year</option>
                                    <option value="8 Year">8 Year</option>
                                    <option value="6 Year">6 Year</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Skill1">Skill1:</label>
                                <input type="text" class="form-control" id="Skill1" name="Skill1" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="Skill2">Skill2:</label>
                                <input type="text" class="form-control" id="Skill2" name="Skill2" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="Skill3">Skill3:</label>
                                <input type="text" class="form-control" id="Skill3" name="Skill3" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Achievement1">Achievement1:</label>
                                <input type="text" class="form-control" id="Achievement1" name="Achievement1" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="Achievement2">Achievement2:</label>
                                <input type="text" class="form-control" id="Achievement2" name="Achievement2" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="Achievement3">Achievement3:</label>
                                <input type="text" class="form-control" id="Achievement3" name="Achievement3" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Education">Education:</label>
                                <select class="form-control" id="Education" name="Education" required>
                                    <option value="B.E">B.E</option>
                                    <option value="B.A.">B.A.</option>
                                    <option value="B.Sc.">B.Sc.</option>
                                    <option value="B.Ed.">B.Ed.</option>
                                    <option value="B.Sc.-B.Ed.">B.Sc.-B.Ed.</option>
                                    <option value="M.A.">M.A.</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="qualification">Qualification:</label>
                                <select class="form-control" id="qualification" name="qualification" required>
                                    <option value="B.E (Computer Engg)">B.E (Computer Engg)</option>
                                    <option value="B.A. (Bachelor of Arts)">B.A. (Bachelor of Arts)</option>
                                    <option value="B.Sc. (Bachelor of Science)">B.Sc. (Bachelor of Science)</option>
                                    <option value="B.Ed. (Bachelor of Education)">B.Ed. (Bachelor of Education)</option>
                                    <option value="B.Sc.-B.Ed. Integrated Course">B.Sc.-B.Ed. Integrated Course</option>
                                    <option value="M.A. in English*">M.A. in English*</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="maxStudentsHandled">Maximum Students Handled:</label>
                                <input type="number" class="form-control" id="maxStudentsHandled"
                                    name="maxStudentsHandled" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Franchiseid">Franchise Id</label>
                                <input type="number" class="form-control" id="Franchiseid" name="Franchiseid" required>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3  mt-4"
                            style="width: 200px;">Add Faculty</button>
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