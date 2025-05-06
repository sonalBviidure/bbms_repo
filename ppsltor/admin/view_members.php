<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle status toggle
if(isset($_GET['toggle'])) {
    $id = $_GET['toggle'];
    $status = $_GET['status'];
    
    $sql = "UPDATE board_members SET status = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $status, $id);
    if($stmt->execute()) {
        header("Location: view_members.php");
        exit();
    }
}

// Fetch all members with matrix and category names
$sql = "SELECT bm.*, m.matrix_name, c.category_name 
        FROM board_members bm 
        LEFT JOIN matrices m ON bm.matrix_id = m.id 
        LEFT JOIN categories c ON bm.category_id = c.id";
$result = $con->query($sql);

// Remove the PHP code that was causing the error
// The toggle button HTML will be generated in the table loop below
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Members</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap-toggle.min.js"></script>

    <style>
    .toggle.btn {
        min-width: 100px;
        display: flex;
        justify-content: center;
        margin: 0 auto;
    }
    </style>
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
                    </div>
                </nav>
            </div>

            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2>View Members</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="memberTable">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Business Name</th>
                                    <th>Matrix</th>
                                    <th>Category</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['member_name'] . "</td>";
                                        echo "<td>" . $row['business_name'] . "</td>";
                                        echo "<td>" . $row['matrix_name'] . "</td>";
                                        echo "<td>" . $row['category_name'] . "</td>";
                                        echo "<td>" . $row['contact_number'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>";
                                        if ($row['photo']) {
                                            echo "<img src='image/" . $row['photo'] . "' alt='Member Photo' style='width: 50px; height: 50px; object-fit: cover; border-radius: 50%;'>";
                                        } else {
                                            echo "<img src='image/default-user.png' alt='Default Photo' style='width: 50px; height: 50px; object-fit: cover; border-radius: 50%;'>";
                                        }
                                        echo "</td>";
                                        echo "<td class='text-center'>";
                                        echo "<input type='checkbox' data-toggle='toggle' data-size='sm' " . 
                                             ($row['status'] == 1 ? 'checked' : '') . " 
                                             data-on='Active' data-off='Inactive' 
                                             data-onstyle='success' data-offstyle='danger'
                                             onchange='toggleStatus(" . $row['id'] . ", this.checked); return false;'>";
                                        echo "</td>";
                                        echo "<td>
                                            <a href='edit_member.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                            <button onclick='deleteMember(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

    <!--In the head section, remove the duplicate DataTables script and update the order-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#memberTable').DataTable({
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
                "info": "Showing _START_ to _END_ of _TOTAL_ Entries",
                "zeroRecords": "No Data Available In Table"
            },
            "order": [[0, 'asc']]
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });
    });

    function deleteMember(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'delete_member.php?id=' + id;
            }
        });
    }
    </script>
    <script>
function toggleStatus(id, isChecked) {
    var status = isChecked ? 1 : 0;
    var toggle = event.target;
    toggle.disabled = true;
    window.location.href = 'view_members.php?toggle=' + id + '&status=' + status;
}
</script>
</body>
</html>