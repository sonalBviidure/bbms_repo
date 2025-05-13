<?php
include 'connection.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM board_members WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Member deleted successfully",
                icon: "success"
            }).then((result) => {
                window.location.href = "view_members.php";
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