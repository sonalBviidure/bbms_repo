<?php
include 'connection.php';
$taluka = $_POST['taluka_name'];
$query = "SELECT * FROM area WHERE taluka_name='$taluka'";
$result = mysqli_query($con, $query);
echo '<option value="">Select Area</option>';
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['area_name']}'>{$row['area_name']}</option>";
}
?>
