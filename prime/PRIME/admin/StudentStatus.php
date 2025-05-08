<?php
require 'connection.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$id=$_GET['id'];
$status=$_GET['status'];

$updateQuery="UPDATE studentinfo  SET status=$status WHERe t_id=$id";

mysqli_query($con,$updateQuery);
header('Location: ./viewstudent.php');

?>