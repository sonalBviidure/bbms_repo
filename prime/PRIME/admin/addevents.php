<?php
require 'connection.php';
if(isset($_POST['submit'])) {
  
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

     // Get form data
     $eventTitle = $_POST['eventTitle'];
     $eventDate = $_POST['eventDate'];
     $eventLocation = $_POST['eventLocation'];
 
     // Insert event details into the database
     $sql = "INSERT INTO events (event_title, event_date, event_location) VALUES ('$eventTitle', '$eventDate', '$eventLocation')";
 
     if ($con->query($sql) === TRUE) {
         $lastInsertedId = $con->insert_id;
 
         // Handle image uploads
         $targetDir = "image/";
 
         for($i = 0; $i < count($_FILES['eventImages']['name']); $i++) {
             $targetFile = $targetDir . basename($_FILES['eventImages']['name'][$i]);
             move_uploaded_file($_FILES['eventImages']['tmp_name'][$i], $targetFile);
 
             // Update the event table with image paths
             $imageColumn = "event_image" . ($i + 1);
             $updateImageSql = "UPDATE events SET $imageColumn = '$targetFile' WHERE event_id = '$lastInsertedId'";
             $con->query($updateImageSql);
         }
 
         echo '<script>alert("Event and images inserted successfully.");</script>';
         header('location: ./addevents.php');
     }
      else {
       // Display error message using JavaScript alert
       echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
       header('location: ./addevents.php');
     }

    $con->close();
}
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <div class="container card shadow p-3 bg-white rounded">
                                <div class="text-right mb-3">
                            <!-- Add View Events button -->
                            <a href="viewevents.php" class="btn btn-primary">View Events</a>
                        </div>
                        <h2 class="text-center">Add Events</h2>
                        <form id="addEventForm" method="post" class="mb-3" enctype="multipart/form-data">
                            <div class="form-row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="eventTitle">Event Title:</label>
                                    <input type="text" class="form-control" id="eventTitle" name="eventTitle" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="eventDate">Event Date:</label>
                                    <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="eventLocation">Event Location:</label>
                                    <input type="text" class="form-control" id="eventLocation" name="eventLocation"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="eventImage1">Event Image 1:</label>
                                    <div class="border p-1">
                                        <input type="file" class="form-control-file" id="eventImage1"
                                            name="eventImages[]" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="eventImage2">Event Image 2:</label>
                                    <div class="border p-1">
                                        <input type="file" class="form-control-file" id="eventImage2"
                                            name="eventImages[]" accept="image/*" >
                                    </div>
                                </div>
                              <!--   <div class="form-group col-md-4">
                                    <label for="eventImage3">Event Image 3:</label>
                                    <div class="border p-1">
                                        <input type="file" class="form-control-file" id="eventImage3"
                                            name="eventImages[]" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="eventImage4">Event Image 4:</label>
                                    <div class="border p-1">
                                        <input type="file" class="form-control-file" id="eventImage4"
                                            name="eventImages[]" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="eventImage5">Event Image 5:</label>
                                    <div class="border p-1">
                                        <input type="file" class="form-control-file" id="eventImage5"
                                            name="eventImages[]" accept="image/*">
                                    </div>
                                </div> -->
                                <div class="form-group col-md-12">
                                    <input type="submit" name="submit" class="btn btn-primary mt-2" value="Add Event">
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