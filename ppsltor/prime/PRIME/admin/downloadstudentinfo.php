<?php
// Include the database connection file
include 'connection.php';

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Perform SELECT query to retrieve student data
$sql = "SELECT * FROM studentinfo";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="studentinfo_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Student ID</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Contact</th>";
echo "<th>Gender</th>";
echo "<th>Course ID</th>";
echo "<th>Batch No</th>";
echo "<th>Franchise ID</th>";
echo "<th>Status</th>";
echo "</tr>";

// Write data rows
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['t_id'] . "</td>";
        echo "<td>" . $row['t_name'] . "</td>";
        echo "<td>" . $row['t_email'] . "</td>";
        echo "<td>" . $row['t_contact'] . "</td>";
        echo "<td>" . $row['t_gender'] . "</td>";
        echo "<td>" . $row['t_courseid'] . "</td>";
        echo "<td>" . $row['t_batchid'] . "</td>";
        echo "<td>" . $row['t_franchiseid'] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No student data found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
