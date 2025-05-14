<?php
require 'connection.php';

// Check if the form is submitted
if (isset($_POST['addGallery'])) {
    // Check connection
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve data from the form
    $description = mysqli_real_escape_string($con, $_POST['Description']);

    // Upload image
    $uploadDirectory = "image/"; // Change this to your desired directory
    $galleryImage = $_FILES['galleryImage']['name'];
    $uploadedFilePath = $uploadDirectory . basename($galleryImage);
    move_uploaded_file($_FILES['galleryImage']['tmp_name'], $uploadedFilePath);

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO gallery (gallery_image, gallery_description) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $uploadedFilePath, $description);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
         echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "Your Image is Added successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./Gallery.php";
                    }
                });
            });
        </script>';
    } else {
         echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Error !",
                    text: "Gallery Image not Added ...",
                    
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "./Gallery.php"";
                    }
                });
            });
        </script>';
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Gallery</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
	<!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        
        <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
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
            <section class="add-team-member">
                <div class="container align-items-center">
                    <h2 class="text-center">Add Image in Gallery</h2>
                    <form id="addTeamMemberForm" action="gallery.php" method="post" enctype="multipart/form-data">
                        <div class="form-row align-items-center mb-5">
                            <div class="form-group col-md-5">
                                <label for="galleryImage">Upload Image:</label>
                                <div class="border p-1" style="border-radius:5px;">
                                    <input type="file" class="form-control-file" id="galleryImage" name="galleryImage"
                                        accept="image/*" required>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Description">Description:</label>
                                <input type="text" class="form-control" id="Description" name="Description" required>
                            </div>

                            <div class="form-group col-md-2">
                                <input type="submit" name="addGallery" class="btn btn-primary mt-4" value="Add">
                            </div>
                        </div>
                    </form>

                    <table class="table table-striped table-bordered mt-10" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Enable and Disable</th>
                                <th class="text-center">Operations</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                               $sqlRetrieve = "SELECT * FROM gallery";
                               $result = $con->query($sqlRetrieve);
                              
                               if ($result->num_rows > 0) {                           
                                while ($row = $result->fetch_assoc()) {
                                    $srno=$row['id'];
                                    $status = $row['status'];
                                    echo "<tr class='text-center'><td width='300'><img src='" . $row['gallery_image'] . "' width='100' height='100'></td><td>" . $row['gallery_description'] . "</td>";
                                    echo '
                                     <td>
                                                <input type="checkbox" id="statusSwitch' . $row['id'] . '" data-toggle="toggle" ' . ($row['status'] == 1 ? 'checked' : '') . ' onchange="toggleStatus(' . $row['id'] . ', this.checked)">
                                            </td>';
                                
                                    // JavaScript function to handle the toggle and redirect (outside the loop)
                                    echo '<script>
                                            function toggleStatus(memberId, isChecked) {
                                                var status = isChecked ? 1 : 0;
                                                window.location.href = "GalleryStatus.php?id=" + memberId + "&status=" + status;
                                            }
                                          </script>';
                                    
                                          echo "<td><a href='UpdateGallery.php?updateid=$srno' class='btn btn-primary text-light'>Update</a></td>
                                  </tr>";
                                      }
                                
                               } else {
                                   echo "No Image found!";
                               }
                               ?>
                        </tbody>
                    </table>
                </div>
            </section>
			</div>
        </div>
    </div>

    
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
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


