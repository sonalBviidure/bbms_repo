<?php
include 'connection.php';

$Id = $_GET['updateid'] ?? '';

// Check if the ID is valid
if (!is_numeric($Id)) {
    // echo "Invalid ID";
    exit;
}

// Retrieve team member data from the database
$sql = "SELECT * FROM team_members WHERE id ='$Id'";
$result = mysqli_query($con, $sql);

// Check if there is any data available
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $memberName = $row['member_name'];
    $memberRole = $row['member_role'];
    $memberImage = $row['member_image']; 
    // You can retrieve other fields similarly
} else {
    echo "<script>alert('Problem in retrieval of data.')</script>";
}

// Check if form is submitted
if(isset($_POST['update'])) {
    // Retrieve form data
    $newMemberName = $_POST['memberName'];
    $newMemberRole = $_POST['memberRole'];
    // You can retrieve other form fields similarly

    // Check if any changes are made
    if($newMemberName != $memberName || $newMemberRole != $memberRole || !empty($_FILES['memberImage']['name'])) {
        // Update database with new data
        $updateQuery = "UPDATE team_members SET ";
        if(!empty($newMemberName)) {
            $updateQuery .= "member_name = '$newMemberName'";
        }
        if(!empty($_FILES['memberImage']['name'])) {
            if(!empty($newMemberName)) {
                $updateQuery .= ", ";
            }
            $targetDir = "image/";
            $targetFilePath = $targetDir . basename($_FILES['memberImage']['name']);
            move_uploaded_file($_FILES['memberImage']['tmp_name'], $targetFilePath);
            $updateQuery .= "member_image = '$targetFilePath'";
        }
        if(!empty($newMemberRole)) {
            if(!empty($newMemberName) || !empty($_FILES['memberImage']['name'])) {
                $updateQuery .= ", ";
            }
            $updateQuery .= "member_role = '$newMemberRole'";
        }
        $updateQuery .= " WHERE id = '$Id'";
        
        // Execute update query
        mysqli_query($con, $updateQuery);
        
        echo "<script>alert('Data updated successfully.')</script>";
        header("Location: ./Teammembers.php");
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
                                    <label for="memberName">Member Name</label>
                                    <input type="text" class="form-control" id="memberName" name="memberName" value="<?php echo $memberName; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="memberRole">Member Role</label>
                                    <input type="text" class="form-control" id="memberRole" name="memberRole" value="<?php echo $memberRole; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="memberImage">Member Image</label><br>
                                    <div class="border p-1" style="border-radius: 5px;">
                                        <img src="<?php echo $memberImage; ?>" alt="Member Image"
                                            style="max-width: 100px; max-height: 100px;">
                                        <input type="file" class="form-control-file mt-2" id="memberImage"
                                            name="memberImage" accept="image/*">
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
