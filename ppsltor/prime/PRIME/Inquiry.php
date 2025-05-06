<?php
// Database connection details

include('Includes/connection.php');
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if(isset($_POST['sub'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $countryCode = $_POST['countryCode'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $subdistrict = $_POST['subdistrict'];
    $village = $_POST['Village'];
    $zip = $_POST['zip'];
    $subject=$_POST['subject'];

    // SQL query to insert data into the database
    $stmt = $con->prepare("INSERT INTO inquiry (t_name, t_countrycode, t_contact, t_email, t_country, t_state, t_district, t_subdistrict, t_taluka, t_pincode, t_inquirysubject) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssssssssss", $name, $countryCode, $contact, $email, $country, $state, $district, $subdistrict, $village, $zip, $subject);
    
        // Execute statement
        if ($stmt->execute()) {
            header("Location: Inquiry.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry</title>
    <link rel="stylesheet" href="css/inquiry.css">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    
   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php include('navbar.php');?>

<div class="container mt-5">
        <h1 class="text-center"><span class="latter">I</span>nquiry <span class="latter">F</span>orm</h1>

        <form id="inquiryForm" method="post" class="mt-5">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="contact" class="form-label">Contact:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                        </div>
                        <input type="number" class="form-control" id="countryCode" name="countryCode" value="91"
                            placeholder="Country Code" required>
                        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Phone Number"
                            required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="country" class="form-label">Country:</label>
                    <select class="form-select" id="country" name="country" required>
                        <option value="">Select Country</option>
                        <option value="India">India</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="state" class="form-label">State:</label>
                    <select class="form-select" id="state" name="state" onchange="loadDistricts()" required>
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

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="district">District:</label>
                        <select id="district" name="district" class="form-control" onchange="loadSubDistricts()"></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subdistrict">Sub-District:</label>
                        <select id="subdistrict" name="subdistrict" class="form-control"></select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="Village" class="form-label">Village:</label>
                        <input type="text" class="form-control" id="Village" name="Village" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="zip" class="form-label">Zip Code:</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-12">
                    <label for="subject" class="form-label">Subject:</label>
                    <textarea class="form-control" id="subject" name="subject" rows="3" required></textarea>
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto mb-3  mt-4" style="width: 200px;" name="sub">Submit</button>
        </form>
    </div>


<!-- Bootstrap JS (Place this before the closing </body> tag) -->
<script src="js/dist.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>