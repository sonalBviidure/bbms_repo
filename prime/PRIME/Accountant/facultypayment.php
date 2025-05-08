<?php
require 'connection.php';

if ($con->connect_error) {
    die("conection failed: " . $con->connect_error);
}

if (isset($_POST['submit'])) {
    $facultyId = $_POST['facultyId'];
    $paymentId = $_POST['paymentId'];
    $workingDays = $_POST['workingDays'];
    $leaveAllowed = $_POST['leaveAllowed'];
    $absentDays = $_POST['absentDays'];
    $paymentCut = $_POST['paymentCut'];
    $facultyAttendance = $_POST['facultyAttendance'];
    $totalPayment = $_POST['totalPayment'];

    $sql = "INSERT INTO facultypayments VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iiiiiiii", $workingDays, $leaveAllowed, $absentDays, $paymentCut, $facultyAttendance, $totalPayment, $facultyId, $paymentId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo '<div class="alert alert-success" role="alert">
                    <b>Your Record Submitted Successfully!</b>
                  </div>';
            echo '<script>
                    setTimeout(function() {
                        var alertDiv = document.querySelector(".alert");
                        if (alertDiv) {
                            alertDiv.style.display = "none";
                        }
                    }, 3000); // 5000 milliseconds = 5 seconds
                  </script>';
            header('location:./facultypayment.php');
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    <b>Error: ' . mysqli_error($con) . '</b>
                  </div>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <b>Error in prepared statement: ' . mysqli_error($con) . '</b>
              </div>';
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>crud dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                <div class="container ">
                    <h2 style="text-align:Center">Manage Faculty Payment</h2>
                    <form action="#" method="post">
                        <div class="form-row mt-5">
                            <div class="form-group col-md-6 mb-3">
                                <label for="facultyId">Faculty ID:</label>
                                <input type="text" class="form-control" id="facultyId" name="facultyId" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="paymentId">Payment ID:</label>
                                <input type="text" class="form-control" id="paymentId" name="paymentId" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="workingDays">Working Days:</label>
                                <input type="number" class="form-control" id="workingDays" name="workingDays" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="leaveAllowed">Leave Allowed:</label>
                                <input type="number" class="form-control" id="leaveAllowed" name="leaveAllowed" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="absentDays">Absent Days:</label>
                                <input type="number" class="form-control" id="absentDays" name="absentDays" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="paymentCut">Payment Cut:</label>
                                <input type="number" class="form-control" id="paymentCut" name="paymentCut" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="facultyAttendance">Faculty Attendance (%):</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="facultyAttendance" name="facultyAttendance" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="totalPayment">Total Payment:</label>
                                <input type="number" class="form-control" id="totalPayment" name="totalPayment" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Make
                            Payment</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="custom.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $(".xp-menubar").on('click', function() {
                    $("#sidebar").toggleClass('active');
                    $("#content").toggleClass('active');
                });

                $('.xp-menubar, .body-overlay').on('click', function() {
                    $("#sidebar, .body-overlay").toggleClass('show-nav');
                });
            });
        </script>
    </div>
</body>

</html>