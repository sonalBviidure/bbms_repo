<?php
require 'connection.php';

// Fetch data from the events table
$sql = "SELECT * FROM upevents";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Events</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<div class="wrapper">
    <div class="body-overlay"></div>
    <?php require 'sidebar.php' ?>
    <!-- Page Content  -->
    <div id="content" style="background-color:white;">

      <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
              <span class="material-icons">arrow_back_ios</span>
            </button>

            <a class="navbar-brand" href="#"> Dashboard </a>

            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="material-icons">more_vert</span>
            </button>

            <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
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
                    <h2 class="text-center">View Upcoming Events</h2>
                    <div class="text-center mb-3">
                        <!-- Add a button for downloading data as Excel -->
                        <a href="download_upevents.php" class="btn btn-success">Download as Excel</a>
                    </div>
                    <table class="table table-striped table-bordered mt-10" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Up Comming Event Title</th>
                                <th scope="col">Up Comming Event Date</th>
                                <th scope="col">Up Comming Location</th>
                                <th scope="col">Up Comming Meeting Link</th>
                                <th scope="col">Up Comming Image 1</th>
                                <th scope="col">Up Comming Image 2</th>
                               
                                <th scope="col">Status</th>
                                <th scope="col">Operation</th>
                            </tr> 
                        </thead>
                        <tbody class="text-center">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $srno = $row["upevent_id"];
                                    echo "<tr>";
                                    echo "<td>" . $row["upevent_title"] . "</td>";
                                    echo "<td>" . $row["upevent_date"] . "</td>";
                                    echo "<td>" . $row["upevent_location"] . "</td>";
                                     echo "<td>" . $row["upevent_meet"] . "</td>";
                                    echo "<td><img src='" . $row["upevent_image1"] . "' alt='Image 1' style='width: 90px; height: 90px;'></td>";
                                    echo "<td><img src='" . $row["upevent_image2"] . "' alt='Image 2' style='width: 90px; height: 90px;'></td>";
                                   
                                    echo "<td>
                                        <input type='checkbox' id='statusSwitch$srno' data-toggle='toggle' " . ($row['status'] == 1 ? 'checked' : '') . " onchange='toggleStatus($srno, this.checked)'>
                                    </td>";
                                    echo "<td>
                                        <a href='updateupevent.php?updateid=$srno' class='btn btn-primary text-light'>Update</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='10'>No events found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS, and finally DataTables JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $(document).on('change', '[data-toggle="toggle"]', function() {
                var memberId = $(this).attr('id').replace('statusSwitch', '');
                var isChecked = $(this).prop('checked') ? 1 : 0;
                toggleStatus(memberId, isChecked);
            });
        });

        function toggleStatus(memberId, isChecked) {
            var status = isChecked ? 1 : 0;
            window.location.href = "UpEventStatus.php?id=" + memberId + "&status=" + status;
        }
    </script>
</body>

</html>