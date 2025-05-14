<?php
// Include the database connection file
require 'connection.php';

// Fetch data from the inquiry table
$sql = "SELECT * FROM inquiry";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="franchise_inquiry_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Contact</th>";
echo "<th>Email</th>";
echo "<th>Country</th>";
echo "<th>State</th>";
echo "<th>District</th>";
echo "<th>Subdistrict</th>";
echo "<th>Taluka</th>";
echo "<th>Pincode</th>";
echo "<th>Inquiry Subject</th>";
echo "<th>Received At</th>";
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['t_id'] . "</td>";
        echo "<td>" . $row['t_name'] . "</td>";
        echo "<td>" . $row['t_countrycode'] . $row['t_contact'] . "</td>";
        echo "<td>" . $row['t_email'] . "</td>";
        echo "<td>" . $row['t_country'] . "</td>";
        echo "<td>" . $row['t_state'] . "</td>";
        echo "<td>" . $row['t_district'] . "</td>";
        echo "<td>" . $row['t_subdistrict'] . "</td>";
        echo "<td>" . $row['t_taluka'] . "</td>";
        echo "<td>" . $row['t_pincode'] . "</td>";
        echo "<td>" . $row['t_inquirysubject'] . "</td>";
        echo "<td>" . $row['timestamp_column'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='12'>No records found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
