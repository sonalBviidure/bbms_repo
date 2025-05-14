<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch categories from category table
$categories = [];
$categoryQuery = "SELECT category_name FROM category";
$categoryResult = mysqli_query($con, $categoryQuery);
while ($row = mysqli_fetch_assoc($categoryResult)) {
    $categories[] = $row['category_name'];
}

// Handle form submission
if (isset($_POST['submit'])) {
    $adminId = $_POST['adminId'];
    $adminName = $_POST['adminName'];
    $businessName = $_POST['businessName'];
    $category = $_POST['category'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $taluka = $_POST['taluka'];
    $area = $_POST['area'];

    // Handle photo upload
    $photoName = $_FILES['photo']['name'];
    $photoTmp = $_FILES['photo']['tmp_name'];
    $photoPath = "uploads/" . $photoName;

    if (move_uploaded_file($photoTmp, $photoPath)) {
        $sql = "INSERT INTO matrix_admin (admin_id, admin_name, business_name, category, photo, contact, email, state, district, taluka, area)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $adminId, $adminName, $businessName, $category, $photoPath, $contact, $email, $state, $district, $taluka, $area);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Success',
                            text: 'Matrix Admin added successfully!',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = 'add_matrix_admin.php';
                        });
                    });
                </script>";
            } else {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Error',
                            text: 'Data not inserted!',
                            icon: 'error'
                        });
                    });
                </script>";
            }
        }
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Upload Error',
                    text: 'Failed to upload photo!',
                    icon: 'error'
                });
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Matrix Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>
    <?php include 'sidebar.php'; ?>
    <div id="content" style="background-color:white;">
        <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
            </nav>
        </div>

        <div class="main-content">
            <div class="container card shadow p-4 bg-white rounded">
                <h2>Add Matrix Admin</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Matrix Admin ID</label>
                            <input type="text" name="adminId" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Admin Name</label>
                            <input type="text" name="adminName" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Business Name</label>
                            <input type="text" name="businessName" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                <option disabled selected>Select Category</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control-file" accept="image/*" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Contact Number</label>
                            <input type="tel" name="contact" class="form-control" pattern="[0-9]{10}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Email ID</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="Maharashtra" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label>District</label>
                            <select name="district" id="district" class="form-control" required>
                                <option value="" disabled selected>Select District</option>
                                <option value="Pune">Pune</option>
                                <option value="Nashik">Nashik</option>
                                <option value="Sangli">Sangli</option>
                                <option value="Satara">Satara</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Taluka</label>
                            <select name="taluka" id="taluka" class="form-control" required></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Area</label>
                            <select name="area" id="area" class="form-control" required></select>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mt-3 d-block mx-auto" style="width: 200px;">Add Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
const talukaMap = {
    "Pune": ["Pune City", "Mulshi", "Haveli", "Maval"],
    "Nashik": ["Nashik City", "Sinnar", "Dindori"],
    "Sangli": ["Miraj", "Tasgaon", "Walwa"],
    "Satara": ["Satara City", "Karad", "Mahabaleshwar"]
};

const areaMap = {
    "Pune City": ["Kothrud", "Hadapsar"],
    "Mulshi": ["Pirangut", "Lavasa"],
    "Haveli": ["Wagholi", "Manjri"],
    "Maval": ["Talegaon", "Kamshet"],
    "Nashik City": ["Panchavati", "Satpur"],
    "Sinnar": ["Sinnar MIDC", "Malegaon"],
    "Dindori": ["Dindori Taluka"],
    "Miraj": ["Sangli City", "Wanlesswadi"],
    "Tasgaon": ["Tasgaon City", "Kavathe Mahankal"],
    "Walwa": ["Islampur", "Ashta"],
    "Satara City": ["Powai Naka", "Shahupuri"],
    "Karad": ["Karad East", "Karad West"],
    "Mahabaleshwar": ["Old Mahabaleshwar", "New Mahabaleshwar"]
};

$('#district').on('change', function () {
    const talukaSelect = $('#taluka');
    const selectedDistrict = $(this).val();
    const talukas = talukaMap[selectedDistrict] || [];

    talukaSelect.empty().append('<option selected disabled>Select Taluka</option>');
    talukas.forEach(t => talukaSelect.append(`<option value="${t}">${t}</option>`));
    $('#area').empty().append('<option selected disabled>Select Area</option>');
});

$('#taluka').on('change', function () {
    const areaSelect = $('#area');
    const selectedTaluka = $(this).val();
    const areas = areaMap[selectedTaluka] || [];

    areaSelect.empty().append('<option selected disabled>Select Area</option>');
    areas.forEach(a => areaSelect.append(`<option value="${a}">${a}</option>`));
});

// Sidebar toggle
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });

    $('.more-button,.body-overlay').on('click', function () {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
    });
});
</script>
</body>
</html>
