<?php
include 'connection.php';

if (isset($_POST['state'])) {
    $state = $_POST['state'];

    // Fetch districts based on state
    $query = "SELECT * FROM district_table WHERE state_name = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $state);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<option value="">Select District</option>';
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['district_name']}'>{$row['district_name']}</option>";
        }
    } else {
        echo '<option value="">No Districts Available</option>';
    }
}
?>
