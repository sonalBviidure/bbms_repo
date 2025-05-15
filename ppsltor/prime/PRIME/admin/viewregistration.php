<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- css3 -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'; ?>
        <!-- Page Content  -->
        <div id="content" style="background-color:white;">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
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
                    <h2 class="text-center">View Registration</h2>
                    <div class="text-center mb-3">
                        <!-- Add a button for downloading data as Excel -->
                        <a href="download_registration.php" class="btn btn-success">Download as Excel</a>
                    </div>
                    <title>Upload Excel File</title>
                </head>
                <body>
                    <h2>Upload Excel File</h2>
                    <form action="process_excel_upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="excel_file" accept=".xls, .xlsx">
                        <button type="submit" name="submit">Upload</button>
                    </form>
                    <table class="table table-striped table-bordered mt-10" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">State</th>
                                <th scope="col">District</th>
                                <th scope="col">Subdistrict</th>
                                <th scope="col">Village</th>
                                <th scope="col">Pincode</th>
                                <th scope="col">Password</th>
                                <th scope="col">Status</th>
                                <th scope="col">Login Status</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            require 'connection.php'; // Include the database connection file

                            $sql = "SELECT * FROM registration";
                            $result = $con->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["t_id"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_first_name"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_middle_name"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_last_name"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_contact"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_emailid"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_state"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_district"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_subdistrict"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_village"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_pincode"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["t_password"]) . "</td>";
                                    echo "<td>";
                                    if (isset($row['status'])) {
                                        echo "<input type='checkbox' id='statusSwitch{$row['t_id']}' data-toggle='toggle' " . ($row['status'] == 1 ? 'checked' : '') . " onchange='toggleStatus({$row['t_id']}, this.checked)'></td>";
                                    }
                                       echo "<td>";
                                    if (isset($row['login_status'])) {
                                        echo ($row['status'] == 1 ? 'Enabled' : 'Disabled');
                                    }
                                    echo "</td>";

                                    echo "<td><a href='UpdateRegistration.php?updateid=" . urlencode($row['t_id']) . "' class='btn btn-primary text-light'>Update</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='15'>No registration data found</td></tr>";
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

            $('#myTable').DataTable();
        });

        function toggleStatus(memberId, isChecked) {
            var status = isChecked ? 1 : 0;
            window.location.href = "RegistrationStatus.php?id=" + memberId + "&status=" + status;
        }
        
        // Check if a status message is present in the URL and show alert accordingly
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'success') {
            alert('File uploaded and database updated successfully!');
        } else if (status === 'error') {
            alert('Error uploading file or updating database.');
        } else if (status === 'format') {
            alert('Sorry, only CSV files are allowed.');
        } else if (status === 'empty') {
            alert('Please choose a file to upload.');
        }
    
    </script>

</body>

</html>
