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
    $sql = "SELECT * FROM `studentinfo` WHERE t_id = ?";
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
        $email = $row['t_email'];
        $contact = $row['t_contact'];
        $gender = $row['t_gender'];
        $courseId = $row['t_courseid'];
        $batchId = $row['t_batchid'];
        $franchiseId = $row['t_franchiseid'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $studentId = $_POST['studentId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $courseId = $_POST['courseId'];
    $batchNo = $_POST['batchNo'];
    $franchiseId = $_POST['franchiseId'];
    $Id = $_POST['updateid'] ?? '';

    // Use prepared statements to update the record
    $sql = "UPDATE `studentinfo` SET 
    t_name = ?, 
    t_email = ?, 
    t_contact = ?, 
    t_gender = ?, 
    t_courseid = ?, 
    t_batchid = ?, 
    t_franchiseid = ? 
    WHERE t_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $name, $email, $contact, $gender, $courseId, $batchNo, $franchiseId, $studentId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: ./viewStudent.php');
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
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
                <h2 class="text-center">Update Student</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <!-- Add your form fields here based on the previous code -->
                    <!-- ... -->

                    <div class="form-row">
                        <!-- Student ID -->
                        <div class="form-group col-md-6">
                            <label for="studentId" class="form-label">Student ID</label>
                            <input type="text" class="form-control" name="studentId" id="studentId"
                                placeholder="Enter Student ID" value="<?php echo $srno; ?>" required>
                        </div>

                        <!-- Name -->
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                                value="<?php echo $name; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"
                                value="<?php echo $email; ?>" required>
                            <div class="invalid-feedback" id="emailFeedback">
                                Please enter a valid email address in the format test@gmail.com.
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="form-group col-md-6">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="tel" class="form-control" name="contact" id="contact"
                                placeholder="Enter Contact" pattern="[0-9]{10}" value="<?php echo $contact; ?>"
                                required>
                            <div class="invalid-feedback" id="contactFeedback">
                                Please enter a valid 10-digit contact number.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                <?php echo ($gender === 'male') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                <?php echo ($gender === 'female') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                                <?php echo ($gender === 'other') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Course ID -->
                        <div class="form-group col-md-4">
                            <label for="courseId" class="form-label">Course ID</label>
                            <input type="text" class="form-control" name="courseId" id="courseId"
                                placeholder="Enter Course ID" value="<?php echo $courseId; ?>" required>
                        </div>

                        <!-- Batch No -->
                        <div class="form-group col-md-4">
                            <label for="batchNo" class="form-label">Batch No</label>
                            <input type="text" class="form-control" name="batchNo" id="batchNo"
                                placeholder="Enter Batch No" value="<?php echo $batchId; ?>" required>
                        </div>

                        <!-- Franchise ID -->
                        <div class="form-group col-md-4">
                            <label for="franchiseId" class="form-label">Franchise ID</label>
                            <input type="text" class="form-control" name="franchiseId" id="franchiseId"
                                placeholder="Enter Franchise ID" value="<?php echo $franchiseId; ?>" required>
                        </div>
                    </div>
                    <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4"
                        style="width: 200px;">Update Student</button>
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
