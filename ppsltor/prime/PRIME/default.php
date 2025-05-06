<?php
// Assuming you have a database connection in connection.php

include('Includes/connection.php');

// Perform SQL query to fetch data from the about_us table
$sql = "SELECT about_us_text, about_us_image FROM about_us";
$result = $con->query($sql);

if ($result) {
    // Fetch the first row of data
    $row = $result->fetch_assoc();

    // Check if there is data in the table
    if ($row) {
        $aboutUsText = $row['about_us_text'];
        $aboutUsImage = $row['about_us_image'];
    } 
}
if (isset($_POST['contact'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $subdistrict = $_POST["subdistrict"];
    $pincode = $_POST["zip"];
    $message = $_POST["message"];

    $sql = "INSERT INTO leads (l_name, l_email, l_phone, l_state, l_district, l_subdistrict, l_pincode, l_message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssss", $name, $email, $phone, $state, $district, $subdistrict, $pincode, $message);
        
        if ($stmt->execute()) {
            echo'  <script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                Swal.fire({
                    title: "Congratulations",
                    text: "Your information is submitted successfully....",
                    icon: "success"
                }).then((result) => {
                    // Redirect to inquiry.php after user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href = "default.php";
                    }
                });
            });
        </script>';
    } else {
            echo "<script>alert('Error submitting the form.');</script>";
        }

        $stmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    
    <title>PRIME COMPUTERS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/review.css">
    <link rel="stylesheet" href="css/team.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ytRSeGKo+DlCPWbojPHU9xSnZm1XKdLUzo6FbL9z0XcA3FOkQOYWeCm8HqPU3Gcx3pnEaey5yIBBd0CSXb0XeQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

       <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 


</head>

