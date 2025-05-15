<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<style>
body {
    font-family: 'Cambria';
}

.navbar-nav .nav-link,
.user-account {
    font-size: 16px;
    color: #02236d;
    font-weight: bold;
    transition: color 0.3s;
    text-decoration: none;
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
</style>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-2 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="image/icon.jpeg" alt="Education Logo" class="img-fluid logo-img w-100 h-100"
                    style="max-width: 150px; max-height: 40px;">
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
                            <a class="dropdown-item" href="Spoken English.php">Spoken English</a>
                            <a class="dropdown-item" href="Confidence Building.php">Confidence Building</a>
                            <a class="dropdown-item" href="Public Speaking.php">Public Speaking</a>
                            <a class="dropdown-item" href="Success Key.php">Success Key</a>
                            <a class="dropdown-item" href="Leadership Quality.php">Leadership Quality</a>
                            <a class="dropdown-item" href="LR Brain.php">L & R Brain</a>
                            <a class="dropdown-item" href="Study Skills.php">Study Skills</a>
                            <a class="dropdown-item" href="Discipline.php">Discipline</a>
                            <a class="dropdown-item" href="Good Relationship.php">Good Relationship</a>
                            <a class="dropdown-item" href="Personality Development.php">Personality Development</a>
                            <a class="dropdown-item" href="Time Management.php">Time Management</a>
                            <!-- Add other course links here -->
                        </div>
                    </li>
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
                <a href="login.php" class="nav-link"  style="text-decoration:none;">Login</a>
            </div>
        </div>
    </nav>
</header>

