<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established in connection.php

    include('Includes/connection.php');

    // Collect form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contact = mysqli_real_escape_string($con, $_POST['contactNumber']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO leads (l_name, l_phone, l_email) VALUES ('$name', '$contact', '$email')";

    // Perform the query
    if (mysqli_query($con, $sql)) {
        echo'  <script>
        document.addEventListener(\'DOMContentLoaded\', function () {
            Swal.fire({
                title: "Congratulations",
                text: "Your information is submitted successfully....",
                icon: "success"
            }).then((result) => {
                // Redirect to inquiry.php after user clicks "OK"
                if (result.isConfirmed) {
                    window.location.href = "inquiry.php";
                }
            });
        });
    </script>';
 } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Invalid request method";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Good Relationship</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  
    <link rel="stylesheet" href="css/course.css">
   <!-- Include SweetAlert2 library -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
</head>
<body>
<?php include('navbar.php');?> 
    <section class="courses">
        <h1 class="courses-heading">Courses</h1>
        <div class="course-cards-container">
            <div class="course-card">
                <img class="course-img" src="image/01.png" alt="Course Image 1">
                <div class="course-info">
                    <div class="course-title">Good Relationship</div>
                    <div class="location">
                        <span class="location-icon">📍</span> Location: City 1, Country 1
                    </div>
                    <div class="description">Course Description goes here. Provide a brief overview of the course.</div>
                    <div class="price"> ₹1,500</div>
                    <a href="#" class="inquiry-btn"   class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inquiryModal">Inquire Now</a>
                </div>
            </div>

            <div class="course-card">
                <img class="course-img" src="image/02.png" alt="Course Image 2">
                <div class="course-info">
                    <div class="course-title">Good Relationship</div>
                    <div class="location">
                        <span class="location-icon">📍</span> Location: City 2, Country 2
                    </div>
                    <div class="description">Course Description goes here. Provide a brief overview of the course.</div>
                    <div class="price">&nbsp;</div>
                    <a href="#" class="inquiry-btn"   class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inquiryModal">Inquire Now</a>
                </div>
            </div>
        </div>

        <div class="course-cards-container">
            <div class="course-card">
                <img class="course-img" src="download2.jpg" alt="Course Image 1">
                <div class="course-info">
                    <div class="course-title">Good Relationship</div>
                    <div class="location">
                        <span class="location-icon">📍</span> Location: City 3, Country 3
                    </div>
                    <div class="description">Course Description goes here. Provide a brief overview of the course.</div>
                    <div class="price">&nbsp;</div>
                    <a href="#" class="inquiry-btn"   class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inquiryModal">Inquire Now</a>
                </div>
            </div>

            <div class="course-card">
                <img class="course-img" src="download1.jpg" alt="Course Image 2">
                <div class="course-info">
                    <div class="course-title">Good Relationship</div>
                    <div class="location">
                        <span class="location-icon">📍</span> Location: City 4, Country 4
                    </div>
                    <div class="description">Course Description goes here. Provide a brief overview of the course.</div>
                    <div class="price">&nbsp;</div>
                    <a href="#" class="inquiry-btn"   class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inquiryModal">Inquire Now</a>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="inquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inquiryModalLabel">Inquiry Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="inquiryForm"  method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your name.." required>
          </div>
          <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="contactNumber" name="contactNumber" placeholder="Your contact number.." maxlength="10" oninput="limitContactNumber()" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Your email.." required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <?php include('footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
