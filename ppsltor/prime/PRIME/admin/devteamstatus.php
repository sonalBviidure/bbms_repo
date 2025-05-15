<?php
require 'connection.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$id=$_GET['id'];
$status=$_GET['status'];

$updateQuery="UPDATE devloperteam  SET status=$status WHERe id=$dev_id";

mysqli_query($con,$updateQuery);
header('Location: ./devloperteam.php');

?>