<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $state = $_POST['state'];
    $district = $_POST['district'];
    $taluka = $_POST['taluka'];
    $matrix_name = $_POST['matrix_name'];
    $contact_person = $_POST['contact_person'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO matrices (state, district, taluka, matrix_name, contact_person, contact_number, email, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, 1)";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssss", $state, $district, $taluka, $matrix_name, $contact_person, $contact_number, $email);
    
    if ($stmt->execute()) {
        header("Location: contact.php?success=1");
    } else {
        header("Location: contact.php?error=1");
    }
}
?>