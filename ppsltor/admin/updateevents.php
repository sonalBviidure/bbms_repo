<?php
require 'connection.php';
$Id = $_GET['updateid'] ?? '';

// Check if the ID is valid
if (!is_numeric($Id)) {
    // echo "Invalid ID";
    exit;
}

// Fetch existing event data from the database based on event_id
$sql = "SELECT * FROM events WHERE event_id = $Id";
$result = $con->query($sql);

// Check if there is a row in the result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    // Handle case where no event data is found
    echo '<p>No event data found</p>';
    exit();
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve form data
    $eventTitle = $_POST['eventTitle'];
    $eventDate = $_POST['eventDate'];
    $eventLocation = $_POST['eventLocation'];

    // Check if any new images are uploaded
    $newImages = $_FILES['eventImages'];
    $newImagePaths = [];

    for ($i = 0; $i < count($newImages['name']); $i++) {
        $tempPath = $newImages['tmp_name'][$i];
        $newImagePath = 'uploads/' . uniqid() . '_' . $newImages['name'][$i];
        move_uploaded_file($tempPath, $newImagePath);
        $newImagePaths[] = $newImagePath;
    }

    // Check if any changes are made
    if (
        $eventTitle != $row['event_title'] ||
        $eventDate != $row['event_date'] ||
        $eventLocation != $row['event_location'] ||
        !empty($newImagePaths)
    ) {
        // Update records
        $updateSql = "UPDATE events SET
            event_title = '$eventTitle',
            event_date = '$eventDate',
            event_location = '$eventLocation',
            event_image1 = '" . ($newImagePaths[0] ?? $row['event_image1']) . "',
            event_image2 = '" . ($newImagePaths[1] ?? $row['event_image2']) . "',
            event_image3 = '" . ($newImagePaths[2] ?? $row['event_image3']) . "',
            event_image4 = '" . ($newImagePaths[3] ?? $row['event_image4']) . "',
            event_image5 = '" . ($newImagePaths[4] ?? $row['event_image5']) . "'
            WHERE event_id = $Id";

        if ($con->query($updateSql) === TRUE) {
            echo '<p>Record updated successfully</p>';
            header('location: ./view_events.php');
        } else {
            echo '<p>Error updating record: ' . $con->error . '</p>';
        }
    } else {
        // No changes, do nothing
        echo '<p>No changes made</p>';
        
    }
}
?>

<!-- Your HTML form goes here -->


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Events</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
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
                    <h2 class="text-center">Update Events</h2>
                    <form id="updateEventForm" method="post" class="mb-3" enctype="multipart/form-data">
                        <div class="form-row mt-3">
                            <div class="form-group col-md-4">
                                <label for="eventTitle">Event Title:</label>
                                <input type="text" class="form-control" id="eventTitle" name="eventTitle"
                                    value="<?php echo $row['event_title']; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="eventDate">Event Date:</label>
                                <input type="date" class="form-control" id="eventDate" name="eventDate"
                                    value="<?php echo $row['event_date']; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="eventLocation">Event Location:</label>
                                <input type="text" class="form-control" id="eventLocation" name="eventLocation"
                                    value="<?php echo $row['event_location']; ?>" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="eventImage1">Event Image 1:</label>
                                <div class="border p-1">
                                     <img src="<?php echo $row['event_image1'] ?>" alt="Event Image"
                                            style="width: 60px; height: 60px;">
                                    <input type="file" class="form-control-file" id="eventImage1" name="eventImages[]"
                                        accept="image/*" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="eventImage2">Event Image 2:</label>
                                <div class="border p-1">
                                     <img src="<?php echo $row['event_image2'] ?>" alt="Event Image"
                                            style="width: 60px; height: 60px;">
                                    <input type="file" class="form-control-file" id="eventImage2" name="eventImages[]"
                                        accept="image/*" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="eventImage3">Event Image 3:</label>
                                <div class="border p-1">
                                     <img src="<?php echo $row['event_image3'] ?>" alt="Event Image"
                                            style="width: 60px; height: 60px;">
                                    <input type="file" class="form-control-file" id="eventImage3" name="eventImages[]"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="eventImage4">Event Image 4:</label>
                                <div class="border p-1">
                                     <img src="<?php echo $row['event_image4'] ?>" alt="Event Image"
                                            style="width: 60px; height: 60px;">
                                    <input type="file" class="form-control-file" id="eventImage4" name="eventImages[]"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="eventImage5">Event Image 5:</label>
                                <div class="border p-1">
                                     <img src="<?php echo $row['event_image5'] ?>" alt="Event Image"
                                            style="width: 60px; height: 60px;">
                                    <input type="file" class="form-control-file" id="eventImage5" name="eventImages[]"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary mt-2" value="Update Event">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS, and finally DataTables JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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

    });
    $(document).ready(function() {
        $("#myTable").dataTable();
    });
    </script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    let table = new DataTable('#myTable');
    </script>
</body>

</html>