<?php
include 'connection.php';
$district = $_POST['district'];
$result = mysqli_query($con, "SELECT * FROM taluka WHERE district_name='$district'");
echo "<option value=''>Select Taluka</option>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['taluka_name']}'>{$row['taluka_name']}</option>";
}
?>
