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
    $sql = "SELECT * FROM `batch` WHERE t_no = ?";
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
        $class = $row['t_startingdate'];
        $endingDate = $row['t_endingdate']; // Corrected variable names
        $facultyName = $row['t_facultyname']; // Corrected variable names
        $duration = $row['t_duration'];
        $mode = $row['t_mode'];
        $capacity = $row['t_capacity'];
        $franchiseId = $row['t_franchiseid'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $batchId = $_POST['batchId'];
    $startDate = $_POST['startDate'];
    $duration = $_POST['duration'];
    $batchName = $_POST['batchName'];
    $endDate = $_POST['endDate'];
    $mode = $_POST['mode'];
    $batchcapacity = $_POST['batchcapacity'];
    $facultyName = $_POST['facultyName'];
    $Franchiseid = $_POST['Franchiseid'];
    $Id = $_POST['updateid'] ?? '';

    // Use prepared statements to update the record
    $sql = "UPDATE `batch` SET t_startingdate=?, t_duration=?, t_name=?, t_endingdate=?, t_mode=?, t_capacity=?, t_facultyname=?, t_franchiseid=? WHERE t_no=? ";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $startDate, $duration, $batchName, $endDate, $mode, $batchcapacity, $facultyName, $Franchiseid, $Id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: ./viewbatch.php');
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
                <h2 class="text-center">Update Batch</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batchId">Batch ID:</label>
                                <input type="text" class="form-control" id="batchId" name="batchId" value="<?php echo $srno; ?>">
                            </div>
                            <div class="form-group">
                                <label for="startDate">Starting Date:</label>
                                <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $class; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration:</label>
                                <select class="form-control" id="duration" name="duration" required>
                                    <option value="1 Month" <?php echo ($duration == '1 Month') ? 'selected' : ''; ?>>1 Month</option>
                                    <option value="2 Month" <?php echo ($duration == '2 Month') ? 'selected' : ''; ?>>2 Month</option>
                                    <option value="3 Month" <?php echo ($duration == '3 Month') ? 'selected' : ''; ?>>3 Month</option>
                                    <option value="4 Month" <?php echo ($duration == '4 Month') ? 'selected' : ''; ?>>4 Month</option>
                                    <option value="5 Month" <?php echo ($duration == '5 Month') ? 'selected' : ''; ?>>5 Month</option>
                                    <option value="6 Month" <?php echo ($duration == '6 Month') ? 'selected' : ''; ?>>6 Month</option>
                                    <option value="other" <?php echo ($duration == 'other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="facultyName">Faculty Name:</label>
                                <input type="text" class="form-control" id="facultyName" name="facultyName" value="<?php echo $facultyName; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="batchcapacity">Batch Capacity:</label>
                                <input type="number" class="form-control" id="courseMembers" name="batchcapacity" value="<?php echo $capacity; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batchName">Batch Name:</label>
                                <input type="text" class="form-control" id="batchName" name="batchName" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="endDate">Ending Date:</label>
                                <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $endingDate; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="mode">Mode:</label>
                                <select class="form-control" id="mode" name="mode">
                                    <option value="Online" <?php echo ($mode == 'Online') ? 'selected' : ''; ?>>Online</option>
                                    <option value="Offline" <?php echo ($mode == 'Offline') ? 'selected' : ''; ?>>Offline</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Franchiseid">Franchise Id:</label>
                                <input type="text" class="form-control" id="Franchiseid" name="Franchiseid" value="<?php echo $franchiseId; ?>" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Update Batch</button>
                </form>
            </div>

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


<script type="text/javascript">
$(document).ready(function() {
$('#sidebarCollapse').on('click', function() {
    $('#sidebar').toggleClass('active');
    $('#content').toggleClass('active');
});

$('.more-button,.body-overlay').on('click', function() {
    $('#sidebar,.body-overlay').toggleClass('show-nav');
});

});
</script>

</body>

</html>