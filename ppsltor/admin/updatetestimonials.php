<?php
include 'connection.php';

$Id = $_GET['updateid'] ?? '';

// Check if the ID is valid
if (!is_numeric($Id)) {
    exit;
}

// Fetch data from the database based on the ID
$sql = "SELECT * FROM testimonials WHERE id = $Id";
$result = mysqli_query($con, $sql);

// Check if there is any data available
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $StudentName = $row['studentName'];
    $CourseName = $row['courseName'];
    $StudentImage = $row['studentImage'];
    $TestimonialText = $row['testimonialText']; 
    // You can retrieve other fields similarly
} else {
    echo "<script>alert('Problem in retrieval of data.')</script>";
}

// Check if form is submitted
if (isset($_POST['update'])) {
    // Retrieve form data
    $newStudentName = $_POST['studentName'];
    $newCourseName = $_POST['courseName'];
    $newTestimonialText = $_POST['testimonialText'];

    // Check if any changes are made
    if (
        $newStudentName != $row['studentName'] ||
        $newCourseName != $row['courseName'] ||
        $newTestimonialText != $row['testimonialText'] ||
        !empty($_FILES['studentImage']['name'])
    ) {
        // Update database with new data
        $updateQuery = "UPDATE testimonials SET
            studentName = ?,
            courseName = ?,
            testimonialText = ?,
            studentImage = ?
            WHERE id = ?";

        // Handle image upload
        $targetDir = "image/";
        $targetFilePath = $targetDir . basename($_FILES['studentImage']['name']);

        if (!empty($_FILES['studentImage']['name']) && move_uploaded_file($_FILES['studentImage']['tmp_name'], $targetFilePath)
        ) {
            $studentImage = $targetFilePath;
        } else {
            $studentImage = $row['studentImage'];
        }

        // Prepare and execute the update query with placeholders
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("ssssi", $newStudentName, $newCourseName, $newTestimonialText, $studentImage, $Id);

        if ($stmt->execute()) {
            echo "<script>alert('Data updated successfully.')</script>";
            header("Location: ./Testimonials.php");
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        // No changes made, redirect or display a message
        echo "<script>alert('No changes made.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- css3 -->
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php' ?>
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
                    <h2 class="text-center">Update Testimonials</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form id="editTestimonialForm" method="post" enctype="multipart/form-data">
                                <div class="form-row mt-3">
                                    <div class="form-group col-md-6">
                                        <label for="studentName">Name of Student:</label>
                                        <input type="text" class="form-control" id="studentName" name="studentName"
                                            value="<?php echo $StudentName; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="courseName">Course Name:</label>
                                        <input type="text" class="form-control" id="courseName" name="courseName"
                                            value="<?php echo $CourseName; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="studentImage">Student Image:</label>
                                        <div class="border p-2" style="border-radius:5px;">
                                            <img src="<?php echo $StudentImage; ?>" alt="Student Image"
                                                style="max-width: 100px; max-height: 100px;">
                                            <input type="file" class="form-control-file p-1" id="studentImage"
                                                name="studentImage" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="testimonialText">Testimonial:</label>
                                        <textarea class="form-control" id="testimonialText" name="testimonialText"
                                            rows="6" required><?php echo $TestimonialText; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-primary mt-3" name="update" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
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