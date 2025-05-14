<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <title>Events</title>

    <link rel="stylesheet" href="css/event.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Other meta tags and stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <!-- Your custom styles and other scripts -->
    <style>
        /* Custom styles for event cards */
        .card {
            height: 350px; /* Set a custom height for the card */
            width: 350px;
            margin-left: 60px;
        }

        .card-img {
            height: 300px; /* Set a fixed height for the images */
            object-fit: cover; /* Ensure the image covers the specified height */
        }

        @media (max-width: 768px) {
            .card {
                width: 100%; /* Make cards full width on smaller screens */
                margin-left: 0; /* Remove left margin on smaller screens */
                margin-bottom: 20px; /* Add bottom margin for spacing */
            }
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <br>
    <br>
    <br>
    <div class="container event">
        <div class="event-heading">
           <h1 class="slider-heading" style="text-align:center;"><span class="letter">E</span>vents</h1>
        </div>
        <br>
        <br>
        <div class="row">
            <?php
            // Fetch event data from the database
            $sql = "SELECT * FROM events WHERE status='1'";
            $result = $con->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 mb-4">';
                    echo '<div class="card h-100">';
                    // Lightbox functionality added to the image
                    echo '<a href="admin/' . $row['event_image1'] . '" data-fancybox="event-gallery" data-caption="' . $row['event_title'] . '">';
                    echo '<div class="square-img-container">';
                    echo '<img src="admin/' . $row['event_image1'] . '" class="card-img-top square-img" alt="Event Image">';
                    echo '</div>';
                    echo '</a>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title"><i class="fas fa-graduation-cap icon-color marker-color" ></i>' . $row['event_title'] . '</h5>';
                    echo '<p class="card-text"><i class="fas fa-map-marker-alt icon-color marker-color"></i> Location: ' . $row['event_location'] . '</p>';
                    echo '<p class="card-text"><i class="fas fa-calendar-alt icon-color"></i> Date: ' . $row['event_date'] . '</p>';
                    echo '</div>'; // Close card-body div
                    echo '</div>'; // Close card div
                    echo '</div>'; // Close col div
                }
            } else {
                echo '<div class="col">';
                echo '<p class="text-center">No event data available</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <!--  -->
    <br>
    <br>
    <br>
    <br>
    <!-- upcoming Event Section -->
    <div class="container event">
        <div class="event-heading">
          <center>  <h1 class="slider-heading" style="text-align:center;"><span class="letter">F</span>REE <span class="letter">D</span>EMO <span class="letter">W</span>ORKSHOPS</h1></center>
        </div>
        <br>
        <br>
        <div class="row">
            <?php
            // Fetch event data from the database
            $sql = "SELECT * FROM upevents WHERE status='1'";
            $result = $con->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 mb-4">';
                    echo '<div class="card h-100">';
                    // Lightbox functionality added to the image
                    echo '<a href="admin/' . $row['upevent_image1'] . '" data-fancybox="event-gallery" data-caption="' . $row['upevent_title'] . '">';
                    echo '<div class="square-img-container">';
                    echo '<img src="admin/' . $row['upevent_image1'] . '" class="card-img-top square-img" alt="Event Image">';
                    echo '</div>';
                    echo '</a>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title"><i class="fas fa-graduation-cap icon-color marker-color" ></i>' . $row['upevent_title'] . '</h5>';
                    echo '<p class="card-text"><i class="fas fa-map-marker-alt icon-color marker-color"></i> Location: ' . $row['upevent_location'] . '</p>';
                    echo '<p class="card-text"><i class="fas fa-calendar-alt icon-color"></i> Date: ' . $row['upevent_date'] . '</p>';
                    echo '<p class="card-link"><i class="fas fa-link icon-color marker-color"></i>Meeting Link: <a href="' . $row['upevent_meet'] . '" target="_blank">Click Here</a></p>';
                    echo '</div>'; // Close card-body div
                    echo '</div>'; // Close card div
                    echo '</div>'; // Close col div
                }
            } else {
                echo '<div class="col">';
                echo '<p class="text-center">No event data available</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
     <!-- Custom CSS -->
<!-- Custom CSS -->
<style>
  .card {
    height: 100% !important; /* Ensure all cards take up full height */
    display: flex;
    flex-direction: column;
    border-radius: 10px; /* Rounded corners for the card */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add box shadow for a 3D effect */
    font-family: 'Times New Roman', Times, serif;
    font-size: 25px;
  }

  .square-img-container {
    position: relative;
    overflow: hidden;
    padding-top: 100%; /* Create a square container based on percentage */
  }

  .square-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%; /* Ensure the image fills the square container */
    object-fit: cover; /* Maintain aspect ratio and cover the container */
  }

  .card-body {
    padding: 20px; /* Add padding for card content */
    flex-grow: 1; /* Allow card body to expand within the card */
  color: white;
   background-color: gray; 
  }

  .card-title {
    font-size: 25px; /* Increase title font size */
    margin-bottom: 10px; /* Add margin below title */
    font-weight: bold;
    color:white; 
  }

  .card-text {
    margin-bottom: 5px; /* Add margin below text content */
   
  }

  .icon-color {
    color:#00b9fe!important; /* Default icon color */
    margin-right: 8px; /* Add spacing between icon and text */
  }

  .marker-color {
    color: #00b9fe!important; /* Red color for marker icon */
    font-size: 22px;
  }
 a{
        color: #00b9fe;
        text-decoration: underline;
    }
</style>

    <?php include('footer.php'); ?>

   <!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script src="js/event.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>