<body>
    <?php include('navbar.php');?>

    <!-- Main-Slider -->
    <div class="main-slider" style="margin-top:68px">
        <div class="scrolling-text">
            <marquee>A Leading Professional Training Institute in Pune Since 2005. Located in KOTHRUD | TILAK
                ROAD
                | KATRAJ | WARJE. Book a Free Demo Now : 9309907928 | 9403090958 | 9422301684  A Training Center for C programming ,C++ Programming, Java,python,Spring Boot ,JSP ,Django,Fullstack PHP  MYSQL  Website Development ,Angular HTML,CSS ,JavaScript,Bootstrap, MongoDB ,Digital Marketing ,Software Engineering Project Development with Free Internship for BCA  BCS  MCA  MCS   Engineering   Diploma  with all Computer Technologies Web Technologies  by Team of  Corporate Trainers </marquee>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/index11.jpeg" class="d-block w-100" style="height: 450px;" data-bs-interval="15000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index2.jpg" class="d-block w-100" style="height: 480px;" data-bs-interval="15000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index3.png" class="d-block w-100" style="height: 480px;" data-bs-interval="15000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index4.png" class="d-block w-100" style="height: 480px;" data-bs-interval="15000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/new.jpg" class="d-block w-100" style="height: 480px;" data-bs-interval="15000"
                        alt="...">
                </div>
            </div>

        </div>
    </div>

    <!-- Counter -->


    <!-- Counter Section -->
    <section class="counter-section">
        <div class="container">
            <div class="row">
                <!-- Successfully Completed -->
                <div class="col-lg-3 col-md-6 col-sm-12 counter-item mb-4">
                    <div class="icon"><i class="fas fa-trophy"></i></div>
                    <div class="counter">10 Years</div>
                    <div class="text">Successfully Completed</div>
                </div>

                <!-- Batches -->
                <div class="col-lg-3 col-md-6 col-sm-12 counter-item mb-4">
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <div class="counter" data-count="208">0</div>
                    <div class="text">Batches</div>
                </div>

                <!-- Career Nurtured -->
                <div class="col-lg-3 col-md-6 col-sm-12 counter-item mb-4">
                    <div class="icon"><i class="fas fa-briefcase"></i></div>
                    <div class="counter" data-count="400">0</div>
                    <div class="text">Career Nurtured</div>
                </div>

                <!-- Corporate Workshops -->
                <div class="col-lg-3 col-md-6 col-sm-12 counter-item mb-4">
                    <div class="icon"><i class="fas fa-building"></i></div>
                    <div class="counter" data-count="12">0</div>
                    <div class="text">Corporate Workshops</div>
                </div>
            </div>
        </div>
    </section>


    <!-- about us -->

    <section class="about-us" id="about-us">
        <div class="text-center">
            <h1 class="m-5"><span class="letter">A</span>bout <span class="letter">U</span>s</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="text">
                        <p style="text-align: justify;"><?php echo $aboutUsText; ?></p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="image">
                        <img src="admin/<?php echo $aboutUsImage; ?>" alt="About Us Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- My Team Section -->
    <section class="my-team">
        <div class="container">
            <div class="text-center">
                <h1 class="m-5"><span class="letter">O</span>ur <span class="letter">T</span>eam</h1>
            </div>
            <div class="row team-container">
                <!-- Team Member 1 -->
                <?php
                // Perform SQL query to fetch data from the database
                    $sql = "SELECT * FROM team_members WHERE status=1";
                    $result = $con->query($sql);

                    // Check if the query was successful
                    if ($result) {
                        // Fetch data and dynamically generate team members
                        while ($row = $result->fetch_assoc()) {
                            
                            echo '<div class="col-lg-3">';
                            echo '<div class="team-member">';
                            echo '<img src="admin/' . $row['member_image'] . '" alt="' . $row['member_name'] . '" class="img-fluid">';
                            echo '<div class="member-info">';
                            echo '<h3>' . $row['member_name'] . '</h3>';
                            echo '<p>' . $row['member_role'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            }
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Course Section -->

    <section class="courses">
        <div class="container">
            <h1 class="text-center mb-5"><span class="letter">O</span>ur <span class="letter">C</span>ourses</h1>

            <div class="row">

                <?php
           $sql = "SELECT t_name, t_image FROM course WHERE status=1";
            $result = mysqli_query($con, $sql);

            // Check if the query was successful
            if ($result) {
                // Fetch data and display course cards
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-3 col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="admin/' . $row['t_image'] . '" class="card-img-top" alt="Course Image" style="height: 180px;">';
                    echo '<div class="card-body text-center">';
                    echo'<br>';
                    echo '<h5 class="card-title">' . $row['t_name'] . '</h5>';
                    echo'<br>';
                    echo '<a href="subcourse.php?t_name=' . urlencode($row['t_name']) . '" class="btn btn-primary btn-learn-more">Learn More</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            ?>
            </div>
        </div>
    </section>

   <!-- upcoming Event Section -->
   <div class="container event">
        <div class="event-heading">
            <h1 class="slider-heading" style="text-align:center;"><span class="letter">F</span>REE <span class="letter">D</span>EMO <span class="letter">W</span>ORKSHOPS</h1>
        </div>
        <br>
        <br>
        <div class="row">
            <?php
            // Fetch event data from the database
            $sql = "SELECT * FROM upevents WHERE status='1'";
            $result = $con->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 mb-4">';
                    echo '<div class="card h-100">';
                    // Lightbox functionality added to the image
                    echo '<a href="admin/' . $row['upevent_image1'] . '" data-fancybox="event-gallery" data-caption="' . $row['upevent_title'] . '">';
                    echo '<div class="square-img-container">';
                    echo '<img src="admin/' . $row['upevent_image1'] . '" class="card-img-top square-img" alt="Event Image">';
                    echo '</div>';
                    echo '</a>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title"><i class="fas fa-graduation-cap icon-color marker-color" ></i>' . $row['upevent_title'] . '</h5>';
                    echo '<p class="card-text"><i class="fas fa-map-marker icon-color marker-color"></i> Location: ' . $row['upevent_location'] . '</p>';
                    echo '<p class="card-text"><i class="fas fa-calendar-alt icon-color"></i> Date: ' . $row['upevent_date'] . '</p>';
                    echo '<p class="card-link"><i class="fas fa-link icon-color marker-color"></i>Meeting Link: <a href="' . $row['upevent_meet'] . '" class="link" target="_blank">Click Here</a></p>';
                    echo '</div>'; // Close card-body div
                    echo '</div>'; // Close card div
                    echo '</div>'; // Close col div
                }
            } else {
                echo '<div class="col">';
                echo '<p class="text-center">No event data available</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

  <!-- Custom CSS -->
<!-- Custom CSS -->
<style>
  .card {
    height: 100% !important; /* Ensure all cards take up full height */
    display: flex;
    flex-direction: column;
    border-radius: 10px; /* Rounded corners for the card */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add box shadow for a 3D effect */
    font-family: 'Times New Roman', Times, serif;
    font-size: 25px;
  }

  .square-img-container {
    position: relative;
    overflow: hidden;
    padding-top: 100%; /* Create a square container based on percentage */
  }

  .square-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%; /* Ensure the image fills the square container */
    object-fit: cover; /* Maintain aspect ratio and cover the container */
  }

  .card-body {
    padding: 20px; /* Add padding for card content */
    flex-grow: 1; /* Allow card body to expand within the card */
  }

  .card-title {
    font-size: 25px; /* Increase title font size */
    margin-bottom: 10px; /* Add margin below title */
    font-weight: bold;
    color:goldenrod; 
    

  }

  .card-text {
    margin-bottom: 5px; /* Add margin below text content */
   
  }

  .icon-color {
    color: black; /* Default icon color */
    margin-right: 8px; /* Add spacing between icon and text */
  }

  .marker-color {
    color: #e74c3c; /* Red color for marker icon */
    font-size: 22px;
  }
</style>

  </div> <!-- Close row div -->
</div> <!-- Close container div -->

    
    <!-- Reviews Section -->

    <section id="review">
        <div class="container mt-5">
            <div class="section-title">
                <h1 class="mt-3"><span class="letter">T</span>estimonials</h1>
            </div>
        </div>
        <div class="testimonials-carousel-wrap">
            <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right"
                    style="color: #fff"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left"
                    style="color: #fff"></i></div>
            <div class="testimonials-carousel">
                <div class="swiper-container">
                    <?php
                    // Retrieve testimonial data from the database
                    $sql = "SELECT * FROM testimonials WHERE status =1";
                    $result = $con->query($sql);

                    // Check if there are testimonials in the database
                    if ($result->num_rows > 0) {
                        echo '<div class="swiper-wrapper">';
                        
                        // Loop through each testimonial
                        while ($row = $result->fetch_assoc()) 
                        {
                            echo '<div class="swiper-slide">
                                        <div class="testi-item">
                                            <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                            <div class="testimonials-text">
                                                <p style="text-align: justify;font-size:20px;">' . $row['testimonialText'] . '</p>
                                              <center>  <img src="admin/' . $row['studentImage'] . '" alt="Student Image" class="student-image" width="60px" height="60px" style="border-radius: 50%;">     </cennter>                                           <div class="testimonials-avatar">
                                                <h3 style="text-align:center; font-size:20px;">' . $row['studentName'] . '</h3>
                                                <h4 style="font-size:18px;">' . $row['courseName'] . '</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                        }
                        echo '</div>';
                    } else {
                        echo "No testimonials found!";
                    }

                    
                    ?>
                </div>
            </div>

            <div class="tc-pagination"></div>
        </div>
    </section>
    <style>
          
          .testimonials-carousel .swiper-wrapper {
   display: flex;
   align-items: stretch; /* Align items vertically */
}

.swiper-slide {
   display: flex;
   flex: 1 0 auto; /* Flex grow, flex shrink, and flex basis */
   height: auto; /* Adjust height automatically */
   box-sizing: border-box; /* Include padding and border in the element's total width and height */
}

.testi-item {
   display: flex;
   flex-direction: column; /* Stack children vertically */
   justify-content: space-between; /* Distribute space between items */
   height: 100%; /* Fill the parent height */
}

.testimonials-text {
   display: flex;
   flex-direction: column; /* Stack children vertically */
   justify-content: space-between; /* Distribute space between items */
   
   padding: 20px; /* Adjust padding as necessary */
}
       </style>

    <!-- Contact Section -->

    <section class="contact-us">
        <div class="container">
            <h1><span class="letter">C</span>ontact <span class="letter">U</span>s</h1>
            <p>Feel free to reach out to us for any inquiries or assistance.</p>

            <div class="contact-grid row">
                <!-- Location on the left side -->
                <div class="location col-md-6">
                    <div class="google-map">
                        <iframe width="100%" height="430" frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d476.9662170573857!2d73.84810304454992!3d18.509031103383844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c073767f8aa7%3A0xe3e6073f4930a151!2sprime%20infotech%20solutions!5e0!3m2!1sen!2sin!4v1711514516078!5m2!1sen!2sin"
                             allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Contact form on the right side -->
                <div class="contact-form col-md-6">
                    <form  method="post">
                        <input type="text" class="form-control mb-1" placeholder="Name" name="name" required>

                        <div class="row">
                            <div class="col-md-6 ">
                                <!-- Email input -->
                                <div class=" mb-3">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <!-- Phone number input -->
                                <div class=" mb-3">
                                    <input type="tel" class="form-control " placeholder="Phone Number" name="phone"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- New fields for state, district, subdistrict, and pincode -->
                        <div class="row">
                            <div class="col-md-6   mb-3">
                                <select class="form-select form-control p-2" id="state" name="state"
                                    onchange="loadDistricts()" required>
                                    <option value="">Select State</option>
                                    <option value="AndraPradesh">Andhra Pradesh</option>
                                    <option value="ArunachalPradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="HimachalPradesh">HimachalPradesh</option>
                                    <option value="JammuKashmir">JammuKashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="MadhyaPradesh">MadhyaPradesh</option>
                                    <option value="Sehore">Sehore</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="TamilNadu">TamilNadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="UttarPradesh">UttarPradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="WestBengal">WestBengal</option>
                                    <option value="AndamanNicobar">AndamanNicobar</option>
                                    <option value="DamanDiu">DamanDiu</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>

                                </select>
                            </div>
                            <div class="col-md-6  mb-3">
                                <select id="district" name="district" class="form-control p-2"
                                    onchange="loadSubDistricts()">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <select id="subdistrict" name="subdistrict" class="form-control p-2">
                                        <option value="">Select Sub District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Pin Code"
                                        required>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" placeholder="Message" name="message" rows="2"
                            required></textarea>
                            <div class="row">
                            <div class="col-md-12 mb-6">
                                <div class="form-group">
                       <center> <button type="submit" name="contact" class="btn btn-primary">Send Message</button></center>
                        </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="additional-info">
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-map-marker-alt"></i></h3>
                                
                                    <p><a href="https://www.google.com/maps/place/prime+infotech+solutions/@18.5090311,73.848103,19.99z/data=!4m10!1m2!2m1!1sprime+infotech+solution+katraj!3m6!1s0x3bc2c073767f8aa7:0xe3e6073f4930a151!8m2!3d18.5088579!4d73.8489096!15sCh5wcmltZSBpbmZvdGVjaCBzb2x1dGlvbiBrYXRyYWqSARtzb2Z0d2FyZV90cmFpbmluZ19pbnN0aXR1dGXgAQA!16s%2Fg%2F11cn0tz33f?entry=ttu">Flat no 203, Madhav heritage, Lokmanya Bal Gangadhar Tilak Rd, Ramashram Society, Perugate, Sadashiv Peth, Pune, Maharashtra 411030 </a>
                                    
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-envelope" style="color: #FFD43B;"></i></h3>
                               <a href=mailto:“ltorpune@gmail.com”>Primestudystart@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-phone-alt" style="color: #63E6BE;"></i></h3>
                               
                                <p><a href="tel:+919403090958">+91 - 9403090958</a> <br>
                                <a href="tel:+919309907928">+91 - 9309907928</a><br>
                                <a href="tel:+919422301684">+91 - 9422301684</a>
                               </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="info-item">
                            <div class="item-intern">
                                <h3><i class="fas fa-map-marker-alt"></i></h3>
                                <style>
                                   .item-intern h3 i {
                                     color: #ff0000; /* Red color */
                                     font-size: larger;
                                     line-height: -10em;
                                    }
                                    .item-intern p a {
                                          color: #007bff; /* Blue color */
                                            text-decoration: none; /* Remove underline */
                                            font-size: 20px;
                                            line-height: -10em;
                                        }   
                                              </style>
                                <p><a href="https://www.google.com/maps/dir//Atul+Nagar,+Warje,+Pune,+Maharashtra/@18.4889455,73.7759092,15z/data=!4m18!1m8!3m7!1s0x3bc2be2e2b00adb9:0xb001671834fe4bc0!2sAtul+Nagar,+Warje,+Pune,+Maharashtra!3b1!8m2!3d18.4875428!4d73.7845569!16s%2Fg%2F12hmfs31z!4m8!1m0!1m5!1m1!1s0x3bc2be2e2b00adb9:0xb001671834fe4bc0!2m2!1d73.7845569!2d18.4875428!3e9?entry=ttu" target="_blank"><u>Warje</u></a></p>
                                <p>Atul Nagar,Warje Malwadi, Pune, <br>Maharashtra 411058</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="info-item">
                            <div class="item-intern">
                                <h3><i class="fas fa-map-marker-alt"></i></h3>
                                
                                <p><a href="https://www.google.com/maps/place/Prime+Infotech+Solutions/@18.5086774,73.8085483,17z/data=!3m1!4b1!4m6!3m5!1s0x3bc2bfa38c3d9713:0x829cbebeaa466baa!8m2!3d18.5086723!4d73.8111232!16s%2Fg%2F11l1n19jwz?entry=ttu" target="_blank"><u>Kothrud </u></a></p>
                                <p>near jai bhavani bus stop, Gururaj Society, Kothrud, Pune, Maharashtra 411038</p>
                                
                                    
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="info-item">
                            <div class="item-intern">
                                <h3><i class="fas fa-map-marker-alt"></i></h3>
                                
                                <p><a href="https://www.google.com/maps/place/Icchapurti+Shri+Ganesh+-+Datta.trimuri+chowk+Mandir/@18.4557494,73.8413644,16z/data=!4m10!1m2!2m1!1s+Near+Ichapurti+Ganapati,+Backside+of+Bharati+Vidyapeeth,+Katraj+,+Pune,+Maharashtra!3m6!1s0x3bc2eb949d8a310b:0x9b16bd30eed1ea4!8m2!3d18.4557825!4d73.8508862!15sClNOZWFyIEljaGFwdXJ0aSBHYW5hcGF0aSwgQmFja3NpZGUgb2YgQmhhcmF0aSBWaWR5YXBlZXRoLCBLYXRyYWogLCBQdW5lLCBNYWhhcmFzaHRyYZIBDGhpbmR1X3RlbXBsZeABAA!16s%2Fg%2F11hzzq6hhb?entry=ttu" target="_blank"><u>Katraj</u></a></p>
                                <p>Near Ichapurti Ganapati, Backside of Bharati Vidyapeeth, Katraj, Pune, Maharashtra</p>  
                            </div>
                        </div>
                    </div>
                 
</div>


    </section>

    <!-- Footer -->
    <?php include('footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="js/review.js"></script>
    <script src="js/dist.js"></script>
    <script src="js/event.js"></script>
</body>

</html>