<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodePel">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <title>Sub Course</title>
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom styles for cards */
        .card {
            margin-bottom: 30px;
            border: none; /* Remove default card border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        .card-img-top {
            max-height: 400px; /* Set a maximum height for the card image */
            object-fit: cover; /* Cover the entire card with the image */
            border-radius: 10px 10px 0 0; /* Rounded corners for the top */
        }

        .card-body {
            padding: 20px; /* Add padding inside the card body */
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #3498db; /* Custom primary button color */
            border-color: #3498db; /* Custom primary button border color */
        }

        .btn-primary:hover {
            background-color: #2980b9; /* Custom primary button hover color */
            border-color: #2980b9; /* Custom primary button hover border color */
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <main class="container" style=" margin-top:100px;">
        <div class="row">
            <?php 
            // Include the database connection file
            require_once 'Includes/connection.php';
            if(isset($_GET['t_name'])){
                $t_name=$_GET['t_name'];

                // Query to fetch subcourses data
                $sql = "SELECT * FROM subcourse WHERE coursename='$t_name' AND status=1";
                $result = mysqli_query($con, $sql);

                // Check if data is fetched successfully
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="admin/<?php echo $row['subcourseimage']; ?>"  class="card-img-top" alt="Course Image" style="height: 350px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['subcoursename']; ?></h5>
                        <p class="card-text">Starting Date: <?php echo $row['starting_date']; ?></p>
                        <p class="card-text">Trainer: <?php echo $row['trainer']; ?></p>
                        <p class="card-text">Duration: <?php echo $row['duration']; ?> Hours</p>
                        <!-- Button to download syllabus -->
                        <form id="downloadForm" method="post" action="downloadsyllabusinquiry.php">
                            <input type="hidden" name="subcoursename" id="subcoursenameInput">
                            <button type="submit" class="btn btn-primary">Download Syllabus</button>
                        </form>

                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
                    // Error handling if query fails
                    echo "Error fetching subcourses: " . mysqli_error($con);
                }
                // Close database connection
                mysqli_close($con);
            }
            ?>
        </div>
    </main>
    <?php include('footer.php');?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        // Handle click event on download button
        $('.btn-primary').on('click', function(event) {
            event.preventDefault(); // Prevent default button behavior

            // Get the subcoursename from the card title
            var subcoursename = $(this).closest('.card-body').find('.card-title').text().trim();
            
            // Set the subcoursename value in the hidden input field
            $('#subcoursenameInput').val(subcoursename);
            
            // Submit the form
            $('#downloadForm').submit();
        });
    });
</script>
</body>

</html>
