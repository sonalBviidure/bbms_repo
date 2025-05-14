<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Events</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/event.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <?php include('navbar.php');?>

    <div class="container mt-5 pt-4">
        <h1 class="text-center mb-5"><span class="letter">E</span>vents</h1>
        
        <div class="row">
             <?php
                    require 'connection.php'; 
                    $sql = "SELECT * FROM gallery WHERE status=1";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $imagePath = $row["gallery_image"];
                            $imageText = $row["gallery_description"];                          
                            echo '<div class="col-md-4">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="admin/' . $imagePath . '" data-fancybox="gallery">
                                                <img src="admin/' . $imagePath . '" class="img-fluid" alt="Gallery Image">
                                                <div class="image-text">' . $imageText . '</div>
                                            </a>
                                        </div>
                                    </div>
                                  </div>';
                        }
                    } else {
                        echo "<p>No images found in the database.</p>";
                    }
                    ?>
        </div>
    </div>

    
    <section>
        <div class="container mb-5">
            <h2 class="mb-5 mt-5 text-center">Upcoming Events</h2>
            <!-- Rest of your upcoming events section remains unchanged -->
        </div>
    </section>


    <?php include('footer.php');?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>