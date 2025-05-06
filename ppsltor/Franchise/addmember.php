<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $matrix_id = $_POST['matrix_name'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $taluka = $_POST['taluka'];
    $contact_person = $_POST['contact_person'];
    $business_name = $_POST['business_name'];
    $business_category = $_POST['business_category'];
    $business_address = $_POST['business_address'];
    
    // Handle member photo upload
    $member_photo = '';
    if(isset($_FILES['member_photo']) && $_FILES['member_photo']['error'] == 0) {
        $target_dir = "image/members/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $member_photo = time() . '_member_' . basename($_FILES['member_photo']['name']);
        move_uploaded_file($_FILES['member_photo']['tmp_name'], $target_dir . $member_photo);
    }

    // Handle business photo upload
    $business_photo = '';
    if(isset($_FILES['business_photo']) && $_FILES['business_photo']['error'] == 0) {
        $target_dir = "image/business/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $business_photo = time() . '_business_' . basename($_FILES['business_photo']['name']);
        move_uploaded_file($_FILES['business_photo']['tmp_name'], $target_dir . $business_photo);
    }
    
    $sql = "INSERT INTO members (matrix_id, state, district, taluka, contact_person, business_name, 
            business_category, business_address, member_photo, business_photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($con, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isssssssss", $matrix_id, $state, $district, $taluka, 
                             $contact_person, $business_name, $business_category, $business_address, 
                             $member_photo, $business_photo);
    
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>
                alert('Member added successfully!');
                window.location.href = 'view_members.php';
            </script>";
        } else {
            echo 'Error: ' . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <b>Error in prepared statement: ' . mysqli_error($con) . '</b>
              </div>';
    }
}
?>



<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Add Batch
		</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/style.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	
	
	
	<!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
  </head>
  <body>
  



<div class="wrapper">


<div class="body-overlay"></div>
        <?php require 'sidebar.php'?>
        <!-- Page Content  -->
        <div id="content" style="background-color:white;">
		
		<div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
					<a class="navbar-brand" href="#"> Dashboard </a>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <h2 class="text-center">Add Board Member</h2>
                    <form class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="matrix_name" class="form-label">Matrix Name</label>
                                <select class="form-control" name="matrix_name" id="matrix_name" required>
                                    <option value="">Select Matrix</option>
                                    <?php
                                    $sql = "SELECT id, matrix_name FROM matrices WHERE status = 1";
                                    $result = $con->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['matrix_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="state" class="form-label">State</label>
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
                                    <option value="HimachalPradesh">Himachal Pradesh</option>
                                    <option value="JammuKashmir">Jammu & Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="MadhyaPradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="TamilNadu">Tamil Nadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="UttarPradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="WestBengal">West Bengal</option>
                                    <option value="AndamanNicobar">Andaman & Nicobar</option>
                                    <option value="DamanDiu">Daman & Diu</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Puducherry">Puducherry</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="district" class="form-label">District</label>
                                <select id="district" name="district" class="form-control" onchange="loadSubDistricts()" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="taluka" class="form-label">Taluka</label>
                                <select id="taluka" name="taluka" class="form-control" required>
                                    <option value="">Select Taluka</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="contact_person" class="form-label">Business Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Enter Contact Person Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="business_name" class="form-label">Business Name</label>
                                <input type="text" class="form-control" name="business_name" id="business_name" placeholder="Enter Business Name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="business_category" class="form-label">Business Category</label>
                                <input type="text" class="form-control" name="business_category" id="business_category" placeholder="Enter Business Category" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="business_address" class="form-label">Business Address</label>
                                <textarea class="form-control" name="business_address" id="business_address" rows="3" placeholder="Enter Business Address" required></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="member_photo" class="form-label">Board Member Photo</label>
                                <input type="file" class="form-control" name="member_photo" id="member_photo" accept="image/*" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="business_photo" class="form-label">Business Photo</label>
                                <input type="file" class="form-control" name="business_photo" id="business_photo" accept="image/*" required>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;">Add Board Member</button>
                    </form>
                </div>
            </div>


            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/dist.js"></script>

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

    function loadDistricts() {
        var state = document.getElementById("state").value;
        var districtSel = document.getElementById("district");
        var talukaSel = document.getElementById("taluka");
        
        // Clear existing options
        districtSel.innerHTML = '<option value="">Select District</option>';
        talukaSel.innerHTML = '<option value="">Select Taluka</option>';
        
        if(state === "Maharashtra") {
            var districts = ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", 
                           "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", 
                           "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", 
                           "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", 
                           "Washim", "Yavatmal"];
            districts.forEach(function(district) {
                var option = document.createElement("option");
                option.value = district;
                option.text = district;
                districtSel.appendChild(option);
            });
        }
        // Add more states as needed
    }

    function loadSubDistricts() {
        var district = document.getElementById("district").value;
        var talukaSel = document.getElementById("taluka");
        
        // Clear existing options
        talukaSel.innerHTML = '<option value="">Select Taluka</option>';
        
        // District-Taluka mapping
        var talukaMap = {
            "Pune": ["Ambegaon", "Baramati", "Bhor", "Daund", "Haveli", "Indapur", "Junnar", "Khed", "Maval", 
                    "Mulshi", "Pune City", "Purandar", "Shirur", "Velhe"],
            "Mumbai City": ["Mumbai City", "South Mumbai", "North Mumbai"],
            "Nashik": ["Baglan", "Chandvad", "Deola", "Dindori", "Igatpuri", "Kalwan", "Malegaon", "Nandgaon", 
                      "Nashik", "Niphad", "Peth", "Sinnar", "Surgana", "Trimbakeshwar", "Yeola"],
            "Nagpur": ["Nagpur Urban", "Nagpur Rural", "Kamptee", "Hingna", "Katol", "Narkhed", "Savner", 
                      "Kalameshwar", "Ramtek", "Mouda", "Parseoni", "Umred", "Kuhi", "Bhiwapur"],
            "Thane": ["Thane", "Kalyan", "Bhiwandi", "Ulhasnagar", "Ambernath", "Murbad", "Shahapur"]
        };
        
        // Check if the selected district exists in our mapping
        if (talukaMap.hasOwnProperty(district)) {
            talukaMap[district].forEach(function(taluka) {
                var option = document.createElement("option");
                option.value = taluka;
                option.text = taluka;
                talukaSel.appendChild(option);
            });
        }
    }
    </script>
</body>

</html>