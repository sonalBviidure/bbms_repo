<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $matrix_name = $_POST['matrix_name'];
    $matrix_area = $_POST['matrix_area'];
    $contact_person = $_POST['contact_person'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    // Handle file upload
    $photo = '';
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $target_dir = "uploads/matrices/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $photo = $target_dir . time() . '_' . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
    }
    
    $sql = "INSERT INTO matrices (matrix_name, matrix_area, contact_person, contact_number, email, address, photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($con, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $matrix_name, $matrix_area, $contact_person, $contact_number, $email, $address, $photo);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "New Matrix Added successfully....",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./add_matrix.php";
                    }
                });
            });
            </script>';
        } else {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Error!",
                    text: "Matrix Not Added...",
                    icon: "error"
                });
            });
            </script>';
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Matrix</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
        
        <div id="content" style="background-color:white;">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="material-icons">person</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="main-content">
                <div class="container card shadow p-3 bg-white rounded">
                    <h2>Add Matrix</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="matrix_name">Matrix Name</label>
                                <input type="text" class="form-control" name="matrix_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="matrix_area">Matrix Area</label>
                                <input type="text" class="form-control" name="matrix_area" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="state">State</label>
                                <select class="form-control" id="state" name="state" onchange="loadDistricts()" required>
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
                            <div class="col-md-4">
                                <label for="district">District</label>
                                <select id="district" name="district" class="form-control" onchange="loadSubDistricts()">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="taluka">Taluka</label>
                                <select id="subdistrict" name="subdistrict" class="form-control">
                                    <option value="">Select Taluka</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="contact_person">Contact Person Name</label>
                                <input type="text" class="form-control" name="contact_person" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact_number">Contact Number</label>
                                <input type="tel" class="form-control" name="contact_number" pattern="[0-9]{10}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" name="photo" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Add Matrix</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });
    });
    </script>
<script>
    const stateData = {
        "Maharashtra": {
            "Mumbai": ["Andheri", "Bandra", "Borivali", "Dadar", "Kurla"],
            "Pune": ["Haveli", "Mulshi", "Maval", "Bhor", "Velhe"],
            "Nagpur": ["Nagpur Urban", "Nagpur Rural", "Kamptee", "Hingna", "Ramtek"],
            "Thane": ["Thane", "Kalyan", "Bhiwandi", "Ulhasnagar", "Ambernath"],
            "Nashik": ["Nashik", "Malegaon", "Sinnar", "Igatpuri", "Dindori"],
            "Kolhapur":["Ajra", "Bhudargad","Chandgad","Gadhinglaj","Gaganbawada","Hatkanangle","Kagal","Karvir","Panhala","Radhanagari","Shahuwadi","Shirol" ]
        },
        "Gujarat": {
            "Ahmedabad": ["Daskroi", "Sanand", "Bavla", "Dholka", "Detroj"],
            "Surat": ["Surat City", "Chorasi", "Palsana", "Bardoli", "Mangrol"],
            "Vadodara": ["Vadodara", "Padra", "Karjan", "Savli", "Dabhoi"],
            "Rajkot": ["Rajkot", "Lodhika", "Kotda Sangani", "Jasdan", "Gondal"],
            "Gandhinagar": ["Gandhinagar", "Kalol", "Dehgam", "Mansa"]
        },
        "MadhyaPradesh": {
            "Bhopal": ["Huzur", "Berasia", "Phanda", "Kolar"],
            "Indore": ["Indore", "Mhow", "Depalpur", "Sawer", "Hatod"],
            "Jabalpur": ["Jabalpur", "Sihora", "Patan", "Panagar"],
            "Gwalior": ["Gwalior", "Bhitarwar", "Dabra", "Chinor"],
            "Ujjain": ["Ujjain", "Barnagar", "Khachrod", "Mahidpur"]
        }
        // Add more states and their districts/talukas as needed
    };

    function loadDistricts() {
        const state = document.getElementById("state").value;
        const districtSelect = document.getElementById("district");
        districtSelect.innerHTML = '<option value="">Select District</option>';
        
        if (stateData[state]) {
            const districts = Object.keys(stateData[state]);
            districts.forEach(district => {
                const option = document.createElement("option");
                option.value = district;
                option.text = district;
                districtSelect.appendChild(option);
            });
        }
        // Clear taluka dropdown when state changes
        document.getElementById("subdistrict").innerHTML = '<option value="">Select Taluka</option>';
    }

    function loadSubDistricts() {
        const state = document.getElementById("state").value;
        const district = document.getElementById("district").value;
        const subdistrictSelect = document.getElementById("subdistrict");
        subdistrictSelect.innerHTML = '<option value="">Select Taluka</option>';
        
        if (stateData[state] && stateData[state][district]) {
            const talukas = stateData[state][district];
            talukas.forEach(taluka => {
                const option = document.createElement("option");
                option.value = taluka;
                option.text = taluka;
                subdistrictSelect.appendChild(option);
            });
        }
    }
</script>
</body>
</html>