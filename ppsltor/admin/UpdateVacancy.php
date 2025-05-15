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
    $sql = "SELECT * FROM `job_vacancies` WHERE id = ?";
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

        $srno = $row['id'];
            $name = $row['job_title'];
            $skills = $row['skills_required'];
            $location = $row['location'];
            $salary = $row['salary'];
            $lastDate = $row['late_date'];

    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $jobTitle = $_POST['jobTitle'] ?? '';
    $skills = $_POST['skills'] ?? '';
    $location = $_POST['location'] ?? '';
    $salary = $_POST['salary'] ?? '';
    $lastDate = $_POST['lastDate'] ?? '';
    $Id = $_POST['updateid'] ?? '';

    $sql = "UPDATE `job_vacancies` SET 
    job_title = ?, 
    skills_required = ?, 
    location = ?, 
    salary = ?, 
    late_date = ? 
    WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $jobTitle, $skills, $location, $salary, $lastDate, $Id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: ./viewjobvacancy.php');
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
                    <h2 class="text-center">Update Job Vacancy</h2>
                    <form action="" method="POST" class="mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jobTitle" class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" value="<?php echo $name; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skills" class="form-label">Basic Skills Required</label>
                                    <textarea class="form-control" id="skills" name="skills" value="" rows="5" required><?php echo $skills; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastDate" class="form-label">Last Date to Apply</label>
                                    <input type="date" class="form-control" id="lastDate" name="lastDate" value="<?php echo $lastDate; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                            <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4"
                                style="width: 200px;">Update Job Vacancy</button>
                        </div>
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