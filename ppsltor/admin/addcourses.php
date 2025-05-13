<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start(); // Ensure session_start is called for using $_SESSION

if (isset($_POST['submit'])) {
    $courseId = $_POST['courseId'];
    $courseName = $_POST['courseName'];
    $courseMembers = $_POST['courseMembers'];
    $courseDuration = $_POST['courseDuration'];
    $courseImage = $_FILES["courseImage"]['name'];
    $courseSyllabus = $_FILES["courseSyllabus"]['name'];  
    $courseMode = $_POST['courseMode'];  

    // Validate image extension
    $validate_img_extension = in_array($_FILES["courseImage"]["type"], ["image/jpg", "image/jpeg", "image/png"]);

    if ($validate_img_extension) {
        // Use prepared statement to avoid SQL injection
        $query = "INSERT INTO course VALUES (?, ?, ?, ?, ?, ?, ?, 1)";

        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $courseId, $courseName, $courseDuration,$courseMembers, $courseImage, $courseSyllabus, $courseMode);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                move_uploaded_file($_FILES["courseImage"]["tmp_name"], "image/" . $_FILES["courseImage"]["name"]);
                move_uploaded_file($_FILES["courseSyllabus"]["tmp_name"], "syllabus/" . $_FILES["courseSyllabus"]["name"]);

                 echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "New Course Added  successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./addcourses.php";
                    }
                });
            });
        </script>';
            } else {
                echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error!",
                    text: " Course Not Added ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./addcourses.php";
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
                    title: "Error!",
                    text: " Course Not Added ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./addcourses.php";
                    }
                });
            });
        </script>';
        }
    } else { echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error!",
                    text: " Only PNG, JPG, JPEG Images are allowed ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./addcourses.php";
                    }
                });
            });
        </script>';
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

  <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
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
                    <h2 class="text-center">Add Course</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="courseId">Course ID:</label>
                                <input type="text" class="form-control" id="courseId" name="courseId" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="courseName">Course Name:</label>
                                <input type="text" class="form-control" id="courseName" name="courseName" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="courseMembers">Course Members:</label>
                                <input type="number" class="form-control" id="courseMembers" name="courseMembers"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="courseDuration">Course Duration:</label>
                                <select class="form-control" id="courseDuration" name="courseDuration" required>
                                    <option value="1 Month">1 Month</option>
                                    <option value="2 Month">2 Month</option>
                                    <option value="1 Month">3 Month</option>
                                    <option value="2 Month">4 Month</option>
                                    <option value="1 Month">6 Month</option>
                                    <option value="2 Month">1 Year</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Course Syllabus -->
                            <div class="form-group col-md-6">
                                <label for="courseSyllabus" style="border-radius:5px;">Course Syllabus:</label>
                                <div class="border p-1">
                                    <input type="file" class="form-control-file" id="courseSyllabus"
                                        name="courseSyllabus">
                                </div>
                            </div>

                            <!-- Course Image -->
                            <div class="form-group col-md-6">
                                <label for="courseImage">Course Image:</label>
                                <div class="border p-1" style="border-radius:5px;">
                                    <input type="file" class="form-control-file" id="courseImage" name="courseImage"
                                        accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="courseMode">Course Mode:</label>
                            <select class="form-control" id="courseMode" name="courseMode" required>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3  mt-4"
                            style="width: 200px;">Add Course</button>
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