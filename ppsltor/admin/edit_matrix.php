<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch matrix data
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM matrices WHERE id = ? AND status = 1";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $matrix = $result->fetch_assoc();
}

// Handle form submission
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $matrix_name = $_POST['matrix_name'];
    $matrix_area = $_POST['matrix_area'];
    $contact_person = $_POST['contact_person'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $current_photo = $_POST['current_photo'];
    
    // Handle photo upload
    $photo = $current_photo;
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $target_dir = "uploads/matrices/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $photo = $target_dir . time() . '_' . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
    }
    
    $sql = "UPDATE matrices SET matrix_name=?, matrix_area=?, contact_person=?, 
            contact_number=?, email=?, address=?, photo=? WHERE id=?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssi", $matrix_name, $matrix_area, $contact_person, 
                      $contact_number, $email, $address, $photo, $id);
    
    if($stmt->execute()) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success",
                text: "Matrix updated successfully",
                icon: "success"
            }).then((result) => {
                window.location.href = "view_matrix.php";
            });
        });
        </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Error",
            text: "Failed to update matrix",
            icon: "error"
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
    <title>Edit Matrix</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <h2>Edit Matrix</h2>
                    <?php if(isset($matrix)): ?>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $matrix['id']; ?>">
                        <input type="hidden" name="current_photo" value="<?php echo $matrix['photo']; ?>">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Matrix Name</label>
                                <input type="text" class="form-control" name="matrix_name" 
                                       value="<?php echo $matrix['matrix_name']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Matrix Area</label>
                                <input type="text" class="form-control" name="matrix_area" 
                                       value="<?php echo $matrix['matrix_area']; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" 
                                       value="<?php echo $matrix['contact_person']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contact Number</label>
                                <input type="tel" class="form-control" name="contact_number" 
                                       value="<?php echo $matrix['contact_number']; ?>" pattern="[0-9]{10}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" 
                                       value="<?php echo $matrix['email']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Photo</label>
                                <input type="file" class="form-control" name="photo" accept="image/*">
                                <?php if($matrix['photo']): ?>
                                    <img src="<?php echo $matrix['photo']; ?>" class="mt-2" width="100">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" rows="3" required><?php echo $matrix['address']; ?></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="update" class="btn btn-primary">Update Matrix</button>
                            <a href="view_matrix.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    <?php else: ?>
                        <div class="alert alert-danger">Matrix not found.</div>
                    <?php endif; ?>
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