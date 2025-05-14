<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve the 'updateid' from the query string
    $Id = $_GET['updateid'] ?? '';

    // Check if the ID is valid
    if (!is_numeric($Id)) {
        exit; // Invalid ID
    }

    // Construct and execute the SQL query to fetch the record
    $sql = "SELECT * FROM `course` WHERE t_id = ?";
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
        $name = $row['t_name'];
        $class = $row['t_duration'];
        $members = $row['t_member'];
        $image = $row['t_image'];
        $syllabus = $row['t_syllabus'];
        $mode = $row['t_mode'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $courseId = $_POST['courseId'];
    $courseName = $_POST['courseName'];
    $courseMembers = $_POST['courseMembers'];
    $courseDuration = $_POST['courseDuration'];
    $courseMode = $_POST['courseMode'];

    // File upload paths
    $uploadSyllabusDir = 'syllabus/';
    $uploadImageDir = 'image/';

    // Syllabus file upload
    $syllabusFileName = $_FILES['courseSyllabus']['name'];
    $syllabusFilePath = $syllabusFileName ? $uploadSyllabusDir . $syllabusFileName : ''; // Check if file is provided
    if ($syllabusFileName) {
        move_uploaded_file($_FILES['courseSyllabus']['tmp_name'], $syllabusFilePath);
    } else {
        // Retrieve existing syllabus file path from the database
        $sql = "SELECT t_syllabus FROM course WHERE t_id = '$courseId'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $syllabusFilePath = $row['t_syllabus'];
    }

    // Image file upload
    $imageFileName = $_FILES['courseImage']['name'];
    $imageFilePath = $imageFileName ? $uploadImageDir . $imageFileName : ''; // Check if file is provided
    if ($imageFileName) {
        move_uploaded_file($_FILES['courseImage']['tmp_name'], $imageFilePath);
    } else {
        // Retrieve existing image file path from the database
        $sql = "SELECT t_image FROM course WHERE t_id = '$courseId'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $imageFilePath = $row['t_image'];
    }

    // Check if the data needs to be updated
    $updateQuery = "UPDATE course SET
                    t_name = ?, 
                    t_member = ?, 
                    t_duration = ?, 
                    t_mode = ?, 
                    t_syllabus = ?, 
                    t_image = ? 
                    WHERE t_id = ?";

    $stmt = mysqli_prepare($con, $updateQuery);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sissssi", $courseName, $courseMembers, $courseDuration, $courseMode, $syllabusFilePath, $imageFilePath, $courseId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
         echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "Course Details Updated successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./viewcourses.php";
                    }
                });
            });
        </script>';
        
    } else {
         echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Course Details not Added ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./viewcourses.php";
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
                    <h2 class="text-center">Update Course</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="courseId">Course ID:</label>
                                <input type="text" class="form-control" id="courseId" name="courseId"
                                    value="<?php echo $srno; ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="courseName">Course Name:</label>
                                <input type="text" class="form-control" id="courseName" name="courseName"
                                    value="<?php echo $name; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="courseMembers">Course Members:</label>
                                <input type="number" class="form-control" id="courseMembers"
                                    value="<?php echo $members; ?>" name="courseMembers" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="courseDuration">Course Duration:</label>
                                <select class="form-control" id="courseDuration" name="courseDuration"
                                    value="<?php echo $class; ?>" required>
                                    <option value="1 Month">1 Month</option>
                                    <option value="2 Month">2 Month</option>
                                    <option value="3 Month">3 Month</option>
                                    <option value="4 Month">4 Month</option>
                                    <option value="6 Month">6 Month</option>
                                    <option value="1 Year">1 Year</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Course Syllabus -->
                            <div class="form-group col-md-6">
                                <label for="currentCourseSyllabus">Current Course Syllabus:</label>
                                <div class="border p-1">
                                    <?php if (!empty($syllabus)) : ?>
                                    <p>
                                        <strong>Current Syllabus:</strong>
                                        <a href="<?php echo $syllabus; ?>"
                                            target="_blank"><?php echo $syllabus; ?></a>
                                    </p>
                                    <?php else : ?>
                                    <p>No syllabus available</p>
                                    <label for="courseSyllabus">Upload Syllabus:</label>
                                    <?php endif; ?>
                                    <div class="border p-1">
                                        <input type="file" class="form-control-file" id="courseSyllabus"
                                            name="courseSyllabus">
                                    </div>
                                </div>
                            </div>

                            <!-- Course Image -->
                            <div class="form-group col-md-6">
                                <div class="border p-1" style="border-radius:5px;">
                                    <label for="courseImage">Upload Image:</label>
                                    <div class="border p-1" style="border-radius: 5px;">
                                        <img src="image/<?php echo $image; ?>" alt="Member Image"
                                            style="max-width: 100px; max-height: 100px;">
                                        <input type="file" class="form-control-file" id="courseImage" name="courseImage"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="courseMode">Course Mode:</label>
                                <select class="form-control" id="courseMode" name="courseMode" required>
                                    <option value="online" <?php echo ($mode === 'online') ? 'selected' : ''; ?>>Online
                                    </option>
                                    <option value="offline" <?php echo ($mode === 'offline') ? 'selected' : ''; ?>>
                                        Offline</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4"
                            style="width: 200px;">Update Course</button>
                    </form>
                </div>
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