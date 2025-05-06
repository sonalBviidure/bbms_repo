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
$sql_vacancies = "SELECT experience, position, location, salary, recruitment, apply_link, deadline FROM vacancies ";
$result_vacancies = $conn->query($sql_vacancies);

// Fetch data from database for number of students placed
$sql_students = "SELECT num_students FROM std_placed ";
$result_students = $conn->query($sql_students);

// Fetch data from the com_tieup table
$sql_tieups = "SELECT company_name, company_logo FROM com_tieup ";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .navbar {
            background-color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #02236d;
            font-weight: bold;
            padding: 10px 15px;
        }

        .navbar-nav .nav-item.active .nav-link {
            color: #02236d;
        }

        .dropdown-menu {
            background-color: white;
            border: 1px solid #dddddd;
        }

        .dropdown-menu .dropdown-item {
            color: #02236d;
            font-weight: bold;
        }

        .navbar-toggler-icon {
            color: #02236d;
        }

        .navbar-toggler {
            margin-right: 15px;
        }

        .card-container {
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
    padding: 15px; /* Add padding to the card body */
}

.card-footer {
    text-align: center;
    padding: 10px 15px;
    background-color: #f8f9fa;
}

/* Add specific styles for the counter section */
.counter-item .icon i {
    font-size: 72px;
    color: #007bff;
}

.counter-item .counter {
    font-size: 28px; /* Adjust font size for counter */
    font-weight: bold;
    color: #333;
}

.counter-item .text {
    font-size: 18px;
    color: #555;
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
            margin-top: 50px;
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

        .footer {

            background-color: #02236d;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            height: auto;
        }

        .social-icons a {
            color: white;
            font-size: 24px;
            margin-right: 10px;
        }

        .card-text {
            font-size: 45px;
            text-align: center;
        }

        .carousel-container {
            overflow: hidden;
            white-space: nowrap;
        }

        .carousel-images {
            display: inline-block;
            white-space: nowrap;
            animation: scroll 15s linear infinite;
        }

        .carousel-images img {
            max-height: 100px;
            margin: 0 10px;
            display: inline-block;
        }
        .counter-item {
        border: none; /* Remove outer border */
        text-align: center; /* Center align text */
    }

    .icon {
        margin-bottom: 15px; /* Add margin bottom */
    }

    .counter {
        font-size: 20px; /* Increase font size for counter */
        font-weight: bold; /* Make font bold */
        color: #333; /* Set counter text color */
    }

    .icon i {
        font-size: 72px; /* Increase font size for icon */
        color: #007bff; /* Set icon color */
    }

    .text {
        font-size: 18px; /* Increase text size */
        color: #555; /* Set text color */
    }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Sanity Technology</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="internship_main.php">Internships</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="gallery_fetch.php">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="bootcamp_fetch.php">Events</a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link" href="courses_nm.php">Courses</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="placement_fetch.php">Placement</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#about-us">About us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="center_fetch.php">Franchise</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ml-auto-mobile">
                <li class="nav-item active dropdown center">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20">
                            <path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="std_login.php">Student Login</a>
                        <a class="dropdown-item" href="#">Employee Login</a>
                        <a class="dropdown-item" href="#">Job-provider Login</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <br><br><br><br>
    <div class="container mt-5">
    <!-- Row containing all three sections -->
    <div class="row">
        <!-- Job Vacancies Section -->
        <div class="col-md-6">
            <div class="card h-100"> <!-- Added h-100 class to make both cards equal height -->
                <div class="card-body">
                    <div class="counter-item mb-4">
                        <h2 class="text-center mb-4">Job Vacancies</h2>
                        <div class="icon text-center">
                            <a href="job_opnings.php"><i class="fas fa-briefcase"></i></a>
                            <div class="counter" id="jobVacanciesCounter">
                                <!-- Placeholder for job vacancies counter -->
                            </div>
                            <br>
                            <a href="job_opnings.php" class="btn btn-primary btn-sm mt-2" style="background-color: green;">View More</a> <!-- Wrapped button with <a> tag to link to job_openings.php -->                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Number of Students Placed Section -->
        <div class="col-md-6">
            <div class="card h-100"> <!-- Added h-100 class to make both cards equal height -->
                <div class="counter-item mb-4">
                    <h2 class="text-center mb-4">Number of Students Placed</h2>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                        <div class="counter" id="studentsPlacedCounter" data-count="<?php echo htmlspecialchars($row["num_students"]); ?>">
                            <?php
                            if ($result_students->num_rows > 0) {
                                $row = $result_students->fetch_assoc();
                                echo htmlspecialchars($row["num_students"]);
                            } else {
                                echo "No data available.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <br><br>
        <br>
        <br><br>

        <div class="carousel-container">
            <div class="carousel-images">
                <?php
                if ($result_tieups->num_rows > 0) {
                    while ($row = $result_tieups->fetch_assoc()) {
                        echo "<img src='" . htmlspecialchars($row["company_logo"]) . "' alt='" . htmlspecialchars($row["company_name"]) . " Logo' class='company-logo'>";
                    }
                } else {
                    echo "<p>No company tie-ups available at the moment.</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <style>
    .footer {
    background-color: #02236d; /* Set background color */
    color: white; /* Set text color */
    position: fixed;
    bottom: 0;
    width: 100%;
    height: auto;
}
.social-icons a {
    color: white; /* Set social icon color */
    font-size: 24px; /* Set social icon size */
    margin-right: 10px; /* Add margin between social icons */
}
</style>
<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <h5 class="text-white mb-0">&copy;2024 Placement Management System. All rights reserved.</h5>
        <div class="social-icons mt-3">
            <!-- Instagram Icon -->
            <a href="https://www.instagram.com/ltorpune?igsh=c2Zlb3FvaDBjOWNx" target="_blank" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            <!-- Facebook Icon -->
            <a href="https://www.facebook.com/people/Prime-Computer-Services/61558423565204/?is_tour_dismissed" target="_blank" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
            <!-- YouTube Icon -->
            <a href="https://youtube.com/@fullstackksirofficial?si=YWBODmYCz3z3pq9E" target="_blank" class="text-white mx-2"><i class="fab fa-youtube"></i></a>

            <a href="https://www.linkedin.com/in/prime-services-839b92303/" class="text-white mx-2" ><i class="fab fa-linkedin" style="width:10px; height:20px;"></i></a>
        </div>
    </div>
</footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       
    </script>
    
</body>

</html>
