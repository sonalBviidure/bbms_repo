<?php
require 'connection.php';

// Handle status toggle
if(isset($_POST['toggle_status'])) {
    $id = $_POST['post_id'];
    $status = $_POST['status'] == 'enable' ? 'disable' : 'enable';
    $sql = "UPDATE posts SET status = '$status' WHERE id = $id";
    $con->query($sql);
}

// Fetch all posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $con->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
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
        <?php require 'sidebar.php'; ?>
        
        <div id="content">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#"> Posts Management </a>
                    </div>
                </nav>
            </div>
            
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Posts List</h4>
                                <a href="add_post.php" class="btn btn-primary float-right">Add New Post</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo $row['title']; ?></td>
                                                <td>
                                                    <?php if($row['image']): ?>
                                                        <img src="uploads/<?php echo $row['image']; ?>" width="50">
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <form method="POST" style="display: inline;">
                                                        <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                                        <input type="hidden" name="status" value="<?php echo $row['status']; ?>">
                                                        <button type="submit" name="toggle_status" class="btn btn-sm <?php echo $row['status'] == 'enable' ? 'btn-success' : 'btn-danger'; ?>">
                                                            <?php echo ucfirst($row['status']); ?>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td><?php echo date('Y-m-d H:i', strtotime($row['created_at'])); ?></td>
                                                <td>
                                                    <a href="edit_post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="delete_post.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

        // Initialize DataTable
        $('table').DataTable();
    });
    </script>
</body>
</html>

<?php $con->close(); ?>