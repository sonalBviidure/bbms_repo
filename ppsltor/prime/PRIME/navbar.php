
<?php
// Include your database connection file or establish a connection here
include 'connection.php';

// Fetch course names from the database
$query = "SELECT t_name FROM course";
$result = mysqli_query($con, $query);

// Check if there are any courses fetched
if (mysqli_num_rows($result) > 0) {
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $courses = []; // Empty array if no courses found
}

// Close the database connection if not needed further

?>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<style>
body {
    font-family: 'Cambria';
    padding: -10px;
}

.navbar-nav .nav-link,
.user-account {
    font-size: 18px;
    color: #02236d;
    font-weight: bold;
    transition: color 0.3s;
    text-decoration: none;
    padding: -18px;
}

.navbar-nav .nav-link:hover,
.user-account:hover {
    text-decoration: none;
    color: #00b9fe;
    /* Change to your desired hover color */
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    text-decoration: none;
    z-index: 1;
}

.dropdown-menu a {
    width: 220px;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #02236d;
    text-decoration: none;
}

.dropdown-menu a:hover {    
    color: #00b9fe;
    text-decoration: none;
    background-color: white;
}
.logo-img{
    height: 70px;
    width: 85px;
    margin-top: -10px;
    margin-right: -5px;
}
.log-img{
    height: 45px;
    width: 125px;
}
.nav-link{
    color: #00b9fe;
}
</style>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-2 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="default.php">
                <img src="./PRIME LOGO.jpg" alt="Education Logo" class="logo-img " >
                <img src="./textlogo.jpg" alt="Education Logo" class="log-img" >
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="default.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</a>
                            <div class="dropdown-menu" aria-labelledby="coursesDropdown">
                                <?php foreach ($courses as $course) : ?>
                                    <a class="dropdown-item course-item" href="subcourse.php?t_name=<?php echo urlencode($course['t_name']); ?>"><?php echo $course['t_name']; ?></a>
                                <?php endforeach; ?>
                            </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="discount.php">Up To 50<sup>%</sup> Scholarship</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="businessDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Business Activities</a>
                        <div class="dropdown-menu" aria-labelledby="businessDropdown">
                            <a class="dropdown-item" href="Training.php">Training</a>
                            <a class="dropdown-item" href="Placement.php">Placement</a>
                            <a class="dropdown-item" href="Marketing.php">Marketing</a>
                            <a class="dropdown-item" href="BusinessMeetUp.php">Business Meet-up</a>
                            <a class="dropdown-item" href="Exhibition.php">Exhibition</a>
                            <a class="dropdown-item" href="Seminars.php">Seminars</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="franchiseDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Franchise</a>
                        <div class="dropdown-menu" aria-labelledby="franchiseDropdown">
                            <a class="dropdown-item" href="Inquiry.php">Inquiry For Franchise</a>
                            <a class="dropdown-item" href="OurFranchise.php">Our Franchise</a>
                            <a class="dropdown-item" href="CriteriaFranchise.php">Criteria for Franchise</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Events.php">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="default.php#about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="Career.php">Career</a></li>
                    <li class="nav-item"><a class="nav-link" href="Internship.php">Internship</a></li>
                </ul>
            </div>
            <div class="user-account">
                <!-- You can include login/signup buttons or user account information here -->
                <a href="login.php" class="nav-link"  style="text-decoration:none;">Student Login</a>
            </div>
        </div>
    </nav>
    <!-- Add this script at the end of your HTML, after including Bootstrap and jQuery -->
<script>
    $(document).ready(function() {
        // Get the current page filename
        var current_page = location.pathname.split('/').pop();

        $('.course-item').on('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Get the course name from the clicked item
            var courseName = $(this).text().trim();
            // Encode course name to handle special characters in URL
            var encodedCourseName = encodeURIComponent(courseName);
            
            // Redirect to subcourse.php with the selected course name as parameter
            window.location.href = 'subcourse.php?t_name=' + encodedCourseName;
        });

        // Remove 'active' class from all nav items
        $('.navbar-nav .nav-item').removeClass('active');

        // Add 'active' class to the nav item corresponding to the current page
        $('.navbar-nav .nav-item').each(function() {
            var link = $(this).find('.nav-link').attr('href');
            if (link === current_page) {
                $(this).addClass('active');
            }
        });
    });
</script>

</header>
<br>

