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
    $sql = "SELECT * FROM `facultypayments` WHERE t_facultyid = ?";
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

        $srno = $row['t_facultyid'];
        $paymentId = $row['t_paymentid'];
        $workingDays = $row['t_workingdays'];
        $leaveAllowed = $row['t_leaveallowed'];
        $absentDays = $row['t_absentday'];
        $paymentCut = $row['t_paymentcutted'];
        $facultyAttendance = $row['t_attendance'];
        $totalPayment = $row['t_totalpayment'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $facultyId = $_POST['facultyId'];
    $paymentId = $_POST['paymentId'];
    $workingDays = $_POST['workingDays'];
    $leaveAllowed = $_POST['leaveAllowed'];
    $absentDays = $_POST['absentDays'];
    $paymentCut = $_POST['paymentCut'];
    $facultyAttendance = $_POST['facultyAttendance'];
    $totalPayment = $_POST['totalPayment'];
    $Id = $_POST['updateid'] ?? '';

    // Use prepared statements to update the record
    $sql = "UPDATE `facultypayments` SET 
    t_paymentid = ?, 
    t_workingdays = ?, 
    t_leaveallowed = ?, 
    t_absentday = ?, 
    t_paymentcutted = ?, 
    t_attendance = ?, 
    t_totalpayment = ? 
    WHERE t_facultyid = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiiiiii", $paymentId, $workingDays, $leaveAllowed, $absentDays, $paymentCut, $facultyAttendance, $totalPayment, $facultyId);        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: ./view_faculty_payment.php');
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
    <link rel="stylesheet" href="css/style.css">
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

                <div class="container">
                    <h2 class="text-center">Update Faculty Fee</h2>
                    <form action="#" method="post">
                        <div class="form-row mt-5">
                            <div class="form-group col-md-6 mb-3">
                                <label for="facultyId">Faculty ID:</label>
                                <input type="text" class="form-control" id="facultyId" name="facultyId" value="<?php echo $srno; ?>" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="paymentId">Payment ID:</label>
                                <input type="text" class="form-control" id="paymentId" name="paymentId" value="<?php echo $paymentId; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="workingDays">Working Days:</label>
                                <input type="number" class="form-control" id="workingDays" name="workingDays" value="<?php echo $workingDays; ?>" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="leaveAllowed">Leave Allowed:</label>
                                <input type="number" class="form-control" id="leaveAllowed" name="leaveAllowed" value="<?php echo $leaveAllowed; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="absentDays">Absent Days:</label>
                                <input type="number" class="form-control" id="absentDays" name="absentDays" value="<?php echo $absentDays; ?>" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="paymentCut">Payment Cut:</label>
                                <input type="number" class="form-control" id="paymentCut" name="paymentCut" value="<?php echo $paymentCut; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="facultyAttendance">Faculty Attendance (%):</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="facultyAttendance" name="facultyAttendance" value="<?php echo $facultyAttendance; ?>" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="totalPayment">Total Payment:</label>
                                <input type="number" class="form-control" id="totalPayment" name="totalPayment" value="<?php echo $totalPayment; ?>" required>
                            </div>
                        </div>

                        <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                        <button type="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;" name="submit">Update</button>
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