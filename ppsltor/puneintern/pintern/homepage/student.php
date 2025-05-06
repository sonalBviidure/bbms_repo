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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sign-up
    if (isset($_POST["signup"])) { // Update to check if the "signup" button was clicked
        // Collect form data
        $t_stud_nm = $_POST["f_stud_nm"];
        $t_stud_email = $_POST["f_stud_email"];
        $t_stud_contact = $_POST["f_stud_contact"];
        $t_stud_DOB = $_POST["f_stud_DOB"];
        $t_stud_gender	= $_POST["f_stud_gender"];
        $t_stud_address	=$_POST["f_stud_address"];
        $t_stud_city= $_POST["f_stud_city"];
        $t_pincode	=$_POST["f_pincode"];
        $t_stud_state	=   $_POST["f_stud_state"];
        $t_clg_name =	$_POST["f_clg_name"];
        $t_qualification=	$_POST["f_qualification"];
        $t_passout_year = $_POST["f_passout_year"];
        $t_cgpa = $_POST["f_cgpa"];
        $t_upload_docs = $_POST["f_upload_docs"];
        $t_university_nm =	$_POST["f_university_nm"];
        $t_stud_profile	= $_POST["f_stud_profile"];
        $t_SSC_passout_yr =	$_POST["f_SSC_passout_yr"];
        $t_SSC_percent	= $_POST["f_SSC_percent"];
        $t_HSC_passout_yr =	$_POST["f_HSC_dip_passout_yr"];
        $t_HSC_percent	= $_POST["f_HSC_dip_percent"];
        $t_password = $_POST["f_password"];

        // Insert data into MySQL database
        $sql = "INSERT INTO registration
        ( t_stud_nm, t_stud_email, t_stud_contact, t_stud_DOB, t_stud_gender, t_stud_address, t_stud_city, t_pincode, t_stud_state, t_clg_name, t_qualification, t_passout_year, t_cgpa, t_upload_docs, t_university_nm, t_stud_profile, t_SSC_passout_yr, t_SSC_percent, t_HSC_passout_yr, t_HSC_percent, t_password) 
        VALUES ('$t_stud_nm', '$t_stud_email', '$t_stud_contact', '$t_stud_DOB', '$t_stud_gender', '$t_stud_address', '$t_stud_city', '$t_pincode', '$t_stud_state', '$t_clg_name', '$t_qualification', '$t_passout_year', '$t_cgpa', '$t_upload_docs', '$t_university_nm', '$t_stud_profile', '$t_SSC_passout_yr', '$t_SSC_percent', '$t_HSC_passout_yr', '$t_HSC_percent', '$t_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Sign-up successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    // Login
    elseif (isset($_POST["login"])) { // Update to check if the "login" button was clicked
        $t_emp_email = $_POST["f_stud_email"];
        $t_password	=   $_POST["f_password"]; // Note: You should hash the password before comparing it with the stored password.

        // Retrieve data from database
        $sql = "SELECT * FROM registration WHERE t_stud_email='$f_stud_email' AND t_password='$f_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful
            echo "Login successful";
        } else {
            // Login failed
            echo "Invalid username or password";
        }
    }
}

