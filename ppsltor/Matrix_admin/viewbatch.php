<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Meeting Venues</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap & Custom CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        .venue-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: 0.3s ease;
        }
        .venue-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        }
        .venue-photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .venue-details {
            padding: 15px;
        }
        .venue-details h5 {
            font-weight: bold;
        }
    </style>
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
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>
                </div>
            </nav>
        </div>

        <div class="main-content">
            <div class="container">
                <h3 class="text-center mb-4 mt-3">Meeting Venues</h3>

                <div class="row">
                    <?php
                    $sql = "SELECT * FROM meeting_venue";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $photoPath = !empty($row['venue_photo']) ? htmlspecialchars($row['venue_photo']) : '';
                            echo '<div class="col-md-4">';
                            echo '<div class="venue-card">';
                            
                            // Photo
                            if (!empty($photoPath)) {
                                echo "<img src='$photoPath' alt='Venue Photo' class='venue-photo'>";
                            } else {
                                echo "<img src='images/no-image.png' alt='No Photo' class='venue-photo'>";
                            }

                            // Details
                            echo '<div class="venue-details">';
                            echo '<h5>Matrix ID: ' . htmlspecialchars($row['matrix_id']) . '</h5>';
                            echo '<p><strong>Contact:</strong> ' . htmlspecialchars($row['contact']) . '</p>';
                            echo '<p><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>';
                            echo '<p><strong>Date:</strong> ' . htmlspecialchars($row['meeting_date']) . '</p>';
                            echo '<p><strong>Time:</strong> ' . htmlspecialchars($row['meeting_time']) . '</p>';
                            echo '<p><strong>Description:</strong> ' . htmlspecialchars($row['description']) . '</p>';
                            echo '</div>';

                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<div class='col-12 text-center'><p>No meeting venues found</p></div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
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
