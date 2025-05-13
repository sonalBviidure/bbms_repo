<!DOCTYPE html>
<html>
<head>
    <title>BBM Solution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('navbar.php');?>

<div class="container mt-5 pt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-4">
                <div class="card-header text-white" style="background: linear-gradient(to right, #1abc9c, #3498db);">
                    <h4 class="mb-0">Search Matrix Nearby Me</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <select name="state" id="state" class="form-select" onchange="loadDistricts()" required>
                                <option value="">Select State</option>
                                <?php
                                $states = [
                                    "AndraPradesh" => "Andhra Pradesh",
                                    "ArunachalPradesh" => "Arunachal Pradesh",
                                    "Assam" => "Assam",
                                    "Bihar" => "Bihar",
                                    "Chhattisgarh" => "Chhattisgarh",
                                    "Goa" => "Goa",
                                    "Gujarat" => "Gujarat",
                                    "Haryana" => "Haryana",
                                    "HimachalPradesh" => "Himachal Pradesh",
                                    "JammuKashmir" => "Jammu & Kashmir",
                                    "Jharkhand" => "Jharkhand",
                                    "Karnataka" => "Karnataka",
                                    "Kerala" => "Kerala",
                                    "MadhyaPradesh" => "Madhya Pradesh",
                                    "Maharashtra" => "Maharashtra",
                                    "Manipur" => "Manipur",
                                    "Meghalaya" => "Meghalaya",
                                    "Mizoram" => "Mizoram",
                                    "Nagaland" => "Nagaland",
                                    "Odisha" => "Odisha",
                                    "Punjab" => "Punjab",
                                    "Rajasthan" => "Rajasthan",
                                    "Sikkim" => "Sikkim",
                                    "TamilNadu" => "Tamil Nadu",
                                    "Telangana" => "Telangana",
                                    "Tripura" => "Tripura",
                                    "UttarPradesh" => "Uttar Pradesh",
                                    "Uttarakhand" => "Uttarakhand",
                                    "WestBengal" => "West Bengal"
                                ];
                                foreach($states as $value => $name) {
                                    echo "<option value='$value'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">District</label>
                            <select name="district" id="district" class="form-select" required>
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <button type="submit" class="btn text-white" style="background: linear-gradient(to right, #1abc9c, #3498db);">
                            Search
                        </button>
                    </form>
                </div>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['state']) && isset($_POST['district'])) {
                require 'connection.php';
                $state = $_POST['state'];
                $district = $_POST['district'];
                
                $sql = "SELECT * FROM matrices WHERE state = ? AND district = ? AND status = 1";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ss", $state, $district);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    echo '<div class="row">';
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header text-white" style="background: linear-gradient(to right, #1abc9c, #3498db);">
                                    <h5 class="mb-0"><?php echo htmlspecialchars($row['matrix_name']); ?></h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>Contact Person:</strong> <?php echo htmlspecialchars($row['contact_person']); ?></p>
                                    <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($row['contact_number']); ?></p>
                                    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                                    <p><strong>Address:</strong> <?php echo htmlspecialchars($row['district'] . ', ' . $row['state']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-info">No matrix found in the selected location.</div>';
                }
                $stmt->close();
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/dist.js"></script>
<script>
$(document).ready(function() {
    $('select[name="state"]').on('change', function() {
        var state = $(this).val();
        var district_select = $('select[name="district"]');
        district_select.html('<option value="">Select District</option>');
        $('select[name="taluka"]').html('<option value="">Select Taluka</option>');
        
        if(state && districtsData[state]) {
            districtsData[state].forEach(function(district) {
                district_select.append('<option value="'+district+'">'+district+'</option>');
            });
        }
    });

    $('select[name="district"]').on('change', function() {
        var district = $(this).val();
        var taluka_select = $('select[name="taluka"]');
        taluka_select.html('<option value="">Select Taluka</option>');
    });
});
</script>
</body>
</html>