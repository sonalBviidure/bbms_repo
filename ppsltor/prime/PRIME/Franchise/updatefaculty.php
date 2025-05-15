<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve the 'updateid' from the query string
    $Id = $_GET['updateid'] ?? '';

    // Check if the ID is valid
    if (!is_numeric($Id)) {
        // echo "Invalid ID";
        exit;
    }

    // Construct and execute the SQL query to fetch the record
    $sql = "SELECT * FROM `facultyinfo` WHERE t_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $Id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the record
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo "Record not found";
            exit;
        }

        $srno = $row['t_id'];
                $name = $row['t_name'];
                $gender = $row['t_gender'];
                $contact = $row['t_contact'];
                $dob = $row['t_dob'];
                $experience = $row['t_experienceyear'];
                $skill1 = $row['t_skills1'];
                $skill2 = $row['t_skills2'];
                $skill3 = $row['t_skills3'];
                $achievement1 = $row['t_achievement1'];
                $achievement2 = $row['t_achievement2'];
                $achievement3 = $row['t_achievement3'];
                $maximumStudents = $row['t_maximumstudent'];
                $education = $row['t_education'];
                $qualification = $row['t_qualification'];
                $franchiseId = $row['t_franchiseid'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if (isset($_POST['submit'])) {
    // Handle form submission
    $facultyId = $_POST['facultyId'];
    $facultyName = $_POST['facultyName'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $dob = $_POST['dob'];
    $experience = $_POST['Experience'];
    $skill1 = $_POST['Skill1'];
    $skill2 = $_POST['Skill2'];
    $skill3 = $_POST['Skill3'];
    $achievement1 = $_POST['Achievement1'];
    $achievement2 = $_POST['Achievement2'];
    $achievement3 = $_POST['Achievement3'];
    $maximumStudents = $_POST['maxStudentsHandled'];
    $education = $_POST['Education'];
    $qualification = $_POST['qualification'];
    $franchiseId = $_POST['Franchiseid'];
    $Id = $_POST['updateid'] ?? '';

    // Use prepared statements to update the record
    $sql = "UPDATE `facultyinfo` SET 
    t_name = ?, 
    t_gender = ?, 
    t_contact = ?, 
    t_dob = ?, 
    t_experienceyear = ?, 
    t_skills1 = ?, 
    t_skills2 = ?, 
    t_skills3 = ?, 
    t_achievement1 = ?, 
    t_achievement2 = ?, 
    t_achievement3 = ?, 
    t_maximumstudent = ?, 
    t_education = ?, 
    t_qualification = ?, 
    t_franchiseid = ? 
    WHERE t_id = ?";
$stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssssssssii", $facultyName, $gender, $contactNumber, $dob, $experience, $skill1, $skill2, $skill3, $achievement1, $achievement2, $achievement3, $maximumStudents, $education, $qualification, $franchiseId, $facultyId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: ./viewfaculty.php');
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                    data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-icons">more_vert</span>
                </button>
                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                    id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">
                                    <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #f9fafb;"></i>
                                </a>
                                </li>
                            </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main-content">

            <div class="container">
                <h2 class="text-center">Update Faculty</h2>
                <form class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="facultyId">Faculty ID:</label>
                            <input type="text" class="form-control" id="facultyId" name="facultyId"
                                value="<?php echo $srno; ?>" required readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="facultyName">Name:</label>
                            <input type="text" class="form-control" id="facultyName" name="facultyName"
                                value="<?php echo $name; ?>" required>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <!-- Gender -->
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                    <?php echo ($gender == 'male') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                    <?php echo ($gender == 'female') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other"
                                    <?php echo ($gender == 'other') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="contactNumber">Contact Number:</label>
                            <input type="tel" class="form-control" id="contactNumber" value="<?php echo $contact; ?>"
                                name="contactNumber" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Date of Birth -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>"
                                required>
                        </div>

                        <!-- Experience -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="Experience">Experience:</label>
                            <select class="form-control" id="Experience" name="Experience" required>
                                <option value="fresher" <?php echo ($experience == 'fresher') ? 'selected' : ''; ?>>
                                    Fresher</option>
                                <option value="6" <?php echo ($experience == '6 Month') ? 'selected' : ''; ?>>6 Month
                                </option>
                                <option value="1" <?php echo ($experience == '1 Year') ? 'selected' : ''; ?>>1 Year
                                </option>
                                <option value="3" <?php echo ($experience == '3 Year') ? 'selected' : ''; ?>>3 Year
                                </option>
                                <option value="8" <?php echo ($experience == '8 Year') ? 'selected' : ''; ?>>8 Year
                                </option>
                                <option value="6" <?php echo ($experience == '6 Year') ? 'selected' : ''; ?>>6 Year
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Skill1">Skill1:</label>
                            <input type="text" class="form-control" id="Skill1" name="Skill1"
                                value="<?php echo $skill1; ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Skill2">Skill2:</label>
                            <input type="text" class="form-control" id="Skill2" name="Skill2"
                                value="<?php echo $skill2; ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Skill3">Skill3:</label>
                            <input type="text" class="form-control" id="Skill3" name="Skill3"
                                value="<?php echo $skill3; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Achievement1">Achievement1:</label>
                            <input type="text" class="form-control" id="Achievement1" name="Achievement1"
                                value="<?php echo $achievement1; ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Achievement2">Achievement2:</label>
                            <input type="text" class="form-control" id="Achievement2" name="Achievement2"
                                value="<?php echo $achievement2; ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Achievement3">Achievement3:</label>
                            <input type="text" class="form-control" id="Achievement3" name="Achievement3"
                                value="<?php echo $achievement3; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Education">Education:</label>
                            <select class="form-control" id="Education" name="Education" required>
                                <option value="B.E" <?php echo ($education == 'B.E') ? 'selected' : ''; ?>>B.E</option>
                                <option value="B.A." <?php echo ($education == 'B.A.') ? 'selected' : ''; ?>>B.A.
                                </option>
                                <option value="B.Sc." <?php echo ($education == 'B.Sc.') ? 'selected' : ''; ?>>B.Sc.
                                </option>
                                <option value="B.Ed." <?php echo ($education == 'B.Ed.') ? 'selected' : ''; ?>>B.Ed.
                                </option>
                                <option value="B.Sc.-B.Ed."
                                    <?php echo ($education == 'B.Sc.-B.Ed.') ? 'selected' : ''; ?>>B.Sc.-B.Ed.</option>
                                <option value="M.A." <?php echo ($education == 'M.A.') ? 'selected' : ''; ?>>M.A.
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="qualification">Qualification:</label>
                            <select class="form-control" id="qualification" name="qualification" required>
                                <option value="B.E (Computer Engg)"
                                    <?php echo ($qualification == 'B.E (Computer Engg)') ? 'selected' : ''; ?>>B.E
                                    (Computer Engg)</option>
                                <option value="B.A. (Bachelor of Arts)"
                                    <?php echo ($qualification == 'B.A. (Bachelor of Arts)') ? 'selected' : ''; ?>>B.A.
                                    (Bachelor of Arts)</option>
                                <option value="B.Sc. (Bachelor of Science)"
                                    <?php echo ($qualification == 'B.Sc. (Bachelor of Science)') ? 'selected' : ''; ?>>
                                    B.Sc. (Bachelor of Science)</option>
                                <option value="B.Ed. (Bachelor of Education)"
                                    <?php echo ($qualification == 'B.Ed. (Bachelor of Education)') ? 'selected' : ''; ?>>
                                    B.Ed. (Bachelor of Education)</option>
                                <option value="B.Sc.-B.Ed. Integrated Course"
                                    <?php echo ($qualification == 'B.Sc.-B.Ed. Integrated Course') ? 'selected' : ''; ?>>
                                    B.Sc.-B.Ed. Integrated Course</option>
                                <option value="M.A. in English*"
                                    <?php echo ($qualification == 'M.A. in English*') ? 'selected' : ''; ?>>M.A. in
                                    English*</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="maxStudentsHandled">Maximum Students Handled:</label>
                            <input type="number" class="form-control" id="maxStudentsHandled" name="maxStudentsHandled"
                                value="<?php echo $maximumStudents; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Franchiseid">Franchise Id</label>
                            <input type="number" class="form-control" id="Franchiseid" name="Franchiseid"
                                value="<?php echo $franchiseId; ?>" required>
                        </div>
                    </div>
                    <input type="hidden" name="updateid" value="<?php echo $srno; ?>">
                    <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4"
                        style="width: 200px;">Update Batch</button>
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
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
    </script>
</body>

</html>