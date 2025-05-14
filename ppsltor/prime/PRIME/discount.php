<?php
include 'connection.php'; // Include database connection script
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data using $_POST superglobal
    $test_name = $_POST['t_name'];
    $test_email = $_POST['t_email'];
    $test_con_no = $_POST['t_con'];
    $test_courses = $_POST['t_course'];
    $test_date = $_POST['t_date'];
    $test_time = $_POST['t_time'];

    // Prepare SQL statement with placeholders for values
    $sql = "INSERT INTO testregi (t_name, t_email, t_con, t_course, t_date, t_time) VALUES (?, ?, ?, ?, ?, ?)";

    // Use prepared statement to avoid SQL injection
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssss", $test_name, $test_email, $test_con_no, $test_courses, $test_date, $test_time);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodePel">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <title>Test Registration Form</title>
  
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/discount.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    
    <div class="container form-container my-5">
        <h2 class="text-center mb-4">Test Registration Form</h2>
        <form action="#" method="post" onsubmit="return validateForm()" class="row g-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="t_name"><i class="fas fa-user"></i> Name:</label>
                    <input type="text" id="t_name" name="t_name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="t_email"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="email" id="t_email" name="t_email" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="t_con"><i class="fas fa-phone-alt"></i> Contact Number:</label>
                    <input type="text" id="t_con" name="t_con" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="t_course">Courses:</label>
                    <select class="form-control" id="t_course" name="t_course" required>
                        <option value="">Select course</option>
                        <!-- Loop to populate courses -->
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?php echo htmlspecialchars($course['t_name']); ?>"><?php echo htmlspecialchars($course['t_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="t_date"><i class="far fa-calendar-alt"></i> Test Date:</label>
                    <input type="date" id="t_date" name="t_date" class="form-control" required>
                    <small id="date-warning" class="form-text text-danger mt-1">Please select a test date within 1 week.</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="t_time"><i class="far fa-clock"></i> Timing:</label>
                    <select id="t_time" name="t_time" class="form-control" required>
                        <option value="">Select Timing</option>
                        <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                        <option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
                        <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary"><b>SUBMIT</b></button>
                </div>
            </div>
        </form>
    </div>

    <?php include('footer.php'); ?>
    
    <script>
        function validateForm() {
            var testDateInput = document.getElementById('t_date').value;
            var testDate = new Date(testDateInput);
            var oneWeekLater = new Date();
            oneWeekLater.setDate(oneWeekLater.getDate() + 7);

            if (testDate > oneWeekLater) {
                alert('Please select a test date within 1 week.');
                return false;
            } else {
                return true;
            }
        }
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
