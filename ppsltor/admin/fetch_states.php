<?php
include 'connection.php';
$result = mysqli_query($con, "SELECT * FROM states");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
?>
