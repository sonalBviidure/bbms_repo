<?php
include 'connection.php';

// Delete matrix if requested
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "UPDATE matrices SET status = 0 WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Fetch all active matrices
$sql = "SELECT * FROM matrices WHERE status = 1";
$result = $con->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Matrices</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
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
                <div class="container card shadow p-3 bg-white rounded">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>View Matrices</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="matrixTable">
                                    <thead>
                                        <tr>
                                            <th>Matrix Name</th>
                                            <th>Area</th>
                                            <th>Contact Person</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['matrix_name'] . "</td>";
                                                echo "<td>" . $row['matrix_area'] . "</td>";
                                                echo "<td>" . $row['contact_person'] . "</td>";
                                                echo "<td>" . $row['contact_number'] . "</td>";
                                                echo "<td>" . $row['email'] . "</td>";
                                                echo "<td>" . $row['address'] . "</td>";
                                                echo "<td>";
                                                if($row['photo']) {
                                                    echo "<img src='" . $row['photo'] . "' width='100' height='100'>";
                                                } else {
                                                    echo "No photo";
                                                }
                                                echo "</td>";
                                                echo "<td>
                                                    <a href='edit_matrix.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                                    <button onclick='deleteMatrix(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' class='text-center'>No matrices found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#matrixTable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": 10,
            "searching": true,
            "ordering": true,
            "language": {
                "lengthMenu": "Show _MENU_ Entries",
                "search": "Search:",
                "paginate": {
                    "previous": "Previous",
                    "next": "Next"
                },
                "info": "Showing _START_ to _END_ of _TOTAL_ Entries"
            }
        });
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });
    });

    function deleteMatrix(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this matrix?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `view_matrix.php?delete=${id}`;
            }
        })
    }
    </script>
</body>
</html>