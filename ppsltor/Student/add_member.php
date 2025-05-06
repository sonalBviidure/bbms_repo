<?php
include 'connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $matrix_id = $_POST['matrix_id'];
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
    
    $query = "INSERT INTO members (matrix_id, state, district, taluka, contact_person, business_name, 
              business_category, business_address, member_photo, business_photo) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "isssssssss", $matrix_id, $state, $district, $taluka, $contact_person, 
                          $business_name, $business_category, $business_address, $member_photo, $business_photo);
    
    if(mysqli_stmt_execute($stmt)) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Member added successfully',
                icon: 'success'
            }).then(() => {
                window.location.href = 'view_members.php';
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Member</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        
        <div id="content">
            <div class="container-fluid">
                <div class="back-section mb-4">
                    <a href="dashboard.php" class="text-decoration-none text-dark">
                        <i class="material-icons align-middle">arrow_back</i>
                        <span>Dashboard</span>
                    </a>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Add Member</h4>
                        <form method="POST" enctype="multipart/form-data" class="mt-4">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">Matrix Name:</label>
                                                <select class="form-select" name="matrix_id" required>
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
                                        </div>
                                        <div class="col-md-6">
                                            <label>State:</label>
                                            <input type="text" class="form-control" name="state" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>District:</label>
                                            <input type="text" class="form-control" name="district" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Taluka:</label>
                                            <input type="text" class="form-control" name="taluka" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Business Contact Person:</label>
                                            <input type="text" class="form-control" name="contact_person" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Business Name:</label>
                                            <input type="text" class="form-control" name="business_name" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Business Category:</label>
                                            <input type="text" class="form-control" name="business_category" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Business Address:</label>
                                            <textarea class="form-control" name="business_address" rows="3" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Member Photo:</label>
                                            <input type="file" class="form-control" name="member_photo" accept="image/*" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Business Photo:</label>
                                            <input type="file" class="form-control" name="business_photo" accept="image/*" required>
                                        </div>
                                    </div>

                                    <div class="text-end mt-4">
                                        <button type="submit" name="submit" class="btn btn-primary">Add Member</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
body {
    background: #f6f7fb;
    font-family: 'Roboto', sans-serif;
}

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #fff;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    height: 100vh;
    position: fixed;
    transition: all 0.3s;
}

#content {
    width: calc(100% - 250px);
    padding: 30px;
    min-height: 100vh;
    margin-left: 250px;
    transition: all 0.3s;
}

.back-section {
    padding: 10px 0;
}

.back-section i {
    font-size: 20px;
    vertical-align: middle;
    margin-right: 5px;
}

.card {
    background: #fff;
    border-radius: 10px;
    border: none;
    box-shadow: 0 0 10px rgba(0,0,0,0.03);
}

.card-body {
    padding: 30px;
}

.form-control, .form-select {
    border: 1px solid #e4e6ef;
    padding: 0.625rem 1rem;
    height: 45px;
    border-radius: 6px;
    background-color: #fff;
    transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #b5b5c3;
    outline: 0;
    box-shadow: none;
}

label {
    font-size: 13px;
    font-weight: 500;
    color: #3f4254;
    margin-bottom: 0.5rem;
}

.btn-primary {
    background-color: #009ef7;
    border-color: #009ef7;
    padding: 0.75rem 1.5rem;
    font-size: 13px;
    font-weight: 500;
    border-radius: 6px;
}

.btn-primary:hover {
    background-color: #0095e8;
    border-color: #0095e8;
}

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #content {
        width: 100%;
        margin-left: 0;
    }
    #sidebar.active {
        margin-left: 0;
    }
}
</style>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    function showAddMemberForm() {
        // Hide other content if any
        $('.main-content > div').hide();
        
        // Show the add member form
        $('#addMemberForm').show();
        
        // Update the back button href
        $('.back-section a').attr('href', '#').on('click', function(e) {
            e.preventDefault();
            window.history.back();
        });
    }

    // Show form if directly accessed via URL
    if(window.location.pathname.includes('add_member.php')) {
        showAddMemberForm();
    }
    </script>
</body>
</html>