<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Our Matrix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/franchise.css">
</head>

<body>
    <?php include('navbar.php');?>

    <header>
        <h1 class="text-center"><span class="icon">O</span>ur <span class="icon">M</span>atrix</h1>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <?php
              require 'connection.php';
              // Check connection
              if ($con->connect_error) {
                  die("Connection failed: " . $con->connect_error);
              }

              $sql = "SELECT * FROM franchise WHERE status=1";
              $result = $con->query($sql);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo '<div class="card mx-4 g-4" style="width: 18rem;">
                              <img src="admin/image/' . $row['t_image'] . '" class="card-img-top" alt="..." style=" height: 200px;">
                              <div class="card-body">
                                  <p class="card-text">
                                      <i class="fas fa-map-marker-alt location-icon mb-2"></i> ' . $row['t_location'] . ', ' . $row['t_district'] . ', ' . $row['t_state'] . '<br>
                                      <i class="fas fa-user owner-icon mb-2"></i> ' . $row['t_ownername'] . '<br>
                                      <i class="fas fa-phone contact-icon mb-2"></i> ' . $row['t_contact'] . '<br>
                                      <i class="fas fa-envelope email-icon mb-2"></i> ' . $row['t_email'] . '
                                  </p>
                              </div>
                          </div>';
                  }
              } else {
                  echo "0 results";
              }

$con->close();
?>

        </div>
    </div>

    <?php include('footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>