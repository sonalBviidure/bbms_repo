<?php

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


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $experience = $_POST["experience"];
    $position = $_POST["position"];
    $location = $_POST["location"];    
    $salary = $_POST["salary"];    
    $recruitment = $_POST["recruitment"];    
    $apply_link = $_POST["apply_link"];    
    $deadline = $_POST["deadline"];    

    // Insert data into MySQL database
    $sql = "INSERT INTO vacancies (experience, position,location,salary,recruitment,apply_link,deadline) 
    VALUES ('$experience', '$position', '$location', '$salary', '$recruitment', '$apply_link', '$deadline')";
    if ($conn->query($sql) === TRUE) {
       echo "connected successfully";
        // header("Location: .php");
        exit();
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Vacancy</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom button style */
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

        /* Hover effect for button */
        .custom-btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Form container style */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Form input style */
        .form-input {
            width: 100%;
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Form label style */
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333; /* Dark text color */
        }

        /* Error message style */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4">Job Vacancy Form</h2>
        <form action="plac_opening.php" method="POST" onsubmit="return validateForm()">
            <label for="experience" class="form-label">Experience:</label>
            <input type="text" id="experience" name="experience" class="form-input">
            <span id="experience-error" class="error-message"></span>

            <label for="position" class="form-label">Position:</label>
            <input type="text" id="position" name="position" class="form-input">
            <span id="position-error" class="error-message"></span>

            <label for="location" class="form-label">Location:</label>
            <input type="text" id="location" name="location" class="form-input">
            <span id="location-error" class="error-message"></span>

            <label for="salary" class="form-label">Salary:</label>
            <input type="text" id="salary" name="salary" class="form-input">
            <span id="salary-error" class="error-message"></span>

            <label for="recruitment" class="form-label">Recruitment:</label>
            <input type="text" id="recruitment" name="recruitment" class="form-input">
            <span id="recruitment-error" class="error-message"></span>

            <label for="apply_link" class="form-label">Apply Link:</label>
            <input type="text" id="apply_link" name="apply_link" class="form-input">
            <span id="apply_link-error" class="error-message"></span>

            <label for="deadline" class="form-label">Deadline:</label>
            <input type="date" id="deadline" name="deadline" class="form-input">
            <span id="deadline-error" class="error-message"></span>

            <center><button type="submit" class="custom-btn">Submit</button></center>
        </form>
    </div>

    <script>
        function validateForm() {
            var experience = document.getElementById("experience").value;
            var position = document.getElementById("position").value;
            var location = document.getElementById("location").value;
            var salary = document.getElementById("salary").value;
            var recruitment = document.getElementById("recruitment").value;
            var apply_link = document.getElementById("apply_link").value;
            var deadline = document.getElementById("deadline").value;

            var isValid = true;

            if (experience.trim() === "") {
                document.getElementById("experience-error").innerText = "Experience is required";
                isValid = false;
            } else {
                document.getElementById("experience-error").innerText = "";
            }

            if (position.trim() === "") {
                document.getElementById("position-error").innerText = "Position is required";
                isValid = false;
            } else {
                document.getElementById("position-error").innerText = "";
            }

            if (location.trim() === "") {
                document.getElementById("location-error").innerText = "Location is required";
                isValid = false;
            } else {
                document.getElementById("location-error").innerText = "";
            }

            if (salary.trim() === "") {
                document.getElementById("salary-error").innerText = "Salary is required";
                isValid = false;
            } else {
                document.getElementById("salary-error").innerText = "";
            }

            if (recruitment.trim() === "") {
                document.getElementById("recruitment-error").innerText = "Recruitment is required";
                isValid = false;
            } else {
                document.getElementById("recruitment-error").innerText = "";
            }

            if (apply_link.trim() === "") {
                document.getElementById("apply_link-error").innerText = "Apply Link is required";
                isValid = false;
            } else {
                document.getElementById("apply_link-error").innerText = "";
            }

            if (deadline.trim() === "") {
                document.getElementById("deadline-error").innerText = "Deadline is required";
                isValid = false;
            } else {
                document.getElementById("deadline-error").innerText = "";
            }

            return isValid;
        }
    </script>
</body>
</html>