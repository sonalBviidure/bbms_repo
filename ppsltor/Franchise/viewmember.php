<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Board Members</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
                    <h2 class="text-center mb-4">Board Members List</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="membersTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Matrix Name</th>
                                    <th>Contact Person</th>
                                    <th>Business Name</th>
                                    <th>Business Category</th>
                                    <th>Location</th>
                                    <th>Photos</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT m.*, mt.matrix_name 
                                         FROM members m 
                                         JOIN matrices mt ON m.matrix_id = mt.id";
                                $result = mysqli_query($con, $query);

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['matrix_name'] . "</td>";
                                    echo "<td>" . $row['contact_person'] . "</td>";
                                    echo "<td>" . $row['business_name'] . "</td>";
                                    echo "<td>" . $row['business_category'] . "</td>";
                                    echo "<td>" . $row['district'] . ", " . $row['state'] . "</td>";
                                    echo "<td>
                                            <button class='btn btn-sm btn-info' onclick='viewPhotos(\"" . $row['member_photo'] . "\", \"" . $row['business_photo'] . "\")'>
                                                View Photos
                                            </button>
                                          </td>";
                                    echo "<td>
                                            <div class='form-check form-switch'>
                                                <input class='form-check-input' type='checkbox' role='switch' 
                                                    id='statusToggle_".$row['id']."' 
                                                    ".($row['status'] == 1 ? 'checked' : '')."
                                                    onchange='toggleStatus(".$row['id'].", this.checked)'>
                                            </div>
                                          </td>";
                                    echo "<td>
                                            <button class='btn btn-sm btn-primary me-2' onclick='editMember(" . json_encode($row) . ")'>Edit</button>
                                            <button class='btn btn-sm btn-danger' onclick='deleteMember(" . $row['id'] . ")'>Delete</button>
                                          </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Photos Modal -->
    <div class="modal fade" id="photosModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Member Photos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Member Photo</h6>
                            <img id="memberPhoto" class="img-fluid" alt="Member Photo">
                        </div>
                        <div class="col-md-6">
                            <h6>Business Photo</h6>
                            <img id="businessPhoto" class="img-fluid" alt="Business Photo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#membersTable').DataTable();
        });

        function viewPhotos(memberPhoto, businessPhoto) {
            $('#memberPhoto').attr('src', 'image/members/' + memberPhoto);
            $('#businessPhoto').attr('src', 'image/business/' + businessPhoto);
            $('#photosModal').modal('show');
        }

        function editMember(member) {
            // Redirect to edit page with member data
            window.location.href = 'edit_member.php?id=' + member.id;
        }

        function deleteMember(id) {
            if(confirm('Are you sure you want to delete this member?')) {
                $.ajax({
                    url: 'delete_member.php',
                    type: 'POST',
                    data: {id: id},
                    success: function(response) {
                        alert('Member deleted successfully');
                        location.reload();
                    },
                    error: function() {
                        alert('Error deleting member');
                    }
                });
            }
        }

        function toggleStatus(id, isChecked) {
                const newStatus = isChecked ? 1 : 0;
                $.ajax({
                    url: 'toggle_member_status.php',
                    type: 'POST',
                    data: {
                        id: id,
                        status: newStatus
                    },
                    success: function(response) {
                        // No need to reload the page or show alert
                    },
                    error: function() {
                        alert('Error updating status');
                        // Revert the checkbox state on error
                        $(`#statusToggle_${id}`).prop('checked', !isChecked);
                    }
                });
            }
    </script>
</body>
</html>