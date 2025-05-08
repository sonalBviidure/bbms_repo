<?php
// Include the database connection file
require 'connection.php';

// Fetch data from the leads table
$sql = "SELECT * FROM leads";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="leads_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Contact</th>";
echo "<th>Email</th>";
echo "<th>State</th>";
echo "<th>District</th>";
echo "<th>Subdistrict</th>";
echo "<th>Pincode</th>";
echo "<th>Inquiry Subject</th>";
echo "<th>Submitted Time</th>";
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['l_name'] . "</td>";
        echo "<td>" . $row['l_phone'] . "</td>";
        echo "<td>" . $row['l_email'] . "</td>";
        echo "<td>" . $row['l_state'] . "</td>";
        echo "<td>" . $row['l_district'] . "</td>";
        echo "<td>" . $row['l_subdistrict'] . "</td>";
        echo "<td>" . $row['l_pincode'] . "</td>";
        echo "<td>" . $row['l_message'] . "</td>";
        echo "<td>" . $row['l_timestamp_column'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
