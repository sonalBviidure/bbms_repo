<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $matrix_id = $_POST['matrix_id'];
    $member_name = $_POST['member_name'];
    $business_name = $_POST['business_name'];
    $category_id = $_POST['category_id'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    
    // Photo upload handling
    $photo_name = '';
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $target_dir = "image/";
        $photo_name = time() . '_' . basename($_FILES['photo']['name']);
        $target_file = $target_dir . $photo_name;
        
        // Create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        // Move uploaded file
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            // File uploaded successfully
        } else {
            echo "Error uploading file.";
        }
    }
    
    // Insert into database
    $query = "INSERT INTO board_members (matrix_id, member_name, business_name, category_id, contact_number, email, photo) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "issssss", $matrix_id, $member_name, $business_name, $category_id, $contact_number, $email, $photo_name);
    
    if(mysqli_stmt_execute($stmt)) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Member added successfully",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "view_members.php";
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
    <title>Add Member</title>
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
                    <h2 class="text-center">Add Member</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Matrix:</label>
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

                            <div class="form-group col-md-6">
                                <label>Category:</label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    $sql = "SELECT id, category_name FROM categories WHERE status = 1";
                                    $result = $con->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Member Name:</label>
                                <input type="text" class="form-control" name="member_name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Business Name:</label>
                                <input type="text" class="form-control" name="business_name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Contact Number:</label>
                                <input type="tel" class="form-control" name="contact_number" pattern="[0-9]{10}" title="Please enter valid 10-digit number" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Photo:</label>
                                <input type="file" class="form-control" name="photo" accept="image/*">
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Add Member</button>
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