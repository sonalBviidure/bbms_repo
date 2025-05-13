<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Events</title>

    <link rel="stylesheet" href="css/event.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <?php include('navbar.php');?>

    <div class="container-fluid event">
        <h1 class="slider-heading"><span class="letter">E</span>vents</h1>
        <div class="row">
        <?php
// Assuming you have a database connection
require 'connection.php';

// Fetch event data from the database
$sql = "SELECT * FROM events where status='1'";
$result = $con->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="slider">';
        echo '<div class="list d-flex">';
        
        // Loop through the event images and create items
        for ($i = 1; $i <= 5; $i++) {
            $imageField = "event_image" . $i;
            echo '<div class="item">';
            // echo '<img src="admin/' . base64_encode($row[$imageField]) . '" alt="Event Image ' . $i . '">';
            echo'<img src="admin/' .$row[$imageField] . '" alt="Event Image" style="width:500px; height: 100%;">';
            echo '</div>';
        }

        echo '</div>';
        echo '<div class="buttons d-flex justify-content-between">';
        echo '<button class="btn btn-primary" id="prev"><</button>';
        echo '<button class="btn btn-primary" id="next">></button>';
        echo '</div>';
        echo '<ul class="dots list-inline text-center">';
        echo '<li class="list-inline-item active"></li>';
        // Add more dots as needed
        echo '</ul>';
        echo '<div class="event-info text-center">';
        echo '<p>' . $row["event_title"] . '</p>';
        echo '<p>Location: ' . $row["event_location"] . '<br>Date: ' . $row["event_date"] . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // Handle case where no event data is found
    echo '<p><center>No event data available</center></p>';
}
?>

<!-- Include necessary CSS and JS for the slider -->
<link rel="stylesheet" href="path/to/slider.css">
<script src="path/to/slider.js"></script>

        </div>
    </div>


    <section>
        <div class="container mb-5">
            <h2 class="mb-5 mt-5 text-center">Upcoming Events</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="event-item p-3 mb-3 border rounded bg-light">
                        <h5 class="event-title " style="color:#00b9fe">Event 1</h5>
                        <div class="event-details">
                            <p class="mb-1">Location: Conference Hall</p>
                            <p class="mb-1">Date: January 15, 2024</p>
                            <p class="mb-1">Time: 10:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-item p-3 mb-3 border rounded bg-light">
                        <h5 class="event-title " style="color:#00b9fe">Event 2</h5>
                        <div class="event-details">
                            <p class="mb-1">Location: Auditorium</p>
                            <p class="mb-1">Date: February 1, 2024</p>
                            <p class="mb-1">Time: 3:00 PM - 6:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-item p-3 mb-3 border rounded bg-light">
                        <h5 class="event-title" style="color:#00b9fe">Event 3</h5>
                        <div class="event-details">
                            <p class="mb-1">Location: Rooftop Garden</p>
                            <p class="mb-1">Date: March 10, 2024</p>
                            <p class="mb-1">Time: 6:30 PM - 9:30 PM</p>
                        </div>
                    </div>
                </div>
                <!-- Add more event items as needed -->
            </div>
        </div>
    </section>


    <?php include('footer.php');?>

    <script src="js/event.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>