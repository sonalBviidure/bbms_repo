<?php
require 'connection.php';

// Fetch data from the events table
$sql = "SELECT * FROM events";
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
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
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
                <div class="container">
                    <h2 class="text-center">View Events</h2>
                    <table class="table table-striped table-bordered mt-10" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Event Title</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Event Image 1</th>
                                <th scope="col">Event Image 2</th>
                                <th scope="col">Event Image 3</th>
                                <th scope="col">Event Image 4</th>
                                <th scope="col">Event Image 5</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operation</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $srno=$row["event_id"];
                                    echo "<tr>";
                                    echo "<td>" . $row["event_title"] . "</td>";
                                    echo "<td>" . $row["event_date"] . "</td>";
                                    echo "<td>" . $row["event_location"] . "</td>";
                                    echo "<td><img src='" . $row["event_image1"] . "' alt='Image 1' style='width: 90px; height: 90px;'></td>";
                                    echo "<td><img src='" . $row["event_image2"] . "' alt='Image 2' style='width: 90px; height: 90px;'></td>";
                                    echo "<td><img src='" . $row["event_image3"] . "' alt='Image 3' style='width: 90px; height: 90px;'></td>";
                                    echo "<td><img src='" . $row["event_image4"] . "' alt='Image 4' style='width: 90px; height: 90px;'></td>";
                                    echo "<td><img src='" . $row["event_image5"] . "' alt='Image 5' style='width: 90px; height: 90px;'></td>";
                                   echo' <td>
                                    <input type="checkbox" id="statusSwitch' . $srno . '" data-toggle="toggle" ' . ($row['status'] == 1 ? 'checked' : '') . ' onchange="toggleStatus(' . $srno . ', this.checked)">
                                  </td>';
                          echo'<td>
                          <script>
                                    function toggleStatus(memberId, isChecked) {
                                        var status = isChecked ? 1 : 0;
                                        window.location.href = "EventStatus.php?id=" + memberId + "&status=" + status;
                                    }
                                  </script>
                          <a href="updateevents.php? updateid=' . $srno . '" class="btn btn-primary text-light">Update</a>
                      </td>';
                      
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9'>No events found</td></tr>";
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

            $('.more-button,.body-overlay').on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
        });

        $(document).ready(function() {
            $("#myTable").dataTable();
        });
    </script>
</body>

</html>
