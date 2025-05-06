<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login and Signup Page</title>
</head>
<style>
     body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        width: 300%;
        max-width: 400px;
        margin-bottom: 250px;
        margin-right: 700px;
        padding: 20px;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Added box shadow */
    }

    .bg {
        height: 100%;
        width: auto;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .main-content {
        position: fixed;
        color: #333;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    h1.text-center {
        color: #02236d; /* Change to desired color */
        font-family: "Times New Roman", Times, serif;
        font-size: 1.875em;
    }
     @media (max-width: 576px) {
        form {
            width: 90%;
            margin: 0 auto;
        }
    }
</style>

<body>
    <div class="bg">
        <div class="container">
            <div class="text">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <!-- Login Form -->
                            <form id="loginForm">
                                <h1 class="text-center">Login</h1>
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Email:</label>
                                    <input type="text" class="form-control" id="Email" placeholder="Enter your Email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="login()">Login</button>

                                <!-- Toggle between Signup forms -->
                                <p class="mt-3">Don't have an account? <a href="student.php" onclick="toggleForms()">Signup here</a>.</p>

                            </form>

                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    function login() {
                        // Retrieve email and password
                        const email = document.getElementById("loginEmail").value;
                        const password = document.getElementById("loginPassword").value;

                        // Send AJAX request to the authentication script
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "login.php", true);
                        xhr.setRequestHeader("Content-Type", "application/json");

                        // Callback function when the request is completed
                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    // Redirect to dashboard page if login is successful
                                    window.location.href = "studentdash5.php";
                                } else {
                                    alert(response.message); // Display error message
                                }
                            } else {
                                console.error("Error:", xhr.statusText);
                            }
                        };

                        // Handle network errors
                        xhr.onerror = function () {
                            console.error("Network Error");
                        };

                        // Send the request with email and password as JSON data
                        xhr.send(JSON.stringify({ email: email, password: password }));
                    }

                    function signup() {
                        alert("Signup logic goes here!");
                    }

                    function toggleForms() {
                        const loginForm = document.getElementById("loginForm");
                        const signupForm = document.getElementById("signupForm");

                        if (loginForm.style.display === "none") {
                            loginForm.style.display = "block";
                            signupForm.style.display = "none";
                        } else {
                            loginForm.style.display = "none";
                            signupForm.style.display = "block";
                        }
                    }
                </script>
                
</body>

</html>