// Close database connection
$conn->close();
?>


    
<!--HTML Form-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            padding-top: 50px; /* Adjust spacing from top */
        }

        .form-section {
            margin-bottom: 30px; /* Spacing between form sections */
        }

        .form-heading {
            background-color: #99b9fe;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Student Registration Form</h2>
        <form id="Registration" action="student.php" method="post">
            <!-- Personal Information Section -->
            <div class="form-section">
                <div class="form-heading">
                    Personal Information
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="f_stud_nm" class="form-label">Student Name:</label>
                        <input type="text" class="form-control" id="f_stud_nm" name="f_stud_nm"
                            placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="f_stud_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="f_stud_email" name="f_stud_email"
                            placeholder="name@example.com" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="f_password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="f_password" name="f_password"
                            placeholder="Enter Password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="f_stud_contact" class="form-label">Contact:</label>
                        <input type="text" class="form-control" id="f_stud_contact" name="f_stud_contact"
                            placeholder="Enter 10-Digit Mobile Number" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="f_stud_gender" class="form-label">Gender:</label>
                        <select class="form-control" id="f_stud_gender" name="f_stud_gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="f_stud_DOB" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="f_stud_DOB" name="f_stud_DOB" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="f_stud_profile" class="form-label">Profile Photo:</label>
                        <input type="file" class="form-control" id="f_stud_profile" name="f_stud_profile"
                            placeholder="Select your Profile Photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="f_stud_address" class="form-label">Address:</label>
                    <textarea class="form-control" id="f_stud_address" name="f_stud_address" rows="3"
                        placeholder="Enter your Address" required></textarea>
                </div>
            </div>

            <!-- Location Section -->
            <div class="form-section">
                <div class="form-heading">
                    Location Details
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="country" class="form-label">Country:</label>
                        <select id="country" name="country" class="form-control" onchange="loadStates()">
                            <option value="">Select Country</option>
                            <option value="India">India</option>
                            <!-- Add more country options here -->
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="state" class="form-label">State:</label>
                        <select id="state" name="state" class="form-control" onchange="loadDistricts()" required>
                            <option value="">Select State</option>
                            <option value="AndraPradesh">Andhra Pradesh</option>
                        <option value="ArunachalPradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="HimachalPradesh">HimachalPradesh</option>
                        <option value="JammuKashmir">JammuKashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Kerala">Kerala</option>
                        <option value="MadhyaPradesh">MadhyaPradesh</option>
                        <option value="Sehore">Sehore</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="TamilNadu">TamilNadu</option>
                        <option value="Tripura">Tripura</option>
                        <option value="UttarPradesh">UttarPradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="WestBengal">WestBengal</option>
                        <option value="AndamanNicobar">AndamanNicobar</option>
                        <option value="DamanDiu">DamanDiu</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="district" class="form-label">District:</label>
                        <select id="district" name="district" class="form-control" onchange="loadSubDistricts()"></select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="subdistrict" class="form-label">Sub-District:</label>
                        <select id="subdistrict" name="subdistrict" class="form-control"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Village" class="form-label">Village:</label>
                        <input type="text" class="form-control" id="Village" name="Village" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zip" class="form-label">Zip Code:</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                </div>
            </div>

            <!-- Education Qualification Section -->
            <div class="form-section">
                <div class="form-heading">
                    Education Details
                </div>
                <div class="form-group">
                    <label for="f_qualification" class="form-label">Qualification:</label>
                    <select class="form-control" id="f_qualification" name="f_qualification" required>
                        <option value="">Select Qualification</option>
                        <option value="Under Graduate">Under Graduate</option>
                        <option value="Post Graduate">Post Graduate</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="f_passout_year" class="form-label">Passout Year:</label>
                        <select class="form-control" id="f_passout_year" name="f_passout_year" required>
                            <option value="">Select Passout Year</option>
                            <option value="">2020</option>
                            <option value="">2021</option>
                            <option value="">2022</option>
                            <option value="">2023</option>
                            <option value="">2024</option>
                            <option value="">2025</option>
                            <!-- Add passout year options here -->
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="f_cgpa" class="form-label">CGPA:</label>
                        <input type="text" class="form-control" id="f_cgpa" name="f_cgpa" placeholder="Enter your CGPA"
                            required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="f_clg_name" class="form-label">College Name:</label>
                        <input type="text" class="form-control" id="f_clg_name" name="f_clg_name"
                            placeholder="Enter your College" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="f_university_nm" class="form-label">University Name:</label>
                    <input type="text" class="form-control" id="f_university_nm" name="f_university_nm"
                        placeholder="Enter your University" required>
                </div>
                <!-- Add more education fields here (e.g., 10th and 12th/Diploma details) -->
            </div>

            <!-- Document Upload Section -->
            <div class="form-section">
                <div class="form-heading">
                    Document Upload
                </div>
                <div class="form-group">
                    <label for="f_upload_docs" class="form-label">Upload Documents:</label>
                    <input type="file" class="form-control" id="f_upload_docs" multiple
                        placeholder="Upload UG/PG, HCS/Diploma, 10th marksheet" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
    <script>
        function validateForm() {
            // Validate name field
            var name = document.getElementById("f_stud_nm").value;
            if (!/^[a-zA-Z\s]+$/.test(name)) {
                alert("Please enter characters only in the name field.");
                return false;
            }

            // Validate email field
            var email = document.getElementById("f_stud_email").value;
            if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate password field
            var password = document.getElementById("f_password").value;
            if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=])(?=.*[!@#$%^&*()]).{8,}/.test(password)) {
                alert("Password must contain at least one uppercase letter, one lowercase letter, one special character, one number, and minimum length of 8 characters.");
                return false;
            }

            // Validate contact field
            var contact = document.getElementById("f_stud_contact").value;
            if (!/^\d{10}$/.test(contact)) {
                alert("Please enter a 10-digit contact number.");
                return false;
            }

            // Add more validation logic for other fields as needed

            // If all validations pass, return true
            return true;
        }
    </script>

    <!-- Bootstrap JS (Place this before the closing </body> tag) -->
    <script src="js/dist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>