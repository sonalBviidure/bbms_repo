<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle status toggle
if(isset($_GET['toggle'])) {
    $id = $_GET['toggle'];
    $status = $_GET['status'];
    $newStatus = $status == 1 ? 0 : 1;
    
    $sql = "UPDATE categories SET status = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $newStatus, $id);
    $stmt->execute();
}

// Fetch all categories
$sql = "SELECT * FROM categories";
$result = $con->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Categories</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    
    <!--Add this in the head section-->
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <!-- Remove duplicate scripts and use this order -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap-toggle.min.css" rel="stylesheet">
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
                    <h2>View Categories</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="categoryTable">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Code</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['category_name'] . "</td>";
                                        echo "<td>" . $row['category_code'] . "</td>";
                                        // In the table row generation
                                        echo "<td>";
                                        if(!empty($row['image'])) {
                                            $image_path = "admin/image/" . $row['image'];
                                            if(file_exists($image_path)) {
                                                echo "<img src='" . $image_path . "' class='img-thumbnail' width='100' height='100' alt='Category Image'>";
                                            } else {
                                                echo "<img src='admin/image/no-image.png' class='img-thumbnail' width='100' height='100' alt='No Image'>";
                                            }
                                        } else {
                                            echo "<img src='admin/image/no-image.png' class='img-thumbnail' width='100' height='100' alt='No Image'>";
                                        }
                                        
                                        // Replace the status column code
                                        echo "<td class='text-center'>";
                                        echo "<input type='checkbox' data-toggle='toggle' data-size='sm' " . 
                                             ($row['status'] == 1 ? 'checked' : '') . " 
                                             data-on='Active' data-off='Inactive' 
                                             data-onstyle='success' data-offstyle='danger'
                                             onchange='toggleStatus(" . $row['id'] . ", this.checked)'>";
                                        echo "</td>";
                                        echo "</td>";
                                        echo "<td>
                                            <a href='edit_category.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                            <button onclick='deleteCategory(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No categories found</td></tr>";
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

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });
    });
    </script>

<script>
function deleteCategory(id) {
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
            window.location.href = 'delete_category.php?id=' + id;
        }
    })
}
</script>

<script>
function toggleStatus(id, isChecked) {
    var status = isChecked ? 1 : 0;
    window.location.href = 'view_category.php?toggle=' + id + '&status=' + status;
}
</script>
</body>
<!-- Update script section before closing body tag -->
<!-- Remove all existing script tags and replace with these in this order -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap-toggle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
$(document).ready(function() {
    // Initialize DataTable
    $('#categoryTable').DataTable({
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

    // Sidebar toggle
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });
});
</script>