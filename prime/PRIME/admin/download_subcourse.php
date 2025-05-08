<?php
// Include the database connection file
include 'connection.php';

// Fetch data from the subcourse table
$sql = "SELECT * FROM subcourse";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="subcourses_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Sub Course Name</th>";
echo "<th>Trainer</th>";
echo "<th>Starting Date</th>";
echo "<th>Syllabus</th>";
echo "<th>Course Image</th>";
echo "<th>Status</th>";
echo "<th>Course Name</th>";
echo "<th>Duration</th>";
echo "<th>Mode</th>";
echo "<th>Sub Course Image</th>";
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['subcoursename'] . "</td>";
        echo "<td>" . $row['trainer'] . "</td>";
        echo "<td>" . $row['starting_date'] . "</td>";
        echo "<td>" . $row['syllabus'] . "</td>";
        echo "<td>" . $row['courseimage'] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
        echo "<td>" . $row['coursename'] . "</td>";
        echo "<td>" . $row['duration'] . "</td>";
        echo "<td>" . $row['mode'] . "</td>";
        echo "<td>" . $row['subcourseimage'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>No records found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
