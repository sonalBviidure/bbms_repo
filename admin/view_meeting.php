<?php
include 'connection.php';

// Handle status toggle if needed
if(isset($_GET['toggle'])) {
    $id = $_GET['toggle'];
    $status = $_GET['status'];
    $newStatus = $status == 1 ? 0 : 1;
    
    $sql = "UPDATE meetings SET status = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $newStatus, $id);
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Meetings</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        
        <div id="content">
            <div class="container mt-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="float-left">View Meetings</h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="meetingTable">
                                <thead>
                                    <tr>
                                        <th>Matrix Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT m.*, mt.matrix_name 
                                           FROM meetings m 
                                           JOIN matrices mt ON m.matrix_id = mt.id";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['matrix_name'] . "</td>";
                                            echo "<td>" . date('d-m-Y', strtotime($row['meeting_date'])) . "</td>";
                                            echo "<td>" . date('h:i A', strtotime($row['meeting_time'])) . "</td>";
                                            echo "<td>" . $row['venue'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            echo "<td class='text-center'>";
                                            echo "<input type='checkbox' data-toggle='toggle' data-size='sm' " . 
                                                 ($row['status'] == 1 ? 'checked' : '') . " 
                                                 data-on='Active' data-off='Inactive' 
                                                 data-onstyle='success' data-offstyle='danger'
                                                 onchange='toggleStatus(" . $row['id'] . ", this.checked)'>";
                                            echo "</td>";
                                            echo "<td>
                                                    <a href='edit_meeting.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                                    <button onclick='deleteMeeting(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
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
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap-toggle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#meetingTable').DataTable();
        
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });
    });

    function toggleStatus(id, isChecked) {
        var status = isChecked ? 1 : 0;
        window.location.href = 'view_meeting.php?toggle=' + id + '&status=' + status;
    }

    function deleteMeeting(id) {
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
                window.location.href = 'delete_meeting.php?id=' + id;
            }
        })
    }
    </script>
</body>
</html>