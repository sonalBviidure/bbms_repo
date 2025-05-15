<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>View Agreement
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/style.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                <div class="container-fluid">
                    <h2 class="text-center" >View Agreement Details</h2>
                    <table class="table table-striped table-bordered mt-10" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Agreement Id</th>
                                <th scope="col">Party A Name</th>
                                <th scope="col">Party B Name</th>
                                <th scope="col">Agreement Copy</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Fee Of Joining</th>
                                <th scope="col">Revenue A Percentage</th>
                                <th scope="col">Revenue B Percentage</th>
                                <th scope="col">Revenue Date</th>
                                <th scope="col">Party B Contact</th>
                                <th scope="col">Party B Email</th>
                                <th scope="col">Party B Photo</th>
                                <th scope="col">Franchiseid</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            require 'connection.php';
            $sql = "select * from agreementdetails";
            $result = mysqli_query($con, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $srno = $row['t_id'];
                $partyAName = $row['t_partyaname'];
                $partyBName = $row['t_partybname'];
                $agreementCopy = $row['t_agreementcopypdf'];
                $startDate = $row['t_startdate'];
                $endDate = $row['t_enddate'];
                $feeOfJoining = $row['t_feeofjoining'];
                $revenueAPercentage = $row['t_revenueofA'];
                $revenueBPercentage = $row['t_revenueofB'];
                $renewalDate = $row['t_renewaldate'];
                $partyBContact = $row['t_partybcontact'];
                $partyBEmail = $row['t_partybemail'];
                $partyBPhoto = $row['t_partybphoto'];
                $franchiseId = $row['t_franchiseid'];

                echo '<tr>
        <th scope="row">' . $srno . '</th>
        <td>' . $partyAName . '</td>
        <td>' . $partyBName . '</td>
        <td><a href="../admin/syllabus/' . $agreementCopy . '" target="_blank">Open Agreement</a></td>
        <td>' . $startDate . '</td>
        <td>' . $endDate . '</td>
        <td>' . $feeOfJoining . '</td>
        <td>' . $revenueAPercentage . '</td>
        <td>' . $revenueBPercentage . '</td>
        <td>' . $renewalDate . '</td>
        <td>' . $partyBContact . '</td>
        <td>' . $partyBEmail . '</td>
        <td>' . $partyBPhoto . '</td>
        <td>' . $franchiseId . '</td> 
        </tr>';
              }
            }
            ?>
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

    $(document).ready(function() {
        $("#myTable").dataTable();
    });
</script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    let table = new DataTable('#myTable');
    </script>
  
</body>

</html>