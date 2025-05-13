<?php
// Assuming you have a database connection in connection.php
require 'connection.php';
//include('includes/student_inquiry.php');
//require 'inquiry.php';

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
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    
    <title>BBMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/review.css">
    <link rel="stylesheet" href="css/team.css">
    
      <!-- Include SweetAlert2 library -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <style>
.categories .card {
    transition: transform 0.3s;
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.categories .card:hover {
    transform: translateY(-5px);
}

.categories .card-img-top {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.categories .card-body {
    padding: 1.25rem;
}

.categories .btn-primary {
    margin-top: 10px;
}
</style>


</head>

<body>
    <?php include('navbar.php');?>

    <!-- Main-Slider -->
    <div class="main-slider" style="margin-top:68px">
        <div class="scrolling-text">
            <marquee>A Leading Professional Training Institute  in Pune Since 2011. Located in KOTHRUD | TILAK
                ROAD
                | KATRAJ | NARHE. Book a Free Demo Now : 9309907928 | 9403090958 | 9422301684     visit our office for free Internship for BBA BCA  BCS   BCom  MCA   MCS   MBA Engineering, Diploma  Internship available in Technical web development and digital marketing, Internship available in non technical in HR,   Admin, Event Management, Marketing, Business Development Data analyst,app developer
                Mass Communication   Internship for BBA IB    </marquee>
                </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/index11.jpeg" class="d-block w-100" style="height: 400px;" data-bs-interval="10000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index2.jpg" class="d-block w-100" style="height: 400px;" data-bs-interval="10000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index3.jpeg" class="d-block w-100" style="height: 400px;" data-bs-interval="10000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index4.jpeg" class="d-block w-100" style="height: 400px;" data-bs-interval="10000"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index1.jpg" class="d-block w-100" style="height: 400px;" data-bs-interval="10000"
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
                    <div class="icon"><i class="fas fa-graduation-cap"></i></div>
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
                <!--<h1 class="m-5"><span class="letter">O</span>ur <span class="letter">T</span>eam</h1>-->
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

    <!-- Course Section

    <section class="courses">
        <div class="container">
            <h1 class="text-center mb-5"><span class="letter">O</span>ur <span class="letter">C</span>ourses</h1>

            <div class="row">-->
<!--
         <?php
           $sql = "SELECT t_name, t_image FROM course WHERE status=1";
            $result = mysqli_query($con, $sql);

            // Check if the query was successful
            if ($result) {
                // Fetch data and display course cards
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-3 col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="admin/image/' . $row['t_image'] . '" class="card-img-top" alt="Course Image" style="height: 180px;">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title">' . $row['t_name'] . '</h5>';
                    echo '<a href="'. $row['t_name'] . '.php" class="btn btn-primary btn-learn-more">Learn More</a>';
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
    </section>-->

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h1 class="text-center mb-5"><span class="letter">O</span>ur <span class="letter">C</span>ategories</h1>

            <div class="row">
                <?php
                // Modified query to only show active categories and active members
                $sql = "SELECT c.id, c.category_name, c.category_code, c.image 
                        FROM categories c 
                        WHERE c.status = 1";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Get a random active board member from this category
                        $cat_id = $row['id'];
                        $member_sql = "SELECT member_name, business_name, contact_number, photo 
                                     FROM board_members 
                                     WHERE category_id = $cat_id 
                                     AND status = 1 
                                     ORDER BY RAND() LIMIT 1";
                        $member_result = mysqli_query($con, $member_sql);
                        $member = mysqli_fetch_assoc($member_result);
                        
                        // Only display if there's an active member
                        if ($member) {
                            echo '<div class="col-lg-3 col-md-6 mb-4">';
                            echo '<div class="card h-100">';
                            if ($member['photo']) {
                                echo '<img src="admin/image/' . $member['photo'] . '" class="card-img-top" alt="Member Image" style="height: 200px; object-fit: cover;">';
                            } else {
                                echo '<img src="admin/' . $row['image'] . '" class="card-img-top" alt="Category Image" style="height: 200px; object-fit: cover;">';
                            }
                            echo '<div class="card-body text-center">';
                            echo '<h5 class="card-title">' . $row['category_name'] . '</h5>';
                            echo '<p class="card-text">' . $member['business_name'] . '</p>';
                            echo '<p class="card-text"><i class="fas fa-phone"></i> ' . $member['contact_number'] . '</p>';
                            echo '<a href="category_details.php?id=' . $row['id'] . '" class="btn btn-primary">View Members</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Event Section -->

    <div class="container event">
        <h1 class="slider-heading"><span class="letter">E</span>vents</h1>
        <div class="row">
            <div class="slider">
                <div class="list d-flex">
                    <div class="item">
                        <img src="image/index1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/index2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/index1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/index2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/index5.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/index1.jpg" alt="">
                    </div>
                    <!-- Add more items as needed -->
                </div>
                <div class="buttons d-flex justify-content-between">
                    <button class="btn btn-primary" id="prev">
                        < </button>
                            <button class="btn btn-primary" id="next">></button>
                </div>
                <ul class="dots list-inline text-center">
                    <li class="list-inline-item active"></li>
                    <!-- Add more dots as needed -->
                </ul>
                <div class="event-info text-center">
                    <p>Seminar on Business Development</p>
                    <p>Location: Tilak Road <br>Date: 6-01-2024</p>
                </div>
            </div>



            <div class="slider">
                <div class="list d-flex">
                    <div class="item">
                        <img src="image/g1.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g2.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g3.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g4.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g5.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g6.jpeg" alt="">
                    </div>
                    <!-- Add more items as needed -->
                </div>
                <div class="buttons d-flex justify-content-between">
                    <button class="btn btn-primary" id="prev">
                        <</button>
                            <button class="btn btn-primary" id="next">></button>
                </div>
                <ul class="dots list-inline text-center">
                    <li class="list-inline-item active"></li>
                    <!-- Add more dots as needed -->
                </ul>
                <div class="event-info text-center">
                    <p>Seminar on Business Development</p>
                    <p>Location: Tilak Road <br>Date: 6-01-2024</p>
                </div>
            </div>



            <div class="slider">
                <div class="list d-flex">
                    <div class="item">
                        <img src="image/index5.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g3.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g1.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/index2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/g1.jpeg" alt="">
                    </div>
                    <div class="item">
                        <img src="image/index1.jpg" alt="">
                    </div>
                    <!-- Add more items as needed -->
                </div>
                <div class="buttons d-flex justify-content-between">
                    <button class="btn btn-primary" id="prev">
                        < </button>
                            <button class="btn btn-primary" id="next">></button>
                </div>
                <ul class="dots list-inline text-center">
                    <li class="list-inline-item active"></li>
                    <!-- Add more dots as needed -->
                </ul>
                <div class="event-info text-center">
                    <p>Seminar on Business Development</p>
                    <p>Location: Tilak Road <br>Date: 6-01-2024</p>
                </div>
            </div>

        </div>
    </div>

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
                                                <p style="text-align: justify;font-size:13px;">' . $row['testimonialText'] . '</p>
                                                <img src="admin/' . $row['studentImage'] . '" alt="Student Image" class="student-image" width="50px" height="50px" style="border-radius: 50%;">                                                <div class="testimonials-avatar">
                                                <h3>' . $row['studentName'] . '</h3>
                                                <h4>' . $row['courseName'] . '</h4>
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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.490470047431!2d73.84911497376048!3d18.506725169599882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c072ce933361%3A0x97d19cdc885294b2!2sLTOR%20Academy!5e0!3m2!1sen!2sin!4v1704736272792!5m2!1sen!2sin"
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

                        <button type="submit" name="contact" class="btn btn-primary">Send Message</button>
                    </form>

                </div>
            </div>

            <div class="additional-info">
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-map-marker-alt"></i></h3>
                                
                                    <p><a href="https://www.google.com/maps/search/?api=1&query=2nd+Floor,+Madhav+Heritage,+Lokmanya+Bal+Gangadhar+Tilak+Rd,Sadashiv+Peth,+Pune,+Maharashtra+411030" target="_blank" style=" text-decoration:none;">2nd Floor, Madhav Heritage, Lokmanya Bal Gangadhar Tilak Rd, Sadashiv Peth, Pune, Maharashtra 411030</a></p>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-envelope"></i></h3>
                               <a href=mailto:“ltorpune@gmail.com” style=" text-decoration:none;">ltorpune@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-phone"></i></h3>
                               
                                <p><a href="tel:+919403090958" style=" text-decoration:none;">+91 - 9403090958</a> <br>
                                <a href="tel:+919309907928" style=" text-decoration:none;">+91 - 9309907928</a><br>
                                <a href="tel:+919038546718" style=" text-decoration:none;">+91 - 9422301684</a>
                               </p>


                            </div>
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

    <!-- Matrix Section (Previously Courses) -->
    <?php
    // Check if user is logged in as a board member
    if(isset($_SESSION['board_member_id'])) { ?>
    <section class="matrices">
        <div class="container">
            <h1 class="text-center mb-5"><span class="letter">M</span>y <span class="letter">M</span>atrix</h1>

            <div class="row">
                <?php
                // Only fetch matrices where the board member belongs to
                $member_id = $_SESSION['board_member_id'];
                $sql = "SELECT m.* FROM matrices m 
                        INNER JOIN board_members bm ON m.id = bm.matrix_id 
                        WHERE bm.id = ? AND m.status = 1";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $member_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 col-md-6 mb-4">';
                        echo '<div class="card">';
                        echo '<img src="admin/image/' . $row['matrix_image'] . '" class="card-img-top" alt="Matrix Image" style="height: 180px;">';
                        echo '<div class="card-body text-center">';
                        echo '<h5 class="card-title">' . $row['matrix_name'] . '</h5>';
                        echo '<p class="card-text">Area: ' . $row['matrix_area'] . '</p>';
                        echo '<a href="matrix_details.php?id=' . $row['id'] . '" class="btn btn-primary">View Details</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-12 text-center">';
                    echo '<p>No matrices found.</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- Continue with other sections -->
</body>

</html>