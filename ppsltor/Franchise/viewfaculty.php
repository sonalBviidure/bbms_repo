<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>View Faculty
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/style.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
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
                
                <div class="container-fluid mt-5">
                <h2 class="text-center" >View Faculty</h2>
        <table class="table table-striped table-bordered mt-10" id="myTable">
          <thead>
            <tr>
              <th scope="col">Faculty Id</th>
              <th scope="col">Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Contact</th>
              <th scope="col">DateofBirth</th>
              <th scope="col">Experience</th>
              <th scope="col">Skill1</th>
              <th scope="col">Skill2</th>
              <th scope="col">Skill3</th>
              <th scope="col">Achievement1</th>
              <th scope="col">Achievement2</th>
              <th scope="col">Achievement3</th>
              <th scope="col">Maximum Students</th>
              <th scope="col">Education</th>
              <th scope="col">Qualification</th>
              <th scope="col">FranchiseId</th>
              <th scope="col">Operation</th>

            </tr>
          </thead>
          <tbody>
            <?php
            require 'connection.php';
            $sql = "select * from facultyinfo";
            $result = mysqli_query($con, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
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
                echo '<tr>
                <th scope="row">' . $srno . '</th>
                <td>' . $name . '</td>
                <td>' . $gender . '</td>
                <td>' . $contact . '</td>
                <td>' . $dob . '</td>
                <td>' . $experience . '</td>
                <td>' . $skill1 . '</td>
                <td>' . $skill2 . '</td>
                <td>' . $skill3 . '</td>
                <td>' . $achievement1 . '</td>
                <td>' . $achievement2 . '</td>
                <td>' . $achievement3 . '</td>
                <td>' . $maximumStudents . '</td>
                <td>' . $education . '</td>
                <td>' . $qualification . '</td>
                <td>' . $franchiseId . '</td>
                
                <td><a href="updatefaculty.php? updateid=' . $srno . '" class="btn btn-primary text-light">Update</a>
            
                </tr>';
              }
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>

            </div>
            <!--main closing-->
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
   
   
    $(document).ready(function() {
        $("#myTable").dataTable();
    });
</script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    let table = new DataTable('#myTable');
    </script>
  </body>

</html>