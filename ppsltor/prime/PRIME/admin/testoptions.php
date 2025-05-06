<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start(); // Ensure session_start is called for using $_SESSION

if (isset($_POST['submit'])) {
    // Your form processing logic here
}

// Fetch course names from the 'course' table
$query = "SELECT t_id, t_name FROM course";
$result = mysqli_query($con, $query);
$options = ''; // Initialize options variable

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= '<option value="' . $row['t_id'] . '">' . $row['t_name'] . '</option>';
    }
} else {
    $options .= '<option value="">No courses available</option>';
}

// Close the database connection
mysqli_close($con);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags, CSS links, etc. -->
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>
    <?php require 'sidebar.php'?>
    <div id="content" style="background-color:white;">
        <div class="top-navbar">
            <!-- Navbar content -->
        </div>
        <div class="main-content">
            <div class="container">
                <h2 class="text-center">Add Sub Course</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="mainCourse">Main Course:</label>
                            <select class="form-control" id="mainCourseSelect" name="mainCourse" required>
                                <option value="">Select Main Course</option>
                                <?php echo $options; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="courseMembers">Sub Course:</label>
                            <input type="number" class="form-control" id="courseMembers" name="trainer" required>
                        </div>
                        <div class="form-group col">
                            <label for="trainer">Trainer:</label>
                            <input type="text" class="form-control" id="trainer" name="trainer" required>
                        </div>
                    </div>
                    <!-- Other form fields and buttons -->
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
<!-- Your custom JavaScript code -->
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
