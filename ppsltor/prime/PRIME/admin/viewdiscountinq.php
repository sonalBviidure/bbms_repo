<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Registration Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Google Material Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Page Content -->
<div id="content" class="active">

    <!-- Top Navbar -->
    <?php include 'topbar.php'; ?>

    <div class="container">
        <h2 class="text-center">Registration Records</h2>

        <!-- Include PHP code for retrieval and display -->
        <?php
        // Include database connection script
        require 'connection.php';

        // Retrieve data from the 'testregi' table
        $sql = "SELECT * FROM testregi";
        $result = mysqli_query($con, $sql);

        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Start displaying registration records in a table
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped text-center">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Name</th>';
            echo '<th>Email</th>';
            echo '<th>Contact Number</th>';
            echo '<th>Courses</th>';
            echo '<th>Test Date</th>';
            echo '<th>Timing</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['t_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['t_email']) . '</td>';
                echo '<td>' . htmlspecialchars($row['t_con']) . '</td>';
                echo '<td>' . htmlspecialchars($row['t_course']) . '</td>';
                echo '<td>' . htmlspecialchars($row['t_date']) . '</td>';
                echo '<td>' . htmlspecialchars($row['t_time']) . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>'; // Close table-responsive div
        } else {
            // Display a message if no records found
            echo '<p class="text-center">No registration records found.</p>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>

    </div>

</div>

<!-- Bootstrap JS and dependencies -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- jQuery (necessary for DataTables) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });

        // Initialize DataTable
        $('#myTable').DataTable();
    });
</script>

</body>
</html>
