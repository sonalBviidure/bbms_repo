

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>View Leads
		</title>
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
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
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
        <div class="container">
              <h2 class="text-center" >View Franchise Inquiry</h2>
              <table class="table table-striped table-bordered mt-10" id="myTable">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">District</th>
            <th scope="col">Subdistrict</th>
            <th scope="col">Taluka</th>
            <th scope="col">Pincode</th>
            <th scope="col">Inquiry Subject</th>
            <th scope="col">Received At</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'connection.php';
        $sql="select * from inquiry";
        $result=mysqli_query($con,$sql);
        if($result)
        {
           while( $row=mysqli_fetch_assoc($result))
           {
            $t_id = $row['t_id'];
            $t_name = $row['t_name'];
            $t_countrycode = $row['t_countrycode'];
            $t_contact = $row['t_contact'];
            $t_email = $row['t_email'];
            $t_country = $row['t_country'];
            $t_state = $row['t_state'];
            $t_district = $row['t_district'];
            $t_subdistrict = $row['t_subdistrict'];
            $t_taluka = $row['t_taluka'];
            $t_pincode = $row['t_pincode'];
            $t_inquirysubject = $row['t_inquirysubject'];
            $timestamp=$row['timestamp_column'];

            echo '<tr>
            <td>'.$t_id.'</td>
            <td>'.$t_name.'</td>
            <td>'.$row['t_countrycode'].''.$row['t_contact'].'</td>
            <td>'.$t_email.'</td>
            <td>'.$t_country.'</td>
            <td>'.$t_state.'</td>
            <td>'.$t_district.'</td>
            <td>'.$t_subdistrict.'</td>
            <td>'.$t_taluka.'</td>
            <td>'.$t_pincode.'</td>
            <td>'.$t_inquirysubject.'</td>
            <td>'.$timestamp.'</td>
            </tr>'; 
           }

        }
        ?>
    </tbody>
</table>

      </div>

			
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


