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

    $sql = "INSERT INTO leads (l_name, l_email, l_phone, l_state, l_district, l_subdistrict, l_pincode, l_message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssss", $name, $email, $phone, $state, $district, $subdistrict, $pincode, $message);

        if ($stmt->execute()) {
            echo '  <script>
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    <?php include('navbar.php'); ?>

    <!-- Main-Slider -->
    <div class="main-slider" style="margin-top: 70px;">
        <!-- <div class="scrolling-text">
            <marquee>Empowering Business Networking Across Maharashtra | Join Matrix Groups in Pune, Kothrud, Tilak Road, Katraj & Narhe | Explore Business Opportunities, Share Referrals & Attend Weekly Meetings | Vacancies & Business Posts Updated Live | Contact Matrix Admins for More Info | Internship & Collaboration Opportunities for Students & Startups Available Now!</marquee>
        </div> -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/index_1.jpg" class="d-block w-100" style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index_222.jpg" class="d-block w-100" style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/index_3.jpg" class="d-block w-100" style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/new_slider.jpg" class="d-block w-100" style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="image/new_slider_2.jpg" class="d-block w-100" style="height: 400px;" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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



                <!-- Matrices Counter -->
                <div class="col-lg-3 col-md-6 col-sm-12 counter-item mb-4">
                    <div class="icon"><i class="fas fa-graduation-cap"></i></div>
                    <?php
                    $matrix_sql = "SELECT COUNT(*) as matrix_count FROM matrices WHERE status = 1";
                    $matrix_result = $con->query($matrix_sql);
                    $matrix_count = ($matrix_result && $matrix_result->num_rows > 0) ? $matrix_result->fetch_assoc()['matrix_count'] : 0;
                    ?>
                    <div class="counter" data-count="<?php echo $matrix_count; ?>"><?php echo $matrix_count; ?></div>
                    <div class="text">Matrices</div>
                </div>
                <!-- Categories Counter -->
                <div class="col-lg-3 col-md-6 col-sm-12 counter-item mb-4">
                    <div class="icon"><i class="fas fa-briefcase"></i></div>
                    <?php
                    $categories_sql = "SELECT COUNT(*) as category_count FROM categories WHERE status = 1";
                    $categories_result = $con->query($categories_sql);
                    $category_count = ($categories_result && $categories_result->num_rows > 0) ? $categories_result->fetch_assoc()['category_count'] : 0;
                    ?>
                    <div class="counter" data-count="<?php echo $category_count; ?>"><?php echo $category_count; ?>
                    </div>
                    <div class="text">Categories</div>
                </div>

                <!-- Events Counter -->
                <div class="col-lg-3 col-md-6 col-sm-12 counter-item mb-4">
                    <div class="icon"><i class="fas fa-building"></i></div>
                    <?php
                    $events_sql = "SELECT COUNT(*) as event_count FROM events WHERE status = 1";
                    $events_result = $con->query($events_sql);
                    $event_count = ($events_result && $events_result->num_rows > 0) ? $events_result->fetch_assoc()['event_count'] : 0;
                    ?>
                    <div class="counter" data-count="<?php echo $event_count; ?>"><?php echo $event_count; ?></div>
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
                 echo '<a href="' . $row['t_name'] . '.php" class="btn btn-primary btn-learn-more">Learn More</a>';
                 echo '</div>';
                 echo '</div>';
                 echo '</div>';
             }
         } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($con);
         }
         ?>
            </div>
        </div>
    </section>-->

    <!-- Categories Section -->


    <!-- Event Section -->
    <section class="event">
        <div class="container">
            <h1 class="text-center mb-5"><span class="letter">E</span>vents</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="image/index1.jpg" class="card-img-top" alt="Event 1"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Business Development Seminar</h5>
                            <p class="card-text">
                                <i class="fas fa-map-marker-alt"></i> Location: Tilak Road<br>
                                <i class="far fa-calendar-alt"></i> Date: 6-01-2024
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="image/g1.jpeg" class="card-img-top" alt="Event 2"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Networking Workshop</h5>
                            <p class="card-text">
                                <i class="fas fa-map-marker-alt"></i> Location: Kothrud<br>
                                <i class="far fa-calendar-alt"></i> Date: 13-01-2024
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="image/g2.jpeg" class="card-img-top" alt="Event 3"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Business Meet</h5>
                            <p class="card-text">
                                <i class="fas fa-map-marker-alt"></i> Location: Narhe<br>
                                <i class="far fa-calendar-alt"></i> Date: 20-01-2024
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Reviews Section -->

    <section id="review">
        <div class="container mt-5">
            <div class="section-title">
                <h1 class="mt-3"><span class="letter">T</span>estimonials</h1>
            </div>
        </div>
        <div class="testimonials-carousel-wrap">
            <div class="listing-carousel-button listing-carousel-button-next">
                <i class="fa fa-caret-right" style="color: #fff"></i>
            </div>
            <div class="listing-carousel-button listing-carousel-button-prev">
                <i class="fa fa-caret-left" style="color: #fff"></i>
            </div>
            <div class="testimonials-carousel">
                <div class="swiper-container">
                    <?php
                    // Retrieve testimonial data from the database using your existing table structure
                    $sql = "SELECT * FROM testimonials WHERE status = 1";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="swiper-wrapper">';
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="swiper-slide">
                                    <div class="testi-item">
                                        <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                        <div class="testimonials-text">
                                            <p style="text-align: justify;font-size:13px;">' . $row['testimonialText'] . '</p>
                                            <div class="testimonials-avatar">
                                                <h3>' . $row['studentName'] . '</h3>
                                                <h4>' . $row['courseName'] . '</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                        echo '</div>';
                    } else {
                        echo "<p class='text-center'>No testimonials found!</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="tc-pagination"></div>
        </div>
    </section>

    <!--                                             <img src="admin/' . $row['studentImage'] . '" alt="Student Image" class="student-image" width="50px" height="50px" style="border-radius: 50%;">
 -->
    <!-- Contact Section -->
    <!-- 
    <section class="contact-us">
        <div class="container">
            <h1><span class="letter">C</span>ontact <span class="letter">U</span>s</h1>
            <p>Feel free to reach out to us for any inquiries or assistance.</p>

           

            <div class="additional-info">
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-map-marker-alt"></i></h3>
                                
                                    <p><a href="https://maps.app.goo.gl/onYvfUEbz9LKGk8z9" target="_blank" style=" text-decoration:none;">Peakprosys Solutions, Sagar Arcade, Fergusson College Rd, opposite to Westside mall, Deccan Gymkhana, Pune, Maharashtra 411005</a></p>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="info-item">
                            <div class="item-body">
                                <h3><i class="fas fa-envelope"></i></h3>
                               <a href=mailto:“hr@peakprosys.com” style=" text-decoration:none;">hr@peakprosys.com</a>
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
    </section> -->

    <!-- Matrix Section -->
    <?php
    if (isset($_SESSION['board_member_id'])) { ?>
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

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="js/review.js"></script>
    <script src="js/dist.js"></script>
    <script src="js/event.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carousel = new bootstrap.Carousel(document.getElementById('carouselExampleControls'), {
                interval: 1000,
                wrap: true,
                keyboard: false,
                touch: true
            });
            carousel.cycle();

            // About section scroll
            if (window.location.hash === '#about-us') {
                setTimeout(function () {
                    const aboutSection = document.getElementById('about-us');
                    if (aboutSection) {
                        aboutSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        window.scrollBy(0, -80);
                    }
                }, 100);
            }
        });
    </script>
</body>

</html>
<style>
    .slider {
        position: relative;
        overflow: hidden;
        margin: 20px auto;
    }

    .slider .list {
        position: relative;
        left: 0;
        transition: left 0.5s ease-in-out;
    }

    .slider .item {
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 15px;
    }

    .slider .item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
    }

    .slider .buttons {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        padding: 0 20px;
    }

    .slider .dots {
        margin-top: 20px;
    }

    .slider .dots li {
        width: 10px;
        height: 10px;
        background: #ccc;
        border-radius: 50%;
        cursor: pointer;
        margin: 0 5px;
    }

    .slider .dots li.active {
        background: #007bff;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = new bootstrap.Carousel(document.getElementById('carouselExampleControls'), {
            interval: 1000,
            wrap: true,
            keyboard: false,
            touch: true
        });

        // Start auto-sliding
        carousel.cycle();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Check if URL has #about-us hash
        if (window.location.hash === '#about-us') {
            setTimeout(function () {
                const aboutSection = document.getElementById('about-us');
                if (aboutSection) {
                    aboutSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Adjust for fixed navbar
                    window.scrollBy(0, -80);
                }
            }, 100);
        }
    });
</script>
</body>