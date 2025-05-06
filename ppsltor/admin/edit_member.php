<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM board_members WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $matrix_id = $_POST['matrix_id'];
    $member_name = $_POST['member_name'];
    $business_name = $_POST['business_name'];
    $category_id = $_POST['category_id'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    
    $sql = "UPDATE board_members SET matrix_id=?, member_name=?, business_name=?, category_id=?, contact_number=?, email=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isssssi", $matrix_id, $member_name, $business_name, $category_id, $contact_number, $email, $id);
    
    if($stmt->execute()) {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Member updated successfully",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "view_members.php";
                }
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
    <title>Edit Member</title>
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
                    <h2>Edit Member</h2>
                    <?php if(isset($member)): ?>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Matrix:</label>
                                <select class="form-control" name="matrix_id" required>
                                    <?php
                                    $sql = "SELECT id, matrix_name FROM matrices WHERE status = 1";
                                    $result = $con->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        $selected = ($row['id'] == $member['matrix_id']) ? 'selected' : '';
                                        echo "<option value='" . $row['id'] . "' " . $selected . ">" . $row['matrix_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Category:</label>
                                <select class="form-control" name="category_id" required>
                                    <?php
                                    $sql = "SELECT id, category_name FROM categories WHERE status = 1";
                                    $result = $con->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        $selected = ($row['id'] == $member['category_id']) ? 'selected' : '';
                                        echo "<option value='" . $row['id'] . "' " . $selected . ">" . $row['category_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Member Name:</label>
                                <input type="text" class="form-control" name="member_name" 
                                       value="<?php echo $member['member_name']; ?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Business Name:</label>
                                <input type="text" class="form-control" name="business_name" 
                                       value="<?php echo $member['business_name']; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Contact Number:</label>
                                <input type="tel" class="form-control" name="contact_number" 
                                       value="<?php echo $member['contact_number']; ?>" 
                                       pattern="[0-9]{10}" title="Please enter valid 10-digit number" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" 
                                       value="<?php echo $member['email']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" name="update" class="btn btn-primary">Update Member</button>
                            <a href="view_members.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    <?php else: ?>
                        <div class="alert alert-danger">Member not found.</div>
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