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
    $placement_date = $_POST["placement_date"];
    $num_students = $_POST["num_students"];
   
    // Insert data into MySQL database
    $sql = "INSERT INTO std_placed (placement_date, num_students) 
    VALUES ('$placement_date', '$num_students')";
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
    <title>Placement</title>
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

        /* Hover effect */
        .custom-btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Center the form */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust as needed */
            font-family: Arial, sans-serif; /* Change to your desired font family */
        }

        .form-content {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-content">
            <h2 class="text-center mb-4">Placement Form</h2>
            <form action="no_std_placed.php" method="POST">
                <div class="form-group">
                    <label for="placement_date">Placement Date:</label>
                    <input type="date" id="placement_date" name="placement_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="num_students">Number of Students Placed:</label>
                    <input type="number" id="num_students" name="num_students" class="form-control" required>
                    <small class="form-text text-muted">Please enter a whole number.</small>
                </div>

                <button type="submit" class="custom-btn btn-block">Add Placement</button>
            </form>
        </div>
    </div>

    <script>
        // Add JavaScript to validate the number of students placed
        document.addEventListener('DOMContentLoaded', function () {
            var numStudentsInput = document.getElementById('num_students');
            numStudentsInput.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, ''); // Allow only integers
            });
        });
    </script>
</body>
</html>
