<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>View Student Fees</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
                <div class="container">
                    <h2 style=" text-align:Center">View Student Fees</h2>
                    <table class="table table-striped table-bordered mt-5" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Total Fee</th>
                                <th scope="col">1st Installment</th>
                                <th scope="col">2nd Installment</th>
                                <th scope="col">3rd Installment</th>
                                <th scope="col">Balance Amount</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'connection.php';
                            $sql = "SELECT * FROM studentfee";
                            $stmt = $con->prepare($sql);
                            if ($stmt) {
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    $srno = $row['t_no'];
                                    $name = $row['t_name'];
                                    $totalFee = $row['t_totalfee'];
                                    $firstInstallment = $row['t_installment1'];
                                    $secondInstallment = $row['t_installment2'];
                                    $thirdInstallment = $row['t_installment3'];
                                    $balanceAmount = $row['t_balanceamount'];
                                    echo '<tr>
                                        <th scope="row">' . $srno . '</th>
                                        <td>' . $name . '</td>
                                        <td>' . $totalFee . '</td>
                                        <td>' . $firstInstallment . '</td>
                                        <td>' . $secondInstallment . '</td>
                                        <td>' . $thirdInstallment . '</td>
                                        <td>' . $balanceAmount . '</td>
                                        <td><a href="updatestudentfee.php?updateid=' . $srno . '" class="btn btn-primary text-light">Update</a>
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
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="custom.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar, .body-overlay').on('click', function() {
            $("#sidebar, .body-overlay").toggleClass('show-nav');
        });
    });

    $(document).ready(function() {
        $("#myTable").dataTable();
    });
    </script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    let table = new DataTable('#myTable');
    </script>

    </div>
</body>

</html>