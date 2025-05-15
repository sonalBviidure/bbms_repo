<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $boardMemberId = $_POST['boardMemberId'];
    $boardMemberName = $_POST['boardMemberName'];
    $contactNumber = $_POST['contactNumber'];
    $emailId = $_POST['emailId'];
    $categoryId = $_POST['categoryId'];

    // Handle file upload
    $photo = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoPath = 'uploads/' . $photo;

    if (move_uploaded_file($photoTmpName, $photoPath)) {
        // Use prepared statement to avoid SQL injection
        $sql = "INSERT INTO `board_members` (board_member_id, board_member_name, contact_number, email_id, category_id, photo) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $boardMemberId, $boardMemberName, $contactNumber, $emailId, $categoryId, $photo);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            title: "Success",
                            text: "Board Member Added Successfully",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "./addfaculty.php";
                            }
                        });
                    });
                </script>';
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            title: "Error",
                            text: "Failed to add Board Member",
                            icon: "error"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "./addfaculty.php";
                            }
                        });
                    });
                </script>';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        title: "Error",
                        text: "Failed to add Board Member",
                        icon: "error"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./add_board_member.php";
                        }
                    });
                });
            </script>';
        }
    } else {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Error",
                    text: "Failed to upload photo",
                    icon: "error"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./add_board_member.php";
                    }
                });
            });
        </script>';
    }
}

// Fetch categories from the category table
$categoryQuery = "SELECT * FROM category";
$categoryResult = mysqli_query($con, $categoryQuery);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Add Board Member</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>

        <div id="content" style="background-color:white;">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                </nav>
            </div>

            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2 class="text-center">Add Board Member</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="boardMemberId">Board Member ID:</label>
                                <input type="text" class="form-control" id="boardMemberId" name="boardMemberId" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="boardMemberName">Board Member Name:</label>
                                <input type="text" class="form-control" id="boardMemberName" name="boardMemberName" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="contactNumber">Contact Number:</label>
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="emailId">Email ID:</label>
                                <input type="email" class="form-control" id="emailId" name="emailId" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="categoryId">Category:</label>
                                <select class="form-control" id="categoryId" name="categoryId" required>
                                    <?php while($category = mysqli_fetch_assoc($categoryResult)): ?>
                                        <option value="<?= $category['category_id']; ?>"><?= $category['category_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photo">Photo:</label>
                                <input type="file" class="form-control" id="photo" name="photo" required>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Add Board Member</button>
                    </form>
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

            $('.more-button,.body-overlay').on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
        });
    </script>

</body>
</html>
