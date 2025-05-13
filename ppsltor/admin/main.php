<?php
require 'connection.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Query to retrieve counts
$sql = "SELECT COUNT(*) as matrix_count FROM matrices";
$result = $con->query($sql);
$matrixCount = ($result->num_rows > 0) ? $result->fetch_assoc()['matrix_count'] : 0;

//$sql = "SELECT COUNT(*) as member_count FROM board_members";
//$result = $con->query($sql);
//$memberCount = ($result->num_rows > 0) ? $result->fetch_assoc()['member_count'] : 0;

$sql = "SELECT COUNT(*) as category_count FROM categories";
$result = $con->query($sql);
$categoryCount = ($result->num_rows > 0) ? $result->fetch_assoc()['category_count'] : 0;

$sql = "SELECT COUNT(*) as meeting_count FROM meetings";
$result = $con->query($sql);
$meetingCount = ($result->num_rows > 0) ? $result->fetch_assoc()['meeting_count'] : 0;

$con->close();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">




    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>




    <div class="wrapper">


        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
        <!-- Page Content  -->
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

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">grid_view</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Matrices</strong></p>
                                <h3 class="card-title"><?php echo $matrixCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="view_matrix.php" class="text-warning">View All Matrices</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-rose">
                                    <span class="material-icons">groups</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Board Members</strong></p>
                                <h3 class="card-title"><?php echo $memberCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="view_members.php" class="text-rose">Manage Members</a>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">category</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Categories</strong></p>
                                <h3 class="card-title"><?php echo $categoryCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="view_category.php" class="text-success">View Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">meeting_room</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Meetings</strong></p>
                                <h3 class="card-title"><?php echo $meetingCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="view_meeting.php" class="text-info">View Meetings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions 
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Quick Actions</h4>
                            </div>
                            <div class="card-body">
                                <a href="add_matrix.php" class="btn btn-primary m-2">Add New Matrix</a>
                                <a href="add_category.php" class="btn btn-success m-2">Add Category</a>
                                <a href="schedule_meeting.php" class="btn btn-info m-2">Schedule Meeting</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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