<?php
// Include the database connection file
require 'connection.php';

// Fetch data from the facultyinfo table
$sql = "SELECT * FROM facultyinfo";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="faculty_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Faculty Id</th>";
echo "<th>Name</th>";
echo "<th>Gender</th>";
echo "<th>Contact</th>";
echo "<th>Date of Birth</th>";
echo "<th>Experience</th>";
echo "<th>Skill1</th>";
echo "<th>Skill2</th>";
echo "<th>Skill3</th>";
echo "<th>Achievement1</th>";
echo "<th>Achievement2</th>";
echo "<th>Achievement3</th>";
echo "<th>Maximum Students</th>";
echo "<th>Education</th>";
echo "<th>Qualification</th>";
echo "<th>Franchise Id</th>";
echo "<th>Status</th>";
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['t_id'] . "</td>";
        echo "<td>" . $row['t_name'] . "</td>";
        echo "<td>" . $row['t_gender'] . "</td>";
        echo "<td>" . $row['t_contact'] . "</td>";
        echo "<td>" . $row['t_dob'] . "</td>";
        echo "<td>" . $row['t_experienceyear'] . "</td>";
        echo "<td>" . $row['t_skills1'] . "</td>";
        echo "<td>" . $row['t_skills2'] . "</td>";
        echo "<td>" . $row['t_skills3'] . "</td>";
        echo "<td>" . $row['t_achievement1'] . "</td>";
        echo "<td>" . $row['t_achievement2'] . "</td>";
        echo "<td>" . $row['t_achievement3'] . "</td>";
        echo "<td>" . $row['t_maximumstudent'] . "</td>";
        echo "<td>" . $row['t_education'] . "</td>";
        echo "<td>" . $row['t_qualification'] . "</td>";
        echo "<td>" . $row['t_franchiseid'] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='17'>No records found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
