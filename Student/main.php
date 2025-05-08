<?php
 require 'connection.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Count board members
$sql = "SELECT COUNT(*) as member_count FROM board_members WHERE status = 1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $memberCount = $row['member_count'];
}

// Count matrices
$sql = "SELECT COUNT(*) as matrix_count FROM matrices WHERE status = 1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $matrixCount = $row['matrix_count'];
}

// Count meetings
$sql = "SELECT COUNT(*) as meeting_count FROM meetings WHERE status = 1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $meetingCount = $row['meeting_count'];
}

$con->close();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Faculty</title>
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
<style>

    
    </style>
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
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">group</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Board Members</strong></p>
                                <h3 class="card-title"><?php echo $memberCount ?? 0 ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">business</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Matrices</strong></p>
                                <h3 class="card-title"><?php echo $matrixCount ?? 0 ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">event</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Meetings</strong></p>
                                <h3 class="card-title"><?php echo $meetingCount ?? 0 ?></h3>
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