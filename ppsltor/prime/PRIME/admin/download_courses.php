<?php
// Include the database connection file
include 'connection.php';

// Fetch data from the course table
$sql = "SELECT * FROM course";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="courses_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Course Id</th>";
echo "<th>Main Course</th>";
echo "<th>Main Course Image</th>";
echo "<th>Status</th>";
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['t_id'] . "</td>";
        echo "<td>" . $row['t_name'] . "</td>";
        echo "<td>" . $row['t_image'] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
