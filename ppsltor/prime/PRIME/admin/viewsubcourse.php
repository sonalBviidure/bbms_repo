<?php
include 'connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course_id'])) {
    $courseId = $_POST['course_id'];
    $status = isset($_POST['status']) && $_POST['status'] == 'Active' ? 1 : 0; // Set status based on checkbox
    
    // Update status in the database
    $updateSql = "UPDATE subcourse SET status = $status WHERE id = $courseId";
    $updateResult = mysqli_query($con, $updateSql);
    if (!$updateResult) {
        echo '<div class="alert alert-danger" role="alert">Error updating status</div>';
    }
}

// Fetch courses data
$sql = "SELECT * FROM course";
$result = mysqli_query($con, $sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Sub Course</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Google Material Icon -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
          <h2 class="text-center">View Sub Courses</h2>
          <div class="text-center mb-3">
                        <!-- Add a button for downloading data as Excel -->
                        <a href="download_subcourse.php" class="btn btn-success">Download as Excel</a>
                    </div>
          <table class="table table-striped table-bordered mt-10" id="myTable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Sub Course Name</th>
                <th scope="col">Trainer</th>
                <th scope="col">Starting Date</th>
                <th scope="col">Syllabus</th>
                <th scope="col">Course Image</th>
                <th scope="col">Status</th>
                <th scope="col">Course Name</th>
                <th scope="col">Duration</th>
                <th scope="col">Mode</th>
                <th scope="col">Sub Course Image</th>
              </tr>
            </thead>
            <tbody>
<?php
include 'connection.php'; // Include the database connection file

$sql = "SELECT * FROM subcourse"; // SQL query to select all columns from the subcourse table
$result = mysqli_query($con, $sql); // Execute the query

if ($result && mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<th scope="row">' . $row['id'] . '</th>'; // Assuming 'id' is the primary key column name
        echo '<td>' . $row['subcoursename'] . '</td>';
        echo '<td>' . $row['trainer'] . '</td>';
        echo '<td>' . $row['starting_date'] . '</td>';
        echo '<td>' . $row['syllabus'] . '</td>';
        echo '<td><img src="' . $row['courseimage'] . '" width="100" height="100"></td>';
        echo '<td>';
        echo '<form method="post">';
        echo '<input type="hidden" name="course_id" value="' . $row['id'] . '">';
          // Use a hidden field to send the unchecked status
        echo '<input type="hidden" name="status" value="Inactive">';
        echo '<input type="checkbox" name="status" value="Active" ' . ($row['status'] == 1 ? 'checked' : '') . ' onchange="this.form.submit()">';
        echo '</form>';
        echo '</td>';
        echo '<td>' . $row['coursename'] . '</td>';
        echo '<td>' . $row['duration'] . '</td>';
        echo '<td>' . $row['mode'] . '</td>';
        echo '<td><img src="' . $row['subcourseimage'] . '" width="100" height="100"></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="11">No records found</td></tr>';
}

mysqli_close($con); // Close the database connection
?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- jQuery (necessary for DataTables) -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
      });

      $('.more-button,.body-overlay').on('click', function() {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
      });

      // Initialize DataTable
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>
