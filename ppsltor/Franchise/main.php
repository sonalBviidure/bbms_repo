<?php
require 'connection.php';

// Remove previous queries and add these new ones
$sql = "SELECT COUNT(*) as member_count FROM board_members";
$result = $con->query($sql);
$memberCount = ($result->num_rows > 0) ? $result->fetch_assoc()['member_count'] : 0;

$sql = "SELECT COUNT(*) as post_count FROM posts";
$result = $con->query($sql);
$postCount = ($result->num_rows > 0) ? $result->fetch_assoc()['post_count'] : 0;

$sql = "SELECT COUNT(*) as meeting_count FROM meetings";
$result = $con->query($sql);
$meetingCount = ($result->num_rows > 0) ? $result->fetch_assoc()['meeting_count'] : 0;

$sql = "SELECT COUNT(*) as matrix_count FROM matrices";
$result = $con->query($sql);
$matrixCount = ($result->num_rows > 0) ? $result->fetch_assoc()['matrix_count'] : 0;

// Move connection close to end of file, just before closing PHP tag
// $con->close();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Franchise
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/style.css">
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



           <!-- <div class="main-content">

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">people</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Students</strong></p>
                                <h3 class="card-title"><?php echo"$studentCount"?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-rose">
                                    <span class="material-icons">school</span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Faculty</strong></p>
                                <h3 class="card-title"><?php echo"$facultyCount"?></h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">store
                                    </span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Franchise</strong></p>
                                <h3 class="card-title"><?php echo"$franchiseCount"?></h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">
                                        assignment
                                    </span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Batch</strong></p>
                                <h3 class="card-title"><?php echo"$batchCount"?></h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">
                                        book
                                    </span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Courses</strong></p>
                                <h3 class="card-title"><?php echo"$courseCount"?></h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>-->

            <div class="main-content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">groups</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Board Members</strong></p>
                                <h3 class="card-title"><?php echo $memberCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="" class="text-warning">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-rose">
                                    <span class="material-icons">post_add</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Posts</strong></p>
                                <h3 class="card-title"><?php echo $postCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="" class="text-rose">View Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">meeting_room</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Meetings</strong></p>
                                <h3 class="card-title"><?php echo $meetingCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="" class="text-success">View Meetings</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">grid_view</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Matrix</strong></p>
                                <h3 class="card-title"><?php echo $matrixCount; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="" class="text-info">View Matrix</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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