<?php
// Include the database connection file
require 'connection.php';

// Fetch data from the batch table
$sql = "SELECT * FROM batch";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="batch_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Batch Id</th>";
echo "<th>Batch Name</th>";
echo "<th>Starting Date</th>";
echo "<th>Ending Date</th>";
echo "<th>Mode</th>";
echo "<th>Duration</th>";
echo "<th>Batch Capacity</th>";
echo "<th>Faculty Name</th>";
echo "<th>Franchise Id</th>";
echo "<th>Status</th>";
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['t_no'] . "</td>";
        echo "<td>" . $row['t_name'] . "</td>";
        echo "<td>" . $row['t_startingdate'] . "</td>";
        echo "<td>" . $row['t_endingdate'] . "</td>";
        echo "<td>" . $row['t_mode'] . "</td>";
        echo "<td>" . $row['t_duration'] . "</td>";
        echo "<td>" . $row['t_capacity'] . "</td>";
        echo "<td>" . $row['t_facultyname'] . "</td>";
        echo "<td>" . $row['t_franchiseid'] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No records found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
