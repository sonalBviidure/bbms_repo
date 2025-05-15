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
    $adminEmail = "abcd@abcd.com";
    $adminPassword = "soory&thankyou???";

    if ($email === $adminEmail && $password === $adminPassword) {
       
       // Credentials do not match, display alert and redirect to index.php
        echo "<script>alert('Login Successfully !')</script>";
        echo "<script>window.location.href='./main.php';</script>";
        exit(); // Stop further execution to prevent displaying the login form
    } 
    elseif($email === "franchise@gmail.com" && $password === "franchise123")
    {
        echo "<script>alert('Login Successfully !')</script>";
        echo "<script>window.location.href='../Franchise/main.php';</script>";
        exit(); // Stop further execution to prevent displaying the login form
    }
    elseif($email === "faculty@gmail.com" && $password === "faculty123")
    {
        echo "<script>alert('Login Successfully !')</script>";
        echo "<script>window.location.href='../Faculty/main.php';</script>";
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
    
    <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
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