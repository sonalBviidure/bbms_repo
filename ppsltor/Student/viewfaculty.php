<?php
include 'connection.php';

$query = "
    SELECT 
        posts.post_id,
        posts.post_name,
        board_members.board_member_name,
        category.category_name,
        posts.contact_number,
        posts.photo
    FROM posts
    JOIN board_members ON posts.board_member_id = board_members.board_member_id
    JOIN category ON posts.category_id = category.category_id
";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Posts</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <style>
        .post-card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            transition: 0.3s;
        }
        .post-card:hover {
            transform: scale(1.02);
        }
        .card-img-top {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>
    <?php include 'sidebar.php'; ?>

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
            <div class="container">
                <h2 class="text-center mb-4">All Posts</h2>
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card post-card">
                                <?php if (!empty($row['photo'])): ?>
                                    <img src="uploads/<?= $row['photo']; ?>" class="card-img-top" alt="Post Photo">
                                <?php else: ?>
                                    <img src="uploads/default.png" class="card-img-top" alt="No Photo">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['post_name']; ?></h5>
                                    <p class="card-text"><strong>&#128100; Board Member:</strong> <?= $row['board_member_name']; ?></p>
                                    <p class="card-text"><strong> &#128193;Category:</strong> <?= $row['category_name']; ?></p>
                                    <p class="card-text"><strong>&#128222;Contact:</strong> <?= $row['contact_number']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button, .body-overlay').on('click', function () {
            $('#sidebar, .body-overlay').toggleClass('show-nav');
        });
    });
</script>
</body>
</html>
