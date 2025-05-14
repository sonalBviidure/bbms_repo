<!DOCTYPE html>
<html>
<head>
    <title>Matrices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
            margin-top: 60px; /* Adjust based on navbar height */
        }
        footer {
            margin-top: auto;
        }
        .matrix-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .matrix-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .card-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    
    <div class="content">
        <div class="container">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "u126463643_ltor_academy";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch all matrices from the database
            $sql = "SELECT * FROM matrices";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo '<div class="row g-4">';
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 col-lg-3">';
                    echo '<div class="card matrix-card h-100 position-relative">';
                    echo '<span class="card-badge">ID: ' . $row['id'] . '</span>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title text-primary">' . $row['matrix_name'] . '</h5>';
                    echo '<p class="card-text text-muted">';
                    echo '<small><i class="bi bi-clock"></i> Created: ' . $row['created_at'] . '</small>';
                    echo '</p>';
                    echo '<div class="d-grid gap-2">';
                    echo '<button class="btn btn-outline-primary btn-sm">View Available Category</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<div class="alert alert-info m-4">No matrices found</div>';
            }

            // Close connection
            if ($conn) {
                $conn->close();
            }
            ?>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>