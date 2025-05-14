<?php
require 'connection.php';
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $aboutUsText = $_POST['aboutustext']; // Assuming the textarea has name="aboutustext"
    $aboutUsImage = $_FILES['aboutusimage']['name']; // Assuming the file input has name="aboutusimage"

    // Move uploaded file to a specific directory (you may want to adjust the path)
    $uploadDirectory = "image/";
    $uploadedFilePath = $uploadDirectory . basename($aboutUsImage);

    move_uploaded_file($_FILES['aboutusimage']['tmp_name'], $uploadedFilePath);

    // Perform SQL query to insert data into the database
    // Assuming you have an established database connection
$stmt = $con->prepare("UPDATE about_us SET about_us_text = ?, about_us_image = ? WHERE id = 11");

// Bind the parameters
$stmt->bind_param("ss", $aboutUsText, $uploadedFilePath);

// Execute the statement
if ($stmt->execute()) {
    echo "About Us updated successfully.";
} else {
    echo "Error updating About Us: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>About Us
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




    <!--google material icon-->
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
                                    <a class="nav-link" href="index.php">
                                    <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #f9fafb;"></i>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="main-content">
                <div class="container">
                    <!-- About Us Section -->
                    <h2>About Us</h2>
                    <div class="about-us-section">
                        <form id="updateAboutUsForm" action="" method="post" enctype="multipart/form-data"
                            class="form-horizontal">
                            <div class="form-row align-items-center">
                                <div class="form-group col-md-5">
                                    <label for="aboutustext">About Us Text:</label>
                                    <textarea class="form-control" id="aboutustext" name="aboutustext" rows="2"
                                        required></textarea>
                                </div>
                                <div class="form-group col-md-5" style="margin-top:-20px;">
                                    <label for="aboutusimage">About Image:</label>
                                    <div class="border p-1" style="border-radius: 5px;">
                                        <input type="file" class="form-control-file" id="aboutusimage"
                                            name="aboutusimage" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="submit" class="btn btn-primary mt-3" value="Update">
                                </div>
                            </div>
                        </form>
                        <table id="dataTable" class="table mt-4">
                            <thead>
                                <tr>
                                    <th>About Us Text</th>
                                    <th>About Image</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                        // Perform SQL query to fetch data from the database
                                        $sql = "SELECT * FROM about_us";
                                        $result = $con->query($sql);

                                        // Check if the query was successful
                                        if ($result) {
                                            // Fetch data and display it in the table
                                            while ($row = $result->fetch_assoc()) {
                                                $srno = $row['id']; // Move this line here
                                                echo "<tr>";
                                                echo "<td width='700'>" . $row['about_us_text'] . "</td>";
                                                echo "<td><img src='" . $row['about_us_image'] . "' width='100' height='100'></td>"; // Assuming image path is stored in the database
                                                echo "<td><a href='UpdateAboutus.php?updateid=$srno' class='btn btn-primary text-light'>Update</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "Error: " . $sql . "<br>" . $con->error;
                                        }
                            ?>

                                <!-- Data will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>


        <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('.more-button,.body-overlay').on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });
        </script>

</body>

</html>