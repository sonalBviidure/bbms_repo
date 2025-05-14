<?php
include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['matrix_admin_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $taluka = $_POST['taluka'];
    $area = $_POST['area'];

    $photoName = $_FILES['photo']['name'];
    $photoTmp = $_FILES['photo']['tmp_name'];
    $photoPath = 'uploads/' . $photoName;

    move_uploaded_file($photoTmp, $photoPath);

    $stmt = $con->prepare("INSERT INTO matrix_admi VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisssssss", $id, $name, $category, $contact, $email, $photoPath, $state, $district, $taluka, $area);
    if ($stmt->execute()) {
        echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            title: "Success",
                            text: "Matrix Admin Added Successfully",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "./addstudent.php";
                            }
                        });
                    });
                </script>';
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            title: "Error",
                            text: "Failed to add Matrix Admin",
                            icon: "error"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "./addstudent.php";
                            }
                        });
                    });
                </script>';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        title: "Error",
                        text: "Failed to add Board Member",
                        icon: "error"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./add_board_member.php";
                        }
                    });
                });
            </script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add Matrix</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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
    <<div class="main-content">
        <div class="container bg-white card p-4">
            <h3>Add Matrix Admin</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>ID</label>
                        <input type="number" class="form-control" name="matrix_admin_id" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Category</label>
                        <select class="form-control" name="category" required>
                            <option value="">Select</option>
                            <?php
                            $res = mysqli_query($con, "SELECT * FROM category");
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="contact" pattern="\d{10}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Photo</label>
                        <input type="file" class="form-control" name="photo" accept="image/*" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>State</label>
                        <select class="form-control" name="state" id="state" required>
                            <option value="">Select State</option>
                            <?php
                            $res = mysqli_query($con, "SELECT * FROM state_table");
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['state_name']}'>{$row['state_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>District</label>
                        <select class="form-control" name="district" id="district" required>
                            <option value="">Select District</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Taluka</label>
                        <select class="form-control" name="taluka" id="taluka" required>
                            <option value="">Select Taluka</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Area</label>
                    <input type="text" class="form-control" name="area" required>
                </div>
                <button type="submit" name="submit"  class="btn btn-primary btn-block">Add Admin</button>
            </form>
        </div>
    </div>
</div>
<!-- JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<script>
$(document).ready(function () {
    $('#state').change(function () {
        var state = $(this).val();
        $.ajax({
            url: 'get_districts.php', // This file should be populated with districts based on the state
            type: 'POST',
            data: {state: state},
            success: function (data) {
                $('#district').html(data);
                $('#taluka').html('<option value="">Select Taluka</option>'); // Reset taluka dropdown
            }
        });
    });

    $('#district').change(function () {
        var district = $(this).val();
        $.ajax({
            url: 'get_taluka.php',
            type: 'POST',
            data: {district: district},
            success: function (data) {
                $('#taluka').html(data);
            }
        });
    });
});
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });

    $('.more-button,.body-overlay').on('click', function () {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
    });
});

</script>

</body>
</html>
