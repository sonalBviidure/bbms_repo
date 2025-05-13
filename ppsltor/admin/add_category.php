<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    $category_code = $_POST['category_code'];
    
    // Image handling
    $image_name = '';
    if(isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $target_dir = "admin/image/";
        
        // Create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $image_name = time() . '_' . basename($_FILES["category_image"]["name"]);
        $target_file = $target_dir . $image_name;
        
        // Move uploaded file
        if(move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file)) {
            // File uploaded successfully
        } else {
            echo '<script>
            Swal.fire({
                title: "Error!",
                text: "Failed to upload image. Error: ' . $_FILES["category_image"]["error"] . '",
                icon: "error"
            });
            </script>';
            exit();
        }
    }
    
    // Insert into database
    $query = "INSERT INTO categories (category_name, category_code, image) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sss", $category_name, $category_code, $image_name);
    
    if(mysqli_stmt_execute($stmt)) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                title: "Success",
                text: "Category added successfully",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "view_category.php";
                }
            });
        });
        </script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Category</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <h2 class="text-center">Add Category</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Category Name:</label>
                                <input type="text" class="form-control" name="category_name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Category Code:</label>
                                <input type="text" class="form-control" name="category_code" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Category Image:</label>
                            <div class="border p-1" style="border-radius:5px;">
                                <input type="file" class="form-control-file" name="category_image" accept="image/*" required>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Add Category</button>
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
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });
    });
    </script>
</body>
</html>