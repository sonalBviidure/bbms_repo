<?php
// Include the database connection file
require 'connection.php';

// Fetch data from the franchise table
$sql = "SELECT * FROM franchise";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="franchise_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Franchise Id</th>";
echo "<th>Franchise Owner Name</th>";
echo "<th>Email</th>";
echo "<th>Contact Number</th>";
echo "<th>Image</th>";
echo "<th>Firm Name</th>";
echo "<th>State</th>";
echo "<th>District</th>";
echo "<th>Sub District</th>";
echo "<th>Village</th>";
echo "<th>Pincode</th>";
echo "<th>Status</th>";
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['t_id'] . "</td>";
        echo "<td>" . $row['t_ownername'] . "</td>";
        echo "<td>" . $row['t_email'] . "</td>";
        echo "<td>" . $row['t_contact'] . "</td>";
        echo "<td>" . $row['t_image'] . "</td>"; // You may need to adjust this based on your image storage logic
        echo "<td>" . $row['t_frimname'] . "</td>";
        echo "<td>" . $row['t_state'] . "</td>";
        echo "<td>" . $row['t_district'] . "</td>";
        echo "<td>" . $row['t_taluka'] . "</td>";
        echo "<td>" . $row['t_location'] . "</td>";
        echo "<td>" . $row['t_pincode'] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
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
