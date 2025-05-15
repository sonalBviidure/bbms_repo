<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "tnp_k";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database for job vacancies
$sql_vacancies = "SELECT experience, position, location, salary, recruitment, apply_link, deadline FROM vacancies where status='1'";
$result_vacancies = $conn->query($sql_vacancies);

// Fetch data from database for number of students placed
$sql_students = "SELECT num_students FROM std_placed where status='1'";
$result_students = $conn->query($sql_students);

// Fetch data from the com_tieup table
$sql_tieups = "SELECT company_name, company_logo FROM com_tieup where status='1'";
$result_tieups = $conn->query($sql_tieups);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Vacancies, Placement Information & Company Tie-Ups</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-container {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            width: 100%;
            max-width: 350px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 0;
            overflow: hidden;
        }
        .card-header {
            font-weight: bold;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-align: center;
        }
        .card-body {
            padding: 15px;
        }
        .card-footer {
            text-align: center;
            padding: 10px 15px;
            background-color: #f8f9fa;
        }
        .apply-btn {
            background-color: #28a745;
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .apply-btn:hover {
            background-color: #218838;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .form-content {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px; /* Add some margin to separate from the job vacancies */
        }
        .custom-btn {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .custom-btn:hover {
            background-color: #0056b3;
        }
        .carousel-item img {
            display: block;
            margin: 0 auto;
            max-height: 300px; /* Adjust based on your requirement */
        }

        .carousel-caption h5 {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 5px 10px;
        }

    /* Adjust Company Logo Size */
    .company-logo {
        max-width: 200px; /* Adjust the maximum width as needed */
        height: auto; /* Maintain aspect ratio */
        margin: 0 auto; /* Center the logos horizontally */
    }
</style>

    </style>
</head>

<body>
    <div class="container">
        <!-- Job Vacancies Section -->
        <h2 class="text-center mb-4">Job Vacancies</h2>
        <div class="card-container">
            <?php
            if ($result_vacancies->num_rows > 0) {
                while ($row = $result_vacancies->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<div class='card-header'>" . htmlspecialchars($row["position"]) . "</div>";
                    echo "<div class='card-body'>";
                    echo "<p><strong>Experience:</strong> " . htmlspecialchars($row["experience"]) . "</p>";
                    echo "<p><strong>Location:</strong> " . htmlspecialchars($row["location"]) . "</p>";
                    echo "<p><strong>Salary:</strong> " . htmlspecialchars($row["salary"]) . "</p>";
                    echo "<p><strong>Recruitment:</strong> " . htmlspecialchars($row["recruitment"]) . "</p>";
                    echo "<p><strong>Deadline:</strong> " . htmlspecialchars($row["deadline"]) . "</p>";
                    echo "</div>";
                    echo "<div class='card-footer'>";
                    echo "<a href='" . htmlspecialchars($row["apply_link"]) . "' target='_blank' class='apply-btn'>Apply</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>No job vacancies available.</p>";
            }
            ?>
        </div>
        
        <!-- Students Placed Section -->
        <h2 class="text-center mt-5 mb-4">Students Placed</h2>
        <div class="card-container">
            <?php
            if ($result_students->num_rows > 0) {
                while ($row = $result_students->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<div class='card-header'>Number of Students Placed:" . htmlspecialchars($row["num_students"]) ."</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>No students placed information available.</p>";
            }
            ?>
        </div>
        
        <!-- Company Tie-Ups Section -->
        <!-- Company Tie-Ups Section -->
<h2 class="text-center mt-5 mb-4">Company Tie-Ups</h2>
<div class="container">
    <div id="companyCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            if ($result_tieups->num_rows > 0) {
                $active = "active";
                while ($row = $result_tieups->fetch_assoc()) {
                    echo "<div class='carousel-item $active'>";
                    echo "<img src='" . htmlspecialchars($row["company_logo"]) . "' class='d-block w-100 company-logo' alt='" . htmlspecialchars($row["company_name"]) . "'>";
                    echo "</div>";
                    $active = ""; // Remove active class after the first item
                }
            } else {
                echo "<p class='text-center'>No company tie-up information available.</p>";
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#companyCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#companyCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

    
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
// Close database connection
$conn->close();
?>
