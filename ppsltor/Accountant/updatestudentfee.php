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
    $sql = "SELECT * FROM `studentfee` WHERE t_no = ?";
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

        $srno = $row['t_no'];
        $name = $row['t_name'];
        $totalFee = $row['t_totalfee'];
        $firstInstallment = $row['t_installment1'];
        $secondInstallment = $row['t_installment2'];
        $thirdInstallment = $row['t_installment3'];
        $balanceAmount = $row['t_balanceamount'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $studentId = $_POST['studentId'];
    $studentName = $_POST['studentName'];
    $totalFee = $_POST['totalFee'];
    $firstInstallment = $_POST['firstInstallment'];
    $secondInstallment = $_POST['secondInstallment'];
    $thirdInstallment = $_POST['thirdInstallment'];
    $balanceAmount = $_POST['balanceAmount'];
    $Id = $_POST['updateid'] ?? '';

    // Use prepared statements to update the record
    $sql = "UPDATE `studentfee` SET 
    t_name = ?, 
    t_totalfee = ?, 
    t_installment1 = ?, 
    t_installment2 = ?, 
    t_installment3 = ?, 
    t_balanceamount = ? 
    WHERE t_no = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssi", $studentName, $totalFee, $firstInstallment, $secondInstallment, $thirdInstallment, $balanceAmount, $studentId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: ./view_student_fee.php');
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
                    <h2 class="text-center">Update Student Fee</h2>
                    <form action="#" method="post">
                        <div class="form-row mt-5">
                            <div class="form-group col-md-6 mb-3">
                                <label for="studentId">Student ID:</label>
                                <input type="text" class="form-control" id="studentId" name="studentId" value="<?php echo $srno; ?>" required readonly>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="studentName">Student Name:</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" value="<?php echo $name; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="totalFee">Total Fee:</label>
                                <input type="number" class="form-control" id="totalFee" name="totalFee" value="<?php echo $totalFee; ?>" required>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="firstInstallment">1st Installment:</label>
                                <input type="number" class="form-control" id="firstInstallment" name="firstInstallment" value="<?php echo $firstInstallment; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="secondInstallment">2nd Installment:</label>
                                <input type="number" class="form-control" id="secondInstallment" name="secondInstallment" value="<?php echo $secondInstallment; ?>">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="thirdInstallment">3rd Installment:</label>
                                <input type="number" class="form-control" id="thirdInstallment" name="thirdInstallment" value="<?php echo $thirdInstallment; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="balanceAmount">Balance Amount:</label>
                            <input type="number" class="form-control" id="balanceAmount" name="balanceAmount" value="<?php echo $balanceAmount; ?>" required>
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