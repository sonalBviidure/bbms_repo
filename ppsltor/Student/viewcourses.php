<?php
include 'connection.php';
session_start();

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM category";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error fetching categories: " . mysqli_error($con));
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Matrix</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <style>
        .category-card {
            width: 300px;
            margin: 15px;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s;
        }
        .category-card:hover {
            transform: scale(1.03);
        }
        .category-photo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="body-overlay"></div>

    <?php require 'sidebar.php' ?>

    <div id="content" style="background-color:white;">
        <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
            </nav>
        </div>

        <div class="main-content p-3">
            <div class="container shadow p-3 bg-white rounded">
                <h4 class="text-center mb-4">Matrix</h4>
                <div class="category-container">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="category-card">
                            <img src="category_images/<?php echo $row['photo']; ?>" class="category-photo" alt="Category Photo">
                            <h6><?php echo $row['category_name']; ?></h6>
                            <!-- <p style="font-size: 14px;"><span class="material-icons" style="vertical-align: middle; font-size: 18px; margin-right: 5px;">phone</span><?php echo $row['contact_number']; ?></p> -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS Scripts -->
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

<?php mysqli_close($con); ?>
