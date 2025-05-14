<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "tnp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sign-up
    if (isset($_POST["signup"])) {
        // Collect form data
        $t_employe_nm = $_POST["f_name"];
        $t_employe_email = $_POST["f_email"];
        $t_employe_password = $_POST["f_password"];
        $t_employe_contact = $_POST["f_contact"];
        $t_employe_address = $_POST["f_address"];
        $t_employe_city = $_POST["city"];
        $t_employe_state = $_POST["state"];
        $t_pincode = $_POST["zip"];
     //   $t_dob = $_POST["f_dob"]; // Retrieve Date of Birth from form

        // Handle file uploads
        $t_upload_id_prof = handleFileUpload("f_idproof", "employe_upload/ID Proof/");
        $t_employe_resume = handleFileUpload("f_resume", "employe_upload/Resume/");
        $t_profile_photo = handleFileUpload("f_profilePhoto", "employe_upload/Profile Photo/");
        $t_education_doc = handleFileUpload("Educ_doc", "employe_upload/Education Doc/");

        // Check if ID Proof upload was successful
        if ($t_upload_id_prof === null) {
            echo "Error: ID Proof upload failed";
            exit; // Handle error gracefully
        }

        // Insert data into MySQL database using prepared statements
        $stmt = $conn->prepare("INSERT INTO employee_sign_up (t_employe_nm, t_employe_email, t_employe_password, t_employe_contact, t_employe_address, t_employe_city, t_employe_state, t_pincode, t_upload_id_prof, t_employe_resume, t_profile_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $t_employe_nm, $t_employe_email, $t_employe_password, $t_employe_contact, $t_employe_address, $t_employe_city, $t_employe_state, $t_pincode, $t_upload_id_prof, $t_employe_resume, $t_profile_photo);

        if ($stmt->execute()) {
            echo "Sign-up successful";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}


    // Login
    elseif (isset($_POST["login"])) {
        // Handle login logic
    }


// Close database connection
$conn->close();

// Function to handle file upload and return the uploaded file path
function handleFileUpload($fileInputName, $uploadDir)
{
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]["error"] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES[$fileInputName]["name"]);
        $targetFilePath = $uploadDir . $fileName;

        // Move uploaded file to destination directory
        if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFilePath)) {
            return $targetFilePath;
        } else {
            echo "Error moving uploaded file";
        }
    } else {
        echo "File upload error";
    }
    return null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login and Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Login Form -->
                <form id="loginForm" action="employe.php" method="post">
                    <h2>Employee Login</h2>
                    <div class="form-group">
                        <label for="f_email">Email:</label>
                        <input type="email" class="form-control" id="f_email" name="f_email" required>
                    </div>
                    <div class="form-group">
                        <label for="f_password">Password:</label>
                        <input type="password" class="form-control" id="f_password" name="f_password" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="login">Login</button>
                    <p class="mt-3">Don't have an account? <a href="#" onclick="toggleForms()">Signup here</a>.</p>
                </form>

                <!-- Signup Form (Initially Hidden) -->
                <form id="signupForm" action="employe.php" method="post" enctype="multipart/form-data" style="display: none;">
                    <h2>Employee Signup</h2>
                    <div class="form-group">
                        <label for="f_name">Name:</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" required>
                    </div>
                    <div class="form-group">
                        <label for="f_email">Email:</label>
                        <input type="email" class="form-control" id="f_email" name="f_email" required>
                    </div>
                    <div class="form-group">
                        <label for="f_password">Password:</label>
                        <input type="password" class="form-control" id="f_password" name="f_password" required>
                    </div>
                    <div class="form-group">
                        <label for="f_contact">Contact:</label>
                        <input type="text" class="form-control" id="f_contact" name="f_contact" required>
                    </div>
                    <div class="form-group">
                        <label for="f_address">Address:</label>
                        <input type="text" class="form-control" id="f_address" name="f_address" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">Pin Code:</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                    <div class="form-group">
                        <label for="f_idproof">ID Proof (PDF/JPG/JPEG/PNG only):</label>
                        <input type="file" class="form-control" id="f_idproof" name="f_idproof" required>
                    </div>
                    <div class="form-group">
                        <label for="f_resume">Resume (PDF only):</label>
                        <input type="file" class="form-control" id="f_resume" name="f_resume" required>
                    </div>
                    <div class="form-group">
                        <label for="f_profilePhoto">Profile Photo (JPG/JPEG/PNG only):</label>
                        <input type="file" class="form-control" id="f_profilePhoto" name="f_profilePhoto" accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div class="mb-3">
                        <label for="Educ_doc" class="form-label">UG/PG Marksheet</label>
                        <input class="form-control" type="file" id="Educ_doc" name="Educ_doc" multiple>
                    </div>
                    <button type="submit" class="btn btn-success" name="signup">Signup</button>
                    <p class="mt-3">Already have an account? <a href="#" onclick="toggleForms()">Login here</a>.</p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById("loginForm");
            const signupForm = document.getElementById("signupForm");

            if (loginForm.style.display === "block") {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
            } else {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
