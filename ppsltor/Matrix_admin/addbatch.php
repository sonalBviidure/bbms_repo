<?php
include 'connection.php';

// Fetch matrix data for dropdown
$matrixOptions = [];
$query = "SELECT matrix_id, contact FROM matrix";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $matrixOptions[] = $row;
    }
}

if (isset($_POST['submit'])) {
    $matrix_id = $_POST['matrix_id'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $meeting_date = $_POST['meeting_date'];
    $meeting_time = $_POST['meeting_time'];
    $description = $_POST['description'];

    // Handle photo upload
    $photoName = $_FILES['venue_photo']['name'];
    $photoTmp = $_FILES['venue_photo']['tmp_name'];
    $photoPath = 'uploads/' . basename($photoName);

    if (move_uploaded_file($photoTmp, $photoPath)) {
        $insert = "INSERT INTO meeting_venue (matrix_id, contact, location, meeting_date, meeting_time, description, venue_photo, status) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, 1)";
        $stmt = mysqli_prepare($con, $insert);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssss", $matrix_id, $contact, $location, $meeting_date, $meeting_time, $description, $photoPath);
            $res = mysqli_stmt_execute($stmt);

            if ($res) {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Success',
                            text: 'Meeting Venue Added Successfully!',
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'addbatch.php';
                            }
                        });
                    });
                </script>";
            } else {
                echo "<script>alert('Insertion failed: " . mysqli_error($con) . "');</script>";
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        echo "<script>alert('Photo upload failed');</script>";
    }
}

mysqli_close($con);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Add Meeting Venue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>
    <?php require 'sidebar.php'; ?>

    <div id="content" style="background-color:white;">
        <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                         id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="material-icons">person</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="main-content">
            <div class="container card shadow p-3 bg-white rounded">
                <h2 class="text-center">Add Meeting Venue</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Matrix ID Dropdown -->
                            <div class="form-group">
                                <label for="matrix_id">Matrix ID:</label>
                                <select name="matrix_id" id="matrix_id" class="form-control" required>
                                    <option value="">Select Matrix ID</option>
                                    <?php foreach ($matrixOptions as $opt): ?>
                                        <option value="<?= $opt['matrix_id']; ?>" data-contact="<?= $opt['contact']; ?>">
                                            <?= $opt['matrix_id']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Contact -->
                            <div class="form-group">
                                <label for="contact">Contact:</label>
                                <input type="text" class="form-control" id="contact" name="contact" readonly required>
                            </div>

                            <!-- Location -->
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>

                            <!-- Venue Photo -->
                            <div class="form-group">
                                <label for="venue_photo">Venue Photo:</label>
                                <input type="file" class="form-control" id="venue_photo" name="venue_photo" accept="uploads/*" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Meeting Date -->
                            <div class="form-group">
                                <label for="meeting_date">Meeting Date:</label>
                                <input type="date" class="form-control" id="meeting_date" name="meeting_date" required>
                            </div>

                            <!-- Meeting Time -->
                            <div class="form-group">
                                <label for="meeting_time">Meeting Time:</label>
                                <input type="time" class="form-control" id="meeting_time" name="meeting_time" required>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mt-3" style="width: 200px;">
                        Add Venue
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function () {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });

        // Auto-fill contact based on matrix selection
        $('#matrix_id').on('change', function () {
            var contact = $(this).find(':selected').data('contact');
            $('#contact').val(contact || '');
        });
    });
</script>
</body>
</html>
