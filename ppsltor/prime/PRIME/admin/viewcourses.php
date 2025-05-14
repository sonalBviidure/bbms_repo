<?php
include 'connection.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course_id'])) {
    $courseId = $_POST['course_id'];
    $status = isset($_POST['status']) && $_POST['status'] == 'Active' ? 1 : 0; // Set status based on checkbox
    
    // Update status in the database
    $updateSql = "UPDATE course SET status = $status WHERE t_id = $courseId";
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
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>View Course</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!----css3---->
  <link rel="stylesheet" href="css/custom.css">
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- Datatables CSS -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Material Icon -->
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
          <h2 class="text-center">View Courses</h2>
          <div class="text-center mb-3">
                        <!-- Add a button for downloading data as Excel -->
                        <a href="download_courses.php" class="btn btn-success">Download as Excel</a>
                    </div>
          <table class="table table-striped table-bordered mt-10" id="myTable">
            <thead>
              <tr>
                <th scope="col">Course Id</th>
                <th scope="col">Main Course</th>
                <th scope="col">Main Course Image</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
            <?php
                if ($result && mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>' . $row['t_id'] . '</td>';
                      echo '<td>' . $row['t_name'] . '</td>';
                      echo '<td><img src="' . $row['t_image'] . '" width="100" height="100"></td>';
                      echo '<td>';
                      echo '<form method="post">';
                      echo '<input type="hidden" name="course_id" value="' . $row['t_id'] . '">';
                      // Use a hidden field to send the unchecked status
                      echo '<input type="hidden" name="status" value="Inactive">';
                      echo '<input type="checkbox" name="status" value="Active" ' . ($row['status'] == 1 ? 'checked' : '') . ' onchange="this.form.submit()">';
                      echo '</form>';
                      echo '</td>';
                      echo '</tr>';
                  }
                } else {
                    echo '<tr><td colspan="4">No records found</td></tr>';
                }
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
