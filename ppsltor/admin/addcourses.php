<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (isset($_POST['submit'])) {
    $categoryId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
    //$contactNumber = $_POST['contactNumber'];
    // $address = $_POST['address'];
     $categoryPhoto = $_FILES["categoryPhoto"]['name'];

    $valid_image = in_array($_FILES["categoryPhoto"]["type"], ["image/jpg", "image/jpeg", "image/png"]);

    if ($valid_image) {
        $query = "INSERT INTO category (category_id, category_name, photo) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $categoryId, $categoryName, $categoryPhoto);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            move_uploaded_file($_FILES["categoryPhoto"]["tmp_name"], "category_images/" . $categoryPhoto);

            echo '<script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        title: "Success!",
                        text: "Category added successfully.",
                        icon: "success"
                    }).then(() => {
                        window.location.href = "addcourses.php";
                    });
                });
            </script>';
        } else {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        title: "Error!",
                        text: "Database insert failed.",
                        icon: "error"
                    });
                });
            </script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Invalid Image!",
                    text: "Only JPG, JPEG, PNG allowed.",
                    icon: "warning"
                });
            });
        </script>';
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php include 'sidebar.php'; ?>
        <div id="content" style="background-color:white;">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                <div class="container card shadow p-4 bg-white rounded">
                    <h2 class="text-center mb-4">Add Category</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Category ID:</label>
                                <input type="text" class="form-control" name="categoryId" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Category Name:</label>
                                <input type="text" class="form-control" name="categoryName" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                                <label>Category Photo:</label>
                                <input type="file" class="form-control-file" name="categoryPhoto" accept="image/*" required>
                            </div>

                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Contact Number:</label>
                                <input type="text" class="form-control" name="contactNumber" required>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label>Address:</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div> -->

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mt-3" style="width: 200px;">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button, .body-overlay').on('click', function () {
            $('#sidebar, .body-overlay').toggleClass('show-nav');
        });
    });
    </script>
</body>
</html>
