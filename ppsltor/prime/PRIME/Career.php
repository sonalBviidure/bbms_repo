<?php
// Assuming you already have a database connection

include('Includes/connection.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $education = $_POST['education'];
    $college = $_POST['college'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $qualification = $_POST['qualification'];
    $position = $_POST['position'];

    // File Upload Handling
    $resume = $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_destination = 'admin/application/' . $resume; // Choose your desired upload directory

    // Use prepared statement to avoid SQL injection
    $sql = "INSERT INTO `job_application` (name, contact, dob, education, college, experience, skills, qualification, position, resume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $contact, $dob, $education, $college, $experience, $skills, $qualification, $position, $resume);

        if (move_uploaded_file($resume_tmp, $resume_destination) && mysqli_stmt_execute($stmt)) {
            echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "Your information is submitted successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "Career.php";
                    }
                });
            });
        </script>';
            } else {
            echo '<div class="alert alert-danger" role="alert">
                    <b>Error: ' . mysqli_error($con) . '</b>
                  </div>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <b>Error in prepared statement: ' . mysqli_error($con) . '</b>
              </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <title>Company Careers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/career.css">

       <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 

</head>

<body>
    <?php include('navbar.php');?>

    <section class="container mt-5">
       <center> <h2 style="margin-top:110px"><span class="latter">C</span>areers</h2></center>
       <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
            // SQL query to retrieve job details
            $sql = "SELECT * FROM job_vacancies WHERE status = 1";

            // Execute the query
            $result = mysqli_query($con, $sql);

            // Check if there are any rows returned
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row of data
                while ($row = mysqli_fetch_assoc($result)) {
                    // Extract job details from the current row
                    $jobTitle = $row['job_title'];
                    $jobDescription = $row['skills_required'];
                    $location = $row['location'];
                    $salary = $row['salary'];
                    $lateDate = $row['late_date'];

                    // Output the HTML template for each job
                    ?>
                    
                    <div class="col">
            <div class="card job-card mb-4">
                <h3 class="card-title">Job Title: <?php echo $jobTitle; ?></h3>
                <br>
                <p class="card-text"><strong>Basic Skills:</strong> <?php echo $jobDescription; ?></p>
                <p class="card-text"><strong>Location:</strong> <?php echo $location; ?></p>
                <p class="card-text"><strong>Salary:</strong> <?php echo $salary; ?></p>
                <p class="card-text"><strong>Late Date:</strong> <?php echo $lateDate; ?></p>
                <a href="#" class="btn btn-primary apply-button" data-toggle="modal" data-target="#applyModal">Apply Now</a>
            </div>
        </div>
        <?php
    }
} else {
    echo "No job vacancies found.";
}
?>

        <!-- Button to trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal">Apply Now </button> -->

        <div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModalLabel">Apply Form</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body p-3">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name" class="mb-2">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="contact" class="mb-2">Contact Number</label>
                                        <input type="tel" class="form-control" id="contact"
                                            placeholder="Enter your contact number" name="contact" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="dob" class="mb-2">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="education" class="mb-2">Education</label>
                                        <input type="text" class="form-control" id="education" name="education"
                                            placeholder="Enter your education details" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="college" class="mb-2">College Name</label>
                                        <input type="text" class="form-control" id="college" name="college"
                                            placeholder="Enter your college name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="experience" class="mb-2">Experience</label>
                                        <input type="text" class="form-control" id="experience" name="experience"
                                            placeholder="Enter your experience details" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="skills" class="mb-2">Skills</label>
                                        <input type="text" class="form-control" id="skills" name="skills"
                                            placeholder="Enter your skills details" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="qualification" class="mb-2">Qualification</label>
                                        <input type="text" class="form-control" id="qualification" name="qualification"
                                            placeholder="Enter your qualification details" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="position" class="mb-2">Position</label>
                                            <input type="text" class="form-control" id="position" name="position"
                                                placeholder="Enter Position" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="resume">Resume (PDF)</label>
                                        <div class="border p-1">
                                            <input type="file" class="form-control-file" id="resume" name="resume" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </body>
</html>