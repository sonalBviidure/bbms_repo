<?php
include 'connection.php';

if (isset($_POST['district'])) {
    $district = $_POST['district'];

    // Fetch talukas based on district
    $query = "SELECT * FROM taluka_table WHERE district_name = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $district);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<option value="">Select Taluka</option>';
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['taluka_name']}'>{$row['taluka_name']}</option>";
        }
    } else {
        echo '<option value="">No Talukas Available</option>';
    }
}
?>
