<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $postId = $_POST['postId'];
    $postName = $_POST['postName'];
    $boardMemberId = $_POST['boardMemberId'];
    $categoryId = $_POST['categoryId'];
    $contactNumber = $_POST['contactNumber'];

    // Handle file upload
    $photo = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoPath = 'uploads/' . $photo;

    if (move_uploaded_file($photoTmpName, $photoPath)) {
        $sql = "INSERT INTO posts (post_id, post_name, board_member_id, category_id, contact_number, photo)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $postId, $postName, $boardMemberId, $categoryId, $contactNumber, $photo);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            title: "Success",
                            text: "Post Added Successfully",
                            icon: "success"
                        }).then(() => {
                            window.location.href = "addpost.php";
                        });
                    });
                </script>';
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            title: "Error",
                            text: "Failed to add Post",
                            icon: "error"
                        });
                    });
                </script>';
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Error",
                    text: "Failed to upload photo",
                    icon: "error"
                });
            });
        </script>';
    }
}

// Fetch board members
$boardMembers = mysqli_query($con, "SELECT board_member_id, board_member_name FROM board_members");

// Fetch categories
$categories = mysqli_query($con, "SELECT category_id, category_name FROM category");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'; ?>

        <div id="content" style="background-color:white;">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                </nav>
            </div>

            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2 class="text-center">Add Post</h2>
                    <form method="POST" enctype="multipart/form-data" class="mt-4">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="postId">Post ID:</label>
                                <input type="text" class="form-control" name="postId" id="postId" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="postName">Post Name:</label>
                                <input type="text" class="form-control" name="postName" id="postName" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="boardMemberId">Board Member Name:</label>
                                <select class="form-control" name="boardMemberId" id="boardMemberId" required>
                                    <option value="">Select Board Member</option>
                                    <?php while ($bm = mysqli_fetch_assoc($boardMembers)) : ?>
                                        <option value="<?= $bm['board_member_id']; ?>"><?= $bm['board_member_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="categoryId">Category:</label>
                                <select class="form-control" name="categoryId" id="categoryId" required>
                                    <option value="">Select Category</option>
                                    <?php while ($cat = mysqli_fetch_assoc($categories)) : ?>
                                        <option value="<?= $cat['category_id']; ?>"><?= $cat['category_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="contactNumber">Contact Number:</label>
                                <input type="tel" class="form-control" name="contactNumber" id="contactNumber" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photo">Photo:</label>
                                <input type="file" class="form-control" name="photo" id="photo" required>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mt-4 mb-3" style="width: 200px;">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });
            $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
        });
    </script>
</body>
</html>
