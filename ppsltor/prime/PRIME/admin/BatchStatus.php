<?php
require 'connection.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$id=$_GET['id'];
$status=$_GET['status'];

$updateQuery="UPDATE batch  SET status=$status WHERE t_no=$id";

mysqli_query($con,$updateQuery);
header('Location: ./viewbatch.php');

?>