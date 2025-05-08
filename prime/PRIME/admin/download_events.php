<?php
require 'connection.php';

// Fetch data from the events table
$sql = "SELECT * FROM events";
$result = $con->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="events_data.csv"');
    
    // Create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // Output headers
    fputcsv($output, array('Event Title', 'Event Date', 'Event Location', 'Event Image 1', 'Event Image 2', 'Status'));

    // Loop through each row and output data
    while ($row = $result->fetch_assoc()) {
        // Convert images to absolute URLs if needed
        $image1 = $row['event_image1'];
        $image2 = $row['event_image2'];
        // You may need to adjust image paths based on your file structure or URL setup

        // Output row data
        fputcsv($output, array($row['event_title'], $row['event_date'], $row['event_location'], $image1, $image2, $row['status']));
    }

    // Close the file pointer
    fclose($output);
} else {
    // No records found
    echo "No events found";
}

// Close the database connection
$con->close();
?>
