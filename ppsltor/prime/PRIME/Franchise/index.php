<?php
require 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Check the connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Get user input from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize user input (you should use more robust validation and sanitization in a production environment)
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // Check if the entered email and password match the predefined credentials
  if($email === "franchise@gmail.com" && $password === "franchise123")
    {
        header('location:./main.php');
        exit(); // Stop further execution to prevent displaying the login form
    }
    else {
        // Credentials do not match, display alert and redirect to index.php
        echo "<script>alert('Please Check Your Email and Password !')</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit(); // Stop further execution to prevent displaying the login form
    }
    
    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="login-container container">
        <form class="p-2" method="post" onsubmit="return validateForm()">
            <div class="form-group p-2">
                <label for="email" class="p-1">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" required>
                <small id="emailError" class="text-danger"></small>
            </div>
            <div class="form-group p-2">
                <label for="password" class="p-1">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                <small id="passwordError" class="text-danger"></small>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var emailError = document.getElementById("emailError");
            var passwordError = document.getElementById("passwordError");

            // Reset previous errors
            emailError.textContent = "";
            
            // Email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailError.textContent = "Invalid email format";
                return false;
            }

            if (password.length < 6) {
                passwordError.textContent = "Password must be at least 6 characters";
                return false;
            }
            return true; // Form is valid, continue with submission
        }
    </script>

    <!-- Bootstrap JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>