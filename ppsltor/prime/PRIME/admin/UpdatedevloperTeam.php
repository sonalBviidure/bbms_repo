<?php
include 'connection.php';

$Id = $_GET['updateid'] ?? '';

// Check if the ID is valid
if (!is_numeric($Id)) {
    echo "Invalid ID";
    exit;
}

// Retrieve team member data from the database
$sql = "SELECT * FROM devloperteam WHERE dev_id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $Id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if there is any data available
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $memberName = $row['dev_member_name'];
    $memberRole = $row['dev_member_role'];
    $memberImage = $row['dev_image']; 
    // You can retrieve other fields similarly
} else {
    echo "<script>alert('Problem in retrieval of data.')</script>";
}

// Check if form is submitted
if(isset($_POST['update'])) {
    // Retrieve form data
    $newMemberName = $_POST['dev_member_name'];
    $newMemberRole = $_POST['dev_member_role'];

    // Check if any changes are made
    if($newMemberName != $memberName || $newMemberRole != $memberRole || !empty($_FILES['devmemberImage']['name'])) {
        // Update database with new data
        $updateQuery = "UPDATE devloperteam SET ";
        $params = [];
        if(!empty($newMemberName)) {
            $updateQuery .= "dev_member_name = ?";
            $params[] = $newMemberName;
        }
        if(!empty($_FILES['devmemberImage']['name'])) {
            if(!empty($newMemberName)) {
                $updateQuery .= ", ";
            }
            $targetDir = "image/";
            $targetFilePath = $targetDir . basename($_FILES['devmemberImage']['name']);
            if (move_uploaded_file($_FILES['devmemberImage']['tmp_name'], $targetFilePath)) {
                $updateQuery .= "dev_image = ?";
                $params[] = $targetFilePath;
            } else {
                echo "<script>alert('Failed to upload image.')</script>";
                exit;
            }
        }
        if(!empty($newMemberRole)) {
            if(!empty($newMemberName) || !empty($_FILES['devmemberImage']['name'])) {
                $updateQuery .= ", ";
            }
            $updateQuery .= "dev_member_role = ?";
            $params[] = $newMemberRole;
        }
        $updateQuery .= " WHERE dev_id = ?";
        $params[] = $Id;

        // Execute update query
        $stmt = mysqli_prepare($con, $updateQuery);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, str_repeat("s", count($params)), ...$params);
            mysqli_stmt_execute($stmt);
            echo "<script>alert('Data updated successfully.')</script>";
            header("Location: ./devloperteam.php");
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // No changes made, redirect or display a message
        echo "<script>alert('No changes made.')</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
        <!-- Page Content  -->
        <div id="content" style="background-color:white;">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                            id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="material-icons">person</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2 class="text-center">Update Team Member</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="dev_member_name">Member Name</label>
                                    <input type="text" class="form-control" id="dev_member_name" name="dev_member_name" value="<?php echo $memberName; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="dev_member_role">Member Role</label>
                                    <input type="text" class="form-control" id="dev_member_role" name="dev_member_role" value="<?php echo $memberRole; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="devmemberImage">Member Image</label><br>
                                    <div class="border p-1" style="border-radius: 5px;">
                                        <img src="<?php echo $memberImage; ?>" alt="Member Image"
                                            style="max-width: 100px; max-height: 100px;">
                                        <input type="file" class="form-control-file mt-2" id="devmemberImage"
                                            name="devmemberImage" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-primary mt-3" name="update" value="Update">
                                </div>
                            </form>
                        </div>
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
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
    </script>
</body>

</html>
