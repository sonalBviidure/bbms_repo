<?php
require 'connection.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Insert data into the database
if (isset($_POST['submit'])) {
    $studentName = $_POST['studentName'];
    $courseName = $_POST['courseName'];
    $testimonialText = $_POST['testimonialText'];

    $targetDir = "image/";
    $targetFile = $targetDir . basename($_FILES["studentImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_FILES["studentImage"])) {
        $check = getimagesize($_FILES["studentImage"]["tmp_name"]);
        $uploadOk = $check !== false ? 1 : 0;
    }

    if ($_FILES["studentImage"]["size"] > 500000 || !in_array($imageFileType, ["jpg", "jpeg", "png"])) {
        $uploadOk = 0;
    }

    if ($uploadOk == 1 && move_uploaded_file($_FILES["studentImage"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO testimonials (StudentImage,studentName, courseName, testimonialText) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssss",$targetFile,$studentName, $courseName, $testimonialText);

        if ($stmt->execute()) {
             echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "Testimonials Added successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./testimonials.php";
                    }
                });
            });
        </script>';
        } else {
             echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Testimonials not Added ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./testimonials.php";
                    }
                });
            });
        </script>';
        }
    } else {
          echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Testimonials not Added ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./testimonials.php";
                    }
                });
            });
        </script>';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Testimonials</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    
    <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
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
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                            id="navbarSupportedContent">
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
                <section class="add-team-member">
                    <div class="container">
                        <h2 class="text-center">Add Testimonials</h2>
                        <form id="addTestimonialForm" action="testimonials.php" method="post" class="mb-5"
                            enctype="multipart/form-data">
                            <div class="form-row mt-3">
                                <div class="form-group col-md-6">
                                    <label for="studentName">Name of Student:</label>
                                    <input type="text" class="form-control" id="studentName" name="studentName"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="courseName">Course Name:</label>
                                    <input type="text" class="form-control" id="courseName" name="courseName" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="studentImage">Student Image:</label>
                                    <div class="border" style="border-radius:5px;">
                                        <input type="file" class="form-control-file" id="studentImage" name="studentImage" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="testimonialText">Testimonial:</label>
                                    <textarea class="form-control" id="testimonialText" name="testimonialText" rows="1"
                                        required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" name="submit" class="btn btn-primary mt-2"
                                        value="Add Testimonial">
                                </div>
                            </div>
                        </form>

                        <table class="table table-striped table-bordered mt-10" id="myTable">
                            <thead>
                                <tr>
                                <th>Student Image</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Testimonial</th>
                                    <th>Enable / Disable</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                               $sqlRetrieve = "SELECT * FROM testimonials";
                               $result = $con->query($sqlRetrieve);
                              
                               if ($result->num_rows > 0) {                           
                                   while ($row = $result->fetch_assoc()) {
                                    $status = $row['status'];
                                    $srno=$row['id'];
                                       echo '<tr>
                                                <td><img src="' . $row['studentImage'] . '" alt="Student Image" style="max-width: 100px; max-height: 100px;"></td>
                                                <td>' . $row['studentName'] . '</td>
                                               <td>' . $row['courseName'] . '</td>
                                               <td>' . $row['testimonialText'] . '</td>
                                               <td>
                                               <input type="checkbox" id="statusSwitch' . $row['id'] . '" data-toggle="toggle" ' . ($row['status'] == 1 ? 'checked' : '') . ' onchange="toggleStatus(' . $row['id'] . ', this.checked)">
                                             </td>';
                                       
                                           // JavaScript function to handle the toggle and redirect
                                           echo '<script>
                                                   function toggleStatus(memberId, isChecked) {
                                                       var status = isChecked ? 1 : 0;
                                                       window.location.href = "TestimonialStatus.php?id=" + memberId + "&status=" + status;
                                                   }
                                             </script>                                              
                                             <td>
                                             <a href="updatetestimonials.php? updateid=' . $srno . '" class="btn btn-primary text-light">Update</a>
                                         </td>
                                   </tr>';
                                   }
                               } else {
                                   echo "No testimonials found!";
                               }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS, and finally DataTables JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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
    $(document).ready(function() {
        $("#myTable").dataTable();
    });
</script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    let table = new DataTable('#myTable');
    </script>
</body>

</html>