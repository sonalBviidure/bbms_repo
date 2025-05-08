<?php
// Include the database connection file
require 'connection.php';

// Fetch data from the agreementdetails table
$sql = "SELECT * FROM agreementdetails";
$result = mysqli_query($con, $sql);

// Set headers to force download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="agreement_details.xls"');

// Start Excel file
echo "<table border='1'>";
// Write column headers
echo "<tr>";
echo "<th>Agreement Id</th>";
echo "<th>Party A Name</th>";
echo "<th>Party B Name</th>";
echo "<th>Start Date</th>";
echo "<th>End Date</th>";
echo "<th>Fee Of Joining</th>";
echo "<th>Revenue A Percentage</th>";
echo "<th>Revenue B Percentage</th>";
echo "<th>Revenue Date</th>";
echo "<th>Party B Contact</th>";
echo "<th>Party B Email</th>";
echo "<th>Franchise Id</th>";
echo "<th>Status</th>";
echo "</tr>";

// Write data rows
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['t_id'] . "</td>";
        echo "<td>" . $row['t_partyaname'] . "</td>";
        echo "<td>" . $row['t_partybname'] . "</td>";
        echo "<td>" . $row['t_startdate'] . "</td>";
        echo "<td>" . $row['t_enddate'] . "</td>";
        echo "<td>" . $row['t_feeofjoining'] . "</td>";
        echo "<td>" . $row['t_revenueofA'] . "</td>";
        echo "<td>" . $row['t_revenueofB'] . "</td>";
        echo "<td>" . $row['t_renewaldate'] . "</td>";
        echo "<td>" . $row['t_partybcontact'] . "</td>";
        echo "<td>" . $row['t_partybemail'] . "</td>";
        echo "<td>" . $row['t_franchiseid'] . "</td>";
        echo "<td>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13'>No records found</td></tr>";
}

// End Excel file
echo "</table>";

// Close the database connection
mysqli_close($con);
?>
