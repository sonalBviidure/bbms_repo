<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<style>
body {
    font-family: 'Cambria';
}

/* .navbar-nav .nav-link,
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
} */



        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-color);
            transition: color 0.3s ease;
            padding: 10px 15px !important;
            margin: 0 5px;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .nav-link.active {
            color: var(--primary-color);
            font-weight: 600;
        }

        .navbar-nav .nav-item {
  margin-right: 0.5rem; /* Default is often 1rem+ */
}
</style>
<header>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-white p-2 fixed-top">
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
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Matrices</a>
                        <div class="dropdown-menu" aria-labelledby="franchiseDropdown">
                            <a class="dropdown-item" href="Inquiry.php">Inquiry For Matrix</a>
                            <a class="dropdown-item" href="OurFranchise.php">Our Matrix</a>
                            <a class="dropdown-item" href="CriteriaFranchise.php">Criteria for Matrix</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Events.php">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="default.php#about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="Career.php">Career</a></li>
                    <li class="nav-item"><a class="nav-link" href="Internship.php">Internship</a></li>
                </ul>
            </div>
            <div class="user-account">
            
                <a href="login.php" class="nav-link"  style="text-decoration:none;">Login</a>
            </div>
        </div>
    </nav> -->


    <nav class="navbar navbar-expand-lg fixed-top shadow-sm" style="background: linear-gradient(to right, #1abc9c, #3498db); padding: 6px 0;">
<div class="container-fluid px-4">
    <!-- LOGO -->
    <a class="navbar-brand text-white fw-bold fs-5" href="#">
    <i class="fas fa-network-wired me-2"></i>BBM Solution
    </a>

    <!-- Toggler for mobile -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon bg-white rounded"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Spacer after logo -->
      <div class="me-5"></div>

      <!-- NAVIGATION LINKS -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 small fw-normal" style="font-size: 0.85rem;">
        <li class="nav-item"><a class="nav-link text-white" style="font-size: 1.1rem;" href="#home"><i class="fas fa-home me-1"></i>Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" style="font-size: 1.1rem;" href="#about_us"><i class="fas fa-info-circle me-1" style="font-size: 1.1rem;"></i>About</a></li>
      <li class="nav-item"> <a class="nav-link text-white"style="font-size: 1.1rem;" href="events.html"><i class="fas fa-calendar-alt me-1" style="font-size: 1.1rem;"></i>Events</a></li>

        <li class="nav-item"><a class="nav-link text-white" style="font-size: 1.1rem;" href="#gallery"><i class="fas fa-images me-1" style="font-size: 1.1rem;"></i>Gallery</a></li>
        <li class="nav-item"><a class="nav-link text-white" style="font-size: 1.1rem;" href="#contact_us"><i class="fas fa-envelope me-1" style="font-size: 1.1rem;"></i>Contact</a></li>
        <li class="nav-item"><a class="nav-link text-white" style="font-size: 1.1rem;" href="#matrices"><i class="fas fa-th-large me-1" style="font-size: 1.1rem;"></i>Matrix</a></li>
    </ul>

      <!-- LOGIN/REGISTER BUTTONS -->
      <div class="ms-auto">
        <a href="login.php" class="btn btn-outline-light btn-sm me-2 px-3 py-1">
          <i class="fas fa-sign-in-alt me-1"></i>Login
        </a>
        <a href="register.php" class="btn btn-light btn-sm text-primary fw-semibold px-3 py-1">
          <i class="fas fa-user-plus me-1"></i>Register
        </a>
      </div>
    </div>
  </div>
</nav>
</header>

