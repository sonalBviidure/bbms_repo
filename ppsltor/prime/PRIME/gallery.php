<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodePel">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <title> Gallery </title>
    <link rel="stylesheet" href="css/gallery.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
    <?php include('navbar.php');?>
    <main class="cd__main">
        <main class="main">

        <div class="gallery-heading">
        <h1 class="intern"><span class="latter">G</span>allery</h1>     
            </div>
            <div class="container">
            <?php
                   
                   include('Includes/connection.php');
                   $sql = "SELECT * FROM gallery WHERE status=1";
                                       $result = $con->query($sql);
                   
                                       if ($result->num_rows > 0) {
                                           while ($row = $result->fetch_assoc()) {
                                               $imagePath = $row["gallery_image"];
                                               $imageText = $row["gallery_description"];                          
                                               echo '<div class="card">
                                                       <div class="card-image">
                                                         <a href="admin/' . $imagePath . '" data-fancybox="gallery">
                                                           <img src="admin/' . $imagePath . '" alt="Image Gallery">
                                                           <div class="image-text">' . $imageText . '</div>
                                                         </a>
                                                       </div>
                                                     </div>';
                                           }
                                       } else {
                                           echo "No images found in the database.";
                                       }
                   
                                       ?>
              </div>
        </main>
    </main>
    </section>


    <?php include('footer.php')?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script JS -->
    <script src="js/script.js"></script>

</body>

</html>