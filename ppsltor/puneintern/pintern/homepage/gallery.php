<?php
//include "db_conn.php"
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $t_gallery_img = $_POST["t_gallery_img"];
    $t_gallery_desc = $_POST["t_gallery_desc"];
   
    // Insert data into MySQL database
    $sql = "INSERT INTO gallery (t_gallery_img, t_gallery_desc) 
    VALUES ('$t_gallery_img', '$t_gallery_desc')";
    if ($conn->query($sql) === TRUE) {
       echo "connected successfully";
        // header("Location: .php");
        exit();
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f2f2f2;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2 class="mt-5">Gallery</h2>
    <form action="g_upload.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Select Image</label>
            <input class="form-control" type="file" id="image" name="t_gallery_img">
        </div>
        <div class="mb-3">
            <label for="imageDescription" class="form-label">Image Description</label>
            <textarea class="form-control" id="imageDescription" name="t_gallery_desc" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
    </form>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>




