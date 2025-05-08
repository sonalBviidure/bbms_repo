<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ltor_academy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from your table
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="table_data.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>ID</th>";
echo "<th>First Name</th>";
echo "<th>Middle Name</th>";
echo "<th>Last Name</th>";
echo "<th>contact</th>";
echo "<th>emailid</th>";
echo "<th>state</th>";
echo "<th>district</th>";
echo "<th>subdistrict</th>";
echo "<th>village</th>";
echo "<th>pincode</th>";
echo "<th>password</th>";

// Add more headers for other columns as needed...
echo "</tr>";

// Write data rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["t_id"] . "</td>";
        echo "<td>" . $row["t_first_name"] . "</td>";
        echo "<td>" . $row["t_middle_name"] . "</td>";
        echo "<td>" . $row["t_last_name"] . "</td>";
        echo "<td>" . $row["t_contact"] . "</td>";
         echo "<td>" . $row["t_emailid"] . "</td>";
                      echo "<td>" . $row["t_state"] . "</td>";
                                    echo "<td>" . $row["t_district"] . "</td>";
                                    echo "<td>" . $row["t_subdistrict"] . "</td>";
                                    echo "<td>" . $row["t_village"] . "</td>";
                                    echo "<td>" . $row["t_pincode"] . "</td>";
                                    echo "<td>" . $row["t_password"] . "</td>";
        // Add more cells for other columns as needed...
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No registration data found</td></tr>";
}

// End Excel file
echo "</table>";

// Close database connection
$conn->close();
?>