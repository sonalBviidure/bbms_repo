<?php
include 'connection.php';
session_start(); // Ensure session_start is called for using $_SESSION

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM category"; // Query to select all categories from the category table
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error fetching categories: " . mysqli_error($con));
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>View Categories</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- google material icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>

<div class="wrapper">
    <div class="body-overlay"></div>
    <?php require 'sidebar.php'?>

    <!-- Page Content -->
    <div id="content" style="background-color:white;">

        <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>

                    <a class="navbar-brand" href="#"> Dashboard </a>

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

        <div class="main-content">
            <div class="container card shadow p-3 bg-white rounded">
                <h2 class="text-center">View Categories</h2>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Photo</th>
                            <!-- <th>Contact Number</th>
                            <th>Address</th> -->
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['category_id']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><img src="category_images/<?php echo $row['photo']; ?>" width="50" height="50"></td>
                                 
                               <!-- <td>
                                    <a href="edit_category.php?id=<?php echo $row['category_id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete_category.php?id=<?php echo $row['category_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                </td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
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

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });
    });
</script>

</body>

</html>

<?php
// Close the database connection
mysqli_close($con);
?>
