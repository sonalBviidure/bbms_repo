<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "tnp_k";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["status"])) {
    $status_updates = $_POST["status"];

    // Get all existing IDs in the database to compare against form data
    $sql = "SELECT gal_id  FROM gallery";
    $result = $conn->query($sql);
    $existing_ids = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $existing_ids[] = $row["gal_id"];
        }
    }

    foreach ($existing_ids as $id) {
        // Determine if the checkbox for this ID was checked
        $checked = in_array($id, $status_updates) ? 1 : 0;

        // Update status in the database
        $sql_update = "UPDATE gallery  SET status='$checked' WHERE gal_id ='$id'";
        $conn->query($sql_update);
    }

    echo "Changes saved successfully";
} else {
    echo "No changes to save";
}

$conn->close();
?>
