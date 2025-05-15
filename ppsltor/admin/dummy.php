<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === 'matrix_admin') {
    $id = $_POST['matrix_admin_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $taluka = $_POST['taluka'];
    $area = $_POST['area'];

    $photoName = $_FILES['photo']['name'];
    $photoTmp = $_FILES['photo']['tmp_name'];
    $photoPath = 'uploads/' . $photoName;

    move_uploaded_file($photoTmp, $photoPath);

    $stmt = $con->prepare("INSERT INTO matrix_admin VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisssssss", $id, $name, $category, $contact, $email, $photoPath, $state, $district, $taluka, $area);

    if ($stmt->execute()) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Matrix Admin Added',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href='add_matrix_admin_and_enquiry.php';
                });
            });
        </script>";
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Adding Admin',
                    confirmButtonText: 'OK'
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
  <title>Admin & Enquiry Form</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <style>
    body { background: #f4f7fc; padding: 20px; font-family: Arial, sans-serif; }
    .container { background: #fff; max-width: 1100px; margin: auto; padding: 30px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); border-radius: 10px; }
    h3 { color: #333; margin-bottom: 20px; }
    .form-section { margin-top: 40px; }
    .form-group label { font-weight: bold; }
    .btn-block { margin-top: 20px; }
  </style>
</head>
<body>

<div class="container">
  <h3>Add Matrix Admin</h3>
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="form_type" value="matrix_admin">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>ID</label>
        <input type="number" class="form-control" name="matrix_admin_id" required>
      </div>
      <div class="form-group col-md-4">
        <label>Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="form-group col-md-4">
        <label>Category</label>
        <select class="form-control" name="category" required>
          <option value="">Select</option>
          <?php
          $res = mysqli_query($con, "SELECT * FROM category");
          while ($row = mysqli_fetch_assoc($res)) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
          }
          ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Contact</label>
        <input type="text" class="form-control" name="contact" pattern="\d{10}" required>
      </div>
      <div class="form-group col-md-4">
        <label>Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="form-group col-md-4">
        <label>Photo</label>
        <input type="file" class="form-control" name="photo" accept="image/*" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>State</label>
        <select class="form-control" name="state" id="state" required>
          <option value="">Select State</option>
          <?php
          $res = mysqli_query($con, "SELECT * FROM state");
          while ($row = mysqli_fetch_assoc($res)) {
              echo "<option value='{$row['state_name']}'>{$row['state_name']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>District</label>
        <select class="form-control" name="district" id="district" required></select>
      </div>
      <div class="form-group col-md-4">
        <label>Taluka</label>
        <select class="form-control" name="taluka" id="taluka" required></select>
      </div>
    </div>
    <div class="form-group">
      <label>Area</label>
      <input type="text" class="form-control" name="area" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Add Admin</button>
  </form>

  <div class="form-section">
    <h3>Student Enquiry Form</h3>
    <form action="enquiry_process.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Full Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="contact">Contact Number:</label>
          <input type="tel" class="form-control" id="contact" name="contact" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group col-md-6">
          <label for="college">College Name:</label>
          <input type="text" class="form-control" id="college" name="college" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="education">Education:</label>
          <input type="text" class="form-control" id="education" name="education" required>
        </div>
        <div class="form-group col-md-6">
          <label for="state">State:</label>
          <select class="form-control" id="state" name="state" required>
            <option value="Maharashtra">Maharashtra</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="district">District:</label>
          <select class="form-control" id="district" name="district" required>
            <option value="">Select District</option>
            <option value="Ahmednagar">Ahmednagar</option>
            <option value="Pune">Pune</option>
            <option value="Nagpur">Nagpur</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="taluka">Taluka:</label>
          <select class="form-control" id="taluka" name="taluka" required>
            <option value="">Select Taluka</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-success btn-block">Submit Enquiry</button>
    </form>
  </div>
</div>

<script>
$(document).ready(function () {
    $('#state').change(function () {
        var state = $(this).val();
        $.ajax({
            url: 'get_districts.php',
            type: 'POST',
            data: {state: state},
            success: function (data) {
                $('#district').html(data);
                $('#taluka').html('<option value="">Select Taluka</option>');
            }
        });
    });

    $('#district').change(function () {
        var district = $(this).val();
        $.ajax({
            url: 'get_talukas.php',
            type: 'POST',
            data: {district: district},
            success: function (data) {
                $('#taluka').html(data);
            }
        });
    });
});
</script>
</body>
</html>
