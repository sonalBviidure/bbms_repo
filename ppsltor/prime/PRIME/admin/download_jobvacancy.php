<?php
require 'connection.php'; // Include the database connection file

// Fetch data from the job_vacancies table
$sql = "SELECT * FROM job_vacancies";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="job_vacancies_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Job Title</th>";
echo "<th>Basic Skills</th>";
echo "<th>Location</th>";
echo "<th>Salary</th>";
echo "<th>Apply By</th>";
echo "<th>Status</th>";
// Add more headers for other columns as needed...
echo "</tr>";

// Write data rows
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["job_title"] . "</td>";
        echo "<td>" . $row["skills_required"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["salary"] . "</td>";
        echo "<td>" . $row["late_date"] . "</td>";
        echo "<td>" . ($row["status"] == 1 ? 'Active' : 'Inactive') . "</td>";
        // Add more cells for other columns as needed...
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No job vacancies found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
