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

// Pagination settings
$records_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Get total records
$total_query = "SELECT COUNT(*) as total FROM meetings";
$total_result = mysqli_query($con, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Meetings</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        
        <div id="content">
            <div class="container mt-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="float-left">View Meetings</h4>
                        <a href="addmeeting.php" class="btn btn-primary float-right">Add New Meeting</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Matrix Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT m.*, mt.matrix_name 
                                           FROM meetings m 
                                           JOIN matrices mt ON m.matrix_id = mt.id 
                                           LIMIT $offset, $records_per_page";
                                    $result = mysqli_query($con, $sql);

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['matrix_name'] . "</td>";
                                        echo "<td>" . date('d-m-Y', strtotime($row['meeting_date'])) . "</td>";
                                        echo "<td>" . date('h:i A', strtotime($row['meeting_time'])) . "</td>";
                                        echo "<td>" . $row['venue'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td class='text-center'>";
                                        if(!empty($row['meeting_image'])) {
                                            echo "<img src='uploads/meetings/" . $row['meeting_image'] . "' 
                                                  class='img-thumbnail' style='max-width: 100px;' 
                                                  onclick='viewImage(\"" . $row['meeting_image'] . "\")'>";
                                        } else {
                                            echo "No image";
                                        }
                                        echo "</td>";
                                        echo "<td class='text-center'>";
                                        echo "<div class='form-check form-switch'>";
                                        echo "<input type='checkbox' class='form-check-input' " . 
                                             ($row['status'] == 1 ? 'checked' : '') . " 
                                             onchange='toggleStatus(" . $row['id'] . ", this.checked)'>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "<td>
                                                <a href='editmeeting.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                                <button onclick='deleteMeeting(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
                                              </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <?php if($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo ($page-1); ?>">Previous</a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    
                                    <?php if($page < $total_pages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo ($page+1); ?>">Next</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Meeting Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="meetingImage" class="img-fluid" alt="Meeting Image">
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>
        function viewImage(imageName) {
            $('#meetingImage').attr('src', 'uploads/meetings/' + imageName);
            $('#imageModal').modal('show');
        }

        function toggleStatus(id, isChecked) {
            const status = isChecked ? 1 : 0;
            window.location.href = 'viewmeeting.php?toggle=' + id + '&status=' + status;
        }

        function deleteMeeting(id) {
            if(confirm('Are you sure you want to delete this meeting?')) {
                window.location.href = 'delete_meeting.php?id=' + id;
            }
        }
    </script>
</body>
</html>