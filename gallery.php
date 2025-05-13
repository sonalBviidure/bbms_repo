<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodePel">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Gallery</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="css/gallery.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main.flex-fill {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
        }

        .gallery-heading {
            text-align: center;
            margin: 30px 0;
        }

        .gallery-heading .icon {
            color: #007bff;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-image {
            position: relative;
        }

        .image-text {
            position: absolute;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            width: 100%;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper d-flex flex-column min-vh-100">
        <?php include('navbar.php'); ?>

        <main class="flex-fill">
            <div class="gallery-heading">
                <h1><span class="icon">The G</span>allery</h1>
            </div>

            <div class="container">
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
        </main>

        <?php include('footer.php'); ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
