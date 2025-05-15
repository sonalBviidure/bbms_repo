<?php
include 'connection.php';

$Id = $_GET['updateid'] ?? '';

// Check if the ID is valid
if (!is_numeric($Id)) {
    // echo "Invalid ID";
    exit;
}
// Retrieve current gallery content from the database
$sql = "SELECT * FROM gallery WHERE id ='$Id' "; // Assuming id 1 is used for About Us content
$result = mysqli_query($con, $sql);

// Check if there is any data available
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $galleryText = $row['gallery_description'];
    $galleryImage = $row['gallery_image'];
} else {
    $galleryText = '';
    $galleryImage = '';
}

// Check if form is submitted
if(isset($_POST['update'])) {

    // Assign form values to variables
    $newgalleryText = $_POST['gallery_description'] ?? '';
    $newgalleryImage = $_FILES['galleryImage']['name'] ?? '';

    if(!empty($newgalleryImage)) {
        $targetDir = "image/";
        $targetFilePath = $targetDir . basename($newgalleryImage);
        // Move the uploaded file to the target directory
        if(move_uploaded_file($_FILES["galleryImage"]["tmp_name"], $targetFilePath)) {
            // If file upload is successful, update the database with the complete path
            $newgalleryImage = $targetFilePath; // Update $newgalleryImage with the complete path
        } else {
            // If file upload fails, you can handle the error here
            // For example, you can display an error message or log the error
        }
    }
    // Check if new data is provided
    if(!empty($newgalleryText) || !empty($newgalleryImage)) {
        // Update data with new values
        $updateQuery = "UPDATE gallery SET ";
        if(!empty($newgalleryText)) {
            $updateQuery .= "gallery_description = '$newgalleryText'";
        }
        if(!empty($newgalleryImage)) {
            if(!empty($newgalleryText)) {
                $updateQuery .= ", ";
            }
            $updateQuery .= "gallery_image = '$newgalleryImage'";
        }
        $updateQuery .= " WHERE id = '$Id'";
        
        // Execute update query
        mysqli_query($con, $updateQuery);
        
        
        // Redirect to the same page or any other page after successful update
        header("Location: ./Gallery.php");
        exit();
    } else {
        // No new data entered, so do nothing
        // You can choose to display a message or handle it differently
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
        <!-- Page Content  -->
        <div id="content" style="background-color:white;">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                            id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="material-icons">person</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="main-content">
            <div class="container card shadow p-3 bg-white rounded">
                    <h2 class="text-center">Update Gallery</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form method="post" enctype="multipart/form-data">
                                <!-- Add hidden input for gallery ID -->
                                <input type="hidden" name="gallery_id" value="<?php echo $Id; ?>">

                                <!-- Add input for image -->
                                <div class="form-group">
                                    <label for="gallery_image">Gallery Image:</label>
                                    <div class="border p-1" style="border-radius: 5px;">
                                        <img src="<?php echo $galleryImage; ?>" alt="Gallery Image" style="max-width: 100px; max-height: 100px;">
                                        <input type="file" class="form-control-file mt-2" id="galleryImage" name="galleryImage" accept="image/*">
                                    </div>
                                </div>

                                <!-- Add textarea for description -->
                                <div class="form-group">
                                    <label for="gallery_description">Gallery Description:</label>
                                    <textarea class="form-control" id="gallery_description" name="gallery_description" rows="3"><?php echo $galleryText; ?></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-primary mt-3" name="update" value="Update">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
    </script>
</body>

</html>
