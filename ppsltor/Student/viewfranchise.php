<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT r.reference_id, r.reference_from, r.reference_to, c.category_name
          FROM reference r
          JOIN category c ON r.category_id = c.category_id";

$result = mysqli_query($con, $query);

$references = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $references[] = $row;
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View References</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .card-body {
            background-color: #ffffff;
        }
        .card-title {
            font-size: 1.2rem;
            color: #007bff;
        }
        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }
        .card-icon {
            font-size: 1.5rem;
            color: #007bff;
        }
    </style>
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
            <div class="container mt-4">
                <h2 class="mb-4">Reference List</h2>
                <div class="row">
                    <?php if (!empty($references)): ?>
                        <?php foreach ($references as $ref): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header text-center">
                                        <span class="material-icons card-icon">assignment_ind</span>
                                        <span>Reference</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Reference ID: <?= htmlspecialchars($ref['reference_id']); ?></h5>
                                        <p class="card-text"><span class="material-icons">person</span> <strong>From:</strong> <?= htmlspecialchars($ref['reference_from']); ?></p>
                                        <p class="card-text"><span class="material-icons">person_add</span> <strong>To:</strong> <?= htmlspecialchars($ref['reference_to']); ?></p>
                                        <p class="card-text"><span class="material-icons">category</span> <strong>Category:</strong> <?= htmlspecialchars($ref['category_name']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p>No references found.</p>
                        </div>
                    <?php endif; ?>
                </div>
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
