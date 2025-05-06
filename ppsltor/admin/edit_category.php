<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $category_name = $_POST['category_name'];
    $category_code = $_POST['category_code'];
    $current_image = $_POST['current_image'];
    
    $image_name = $current_image;
    
    if(isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $target_dir = "admin/image/";
        $image_name = time() . '_' . basename($_FILES["category_image"]["name"]);
        $target_file = $target_dir . $image_name;
        
        if(move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file)) {
            if($current_image && file_exists("admin/image/" . $current_image)) {
                unlink("admin/image/" . $current_image);
            }
        }
    }
    
    $sql = "UPDATE categories SET category_name=?, category_code=?, image=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $category_name, $category_code, $image_name, $id);
    
    if($stmt->execute()) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Category updated successfully",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "view_category.php";
                }
            });
        });
        </script>';
    } else {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Error!",
                text: "Failed to update category",
                icon: "error"
            });
        });
        </script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Category</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
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
                    </div>
                </nav>
            </div>

            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2>Edit Category</h2>
                    <?php if(isset($category)): ?>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $category['image']; ?>">
                        
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" class="form-control" name="category_name" 
                                   value="<?php echo $category['category_name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Category Code:</label>
                            <input type="text" class="form-control" name="category_code" 
                                   value="<?php echo $category['category_code']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Category Image:</label>
                            <?php if($category['image']): ?>
                                <div class="mb-2">
                                    <img src="admin/image/" . $category['image'] . "' width='100' height='100' class='img-thumbnail'>
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="category_image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                            <a href="view_category.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    <?php else: ?>
                        <div class="alert alert-danger">Category not found.</div>
                    <?php endif; ?>
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
</body>
</html>