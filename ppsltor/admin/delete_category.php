<?php
include 'connection.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Get image name before deleting
    $sql = "SELECT image FROM categories WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();
    
    // Delete the category
    $sql = "DELETE FROM categories WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        // Delete the image file if it exists
        if($category['image'] && file_exists("admin/image/" . $category['image'])) {
            unlink("admin/image/" . $category['image']);
        }
        
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Category deleted successfully",
                icon: "success"
            }).then((result) => {
                window.location.href = "view_category.php";
            });
        });
        </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
</body>
</html>