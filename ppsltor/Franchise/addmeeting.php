<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matrix_id = $_POST['matrix_id'];
    $meeting_date = $_POST['meeting_date'];
    $meeting_time = $_POST['meeting_time'];
    $venue = $_POST['venue'];
    $description = $_POST['description'];
    
    // Handle image upload
    $meeting_image = '';
    if(isset($_FILES['meeting_image']) && $_FILES['meeting_image']['error'] == 0) {
        $target_dir = "uploads/meetings/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $imageFileType = strtolower(pathinfo($_FILES["meeting_image"]["name"], PATHINFO_EXTENSION));
        $meeting_image = time() . '.' . $imageFileType;
        $target_file = $target_dir . $meeting_image;
        
        if (move_uploaded_file($_FILES["meeting_image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO meetings (matrix_id, meeting_date, meeting_time, venue, description, meeting_image, status) 
                    VALUES (?, ?, ?, ?, ?, ?, 1)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("isssss", $matrix_id, $meeting_date, $meeting_time, $venue, $description, $meeting_image);
        }
    } else {
        $sql = "INSERT INTO meetings (matrix_id, meeting_date, meeting_time, venue, description, status) 
                VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("issss", $matrix_id, $meeting_date, $meeting_time, $venue, $description);
    }
    
    if ($stmt->execute()) {
        echo "<script>alert('Meeting added successfully!'); window.location.href='viewmeeting.php';</script>";
    } else {
        echo "<script>alert('Error adding meeting!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Meeting</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                    </div>
                </nav>
            </div>

            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2 class="text-center mb-4">Add New Meeting</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="matrix_id">Matrix Name</label>
                            <select class="form-control" name="matrix_id" required>
                                <option value="">Select Matrix</option>
                                <?php
                                $sql = "SELECT id, matrix_name FROM matrices WHERE status = 1";
                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['matrix_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="meeting_date">Meeting Date</label>
                            <input type="date" class="form-control" name="meeting_date" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="meeting_time">Meeting Time</label>
                            <input type="time" class="form-control" name="meeting_time" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="venue">Venue</label>
                            <input type="text" class="form-control" name="venue" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="meeting_image">Meeting Image</label>
                            <input type="file" class="form-control" name="meeting_image" accept="image/*">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Meeting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>