<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$categories = [];
$query = "SELECT category_id, category_name FROM category";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
}

if (isset($_POST['submit'])) {
    $referenceId = $_POST['referenceId'];
    $referenceFrom = $_POST['referenceFrom'];
    $referenceTo = $_POST['referenceTo'];
    $categoryId = $_POST['categoryId'];

    $sql = "INSERT INTO reference (reference_id, reference_from, reference_to, category_id) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $referenceId, $referenceFrom, $referenceTo, $categoryId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Success',
                        text: 'Reference added successfully.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = 'addstudent.php';
                    });
                });
            </script>";
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Reference could not be added.',
                        icon: 'error'
                    }).then(() => {
                        window.location.href = 'addstudent.php';
                    });
                });
            </script>";
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Reference</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <div class="body-overlay"></div>
    <?php require 'sidebar.php' ?>
    
    <div id="content" style="background-color:white;">
        <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
                    <a class="navbar-brand" href="#"> Dashboard </a>
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                        data-toggle="collapse" data-target="#navbarSupportedContent">
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
            <div class="container card shadow p-3 bg-white rounded mt-3">
                <h2>Add Reference</h2>
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="referenceId">Reference ID</label>
                            <input type="text" class="form-control" id="referenceId" name="referenceId" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="referenceFrom">Reference From</label>
                            <input type="text" class="form-control" id="referenceFrom" name="referenceFrom" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="referenceTo">Reference To</label>
                            <input type="text" class="form-control" id="referenceTo" name="referenceTo" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="categoryId">Category Name</label>
                            <select class="form-control" id="categoryId" name="categoryId" required>
                                <option value="">-- Select Category --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['category_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Add Reference</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
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
    });
</script>

</body>
</html>
