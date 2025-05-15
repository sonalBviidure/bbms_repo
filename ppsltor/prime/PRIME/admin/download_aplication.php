<?php
// Include the database connection file
require 'connection.php';

// Fetch data from the job_application table
$sql = "SELECT * FROM job_application";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="job_applications.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Name</th>";
echo "<th>Contact</th>";
echo "<th>Date of Birth</th>";
echo "<th>Education</th>";
echo "<th>College</th>";
echo "<th>Experience</th>";
echo "<th>Skills</th>";
echo "<th>Qualification</th>";
echo "<th>Position</th>";
echo "<th>Application Datetime</th>";
echo "</tr>";

// Write data rows
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['contact'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "<td>" . $row['education'] . "</td>";
        echo "<td>" . $row['college'] . "</td>";
        echo "<td>" . $row['experience'] . "</td>";
        echo "<td>" . $row['skills'] . "</td>";
        echo "<td>" . $row['qualification'] . "</td>";
        echo "<td>" . $row['position'] . "</td>";
        echo "<td>" . $row['application_datetime'] . "</td>";
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
