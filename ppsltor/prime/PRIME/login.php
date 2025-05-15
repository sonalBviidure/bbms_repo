<?php

include('Includes/connection.php');


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

    // Check if the email exists in the registration table
    $checkEmailQuery = "SELECT * FROM registration WHERE t_emailid='$email' AND status='1'";
    $result = $con->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email exists, check the password
        $row = $result->fetch_assoc();
        $storedPassword = $row["t_password"];

        if ($password==$storedPassword) {
            // Password is correct, login successful
            echo "<script>alert('Login successfully')</script>";
            header('location:index.php');
        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password. Please try again or create an account.')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    } else {
        // Email does not exist in the registration table
        echo "<script>alert('Email not found. Please create an account.')</script>";
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
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <title>Login Page</title>

    <!-- Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <a href="default.php" class="back-arrow text-center"><i class="fas fa-arrow-left"></i></a>

    <div class="login-container">
        <center>
          <img src="./PRIME LOGO.jpg" class="img-fluid mb-3" style="width:30%;height:30%">
         <img src="./textlogo.jpg" style="width:150px;height:60px;>
         </center>
        <form class="p-2" method="post">
            <div class="form-group p-2">
                <label for="email" class="p-1"><b>Email</b></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" required>
            </div>
            <div class="form-group p-2">
                <label for="password" class="p-1"><b>Password</b></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
            <h6 class="text-center mt-3">Don't have an Account? <a href="register.php">Create Account</a></h6>
        </form>
    </div>
<?php include('footer.php');?>
    <!-- Bootstrap JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
