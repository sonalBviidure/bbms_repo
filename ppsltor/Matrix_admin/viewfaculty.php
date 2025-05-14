<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch board members with joined category and matrix admin data
$sql = "SELECT bm.*, c.category_name, ma.matrix_admin_name 
        FROM board_members bm
        LEFT JOIN category c ON bm.category_id = c.category_id
        LEFT JOIN matrix_admi ma ON bm.matrix_admin_id = ma.matrix_admin_id";

$result = mysqli_query($con, $sql);

// Error handling for SQL query failure
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Board Members</title>
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
                </div>
            </nav>
        </div>

        <div class="main-content">
            <div class="container card shadow p-3 bg-white rounded">
                <h2 class="text-center mb-4">Board Members List</h2>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Board Member ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Matrix Admin</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                        <td>{$row['board_member_id']}</td>
                                        <td>{$row['board_member_name']}</td>
                                        <td>{$row['contact_number']}</td>
                                        <td>{$row['email_id']}</td>
                                        <td>{$row['category_name']}</td>
                                        <td>{$row['matrix_admin_name']}</td>
                                        <td><img src='uploads/{$row['photo']}' alt='Photo' width='60' height='60'></td>
                                    </tr>";
                                    $i++;
                                }
                            } else {
                                echo "<tr><td colspan='7'>No board members found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>

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
