<?php
require 'connection.php';

// Fetch data from the upevents table
$sql = "SELECT * FROM upevents";
$result = $con->query($sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="upevents_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Up Comming Event Title</th>";
echo "<th>Up Comming Event Date</th>";
echo "<th>Up Comming Location</th>";
echo "<th>Up Comming Image 1</th>";
echo "<th>Up Comming Image 2</th>";
echo "<th>Status</th>";
echo "</tr>";

// Write data rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["upevent_title"] . "</td>";
        echo "<td>" . $row["upevent_date"] . "</td>";
        echo "<td>" . $row["upevent_location"] . "</td>";
        echo "<td>" . $row["upevent_image1"] . "</td>";
        echo "<td>" . $row["upevent_image2"] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No events found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
$con->close();
?>
