<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship & Placement Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 15px;
            color: #fff;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            padding-left: 15px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #94b7da;
            color: #343a40;
        }

        .dropdown-menu .dropdown-item {
            padding: 10px 20px;
            font-size: 14px;
            color: #343a40;
            background-color: #94b7da;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #6c757d;
        }

        .container-fluid {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar">
        <h2>Dashboard</h2>

        <?php
        // Simulated dynamic menu items
        $menuItems = array(
            array("name" => "Centers", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Centers", "url" => "#"),
                array("name" => "View Center", "url" => "centers.html")
            )),
            array("name" => "Trainers", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Trainers", "url" => "#"),
                array("name" => "View Trainers", "url" => "trainers.html")
            )),
            array("name" => "Employee", "url" => "#", "dropdownItems" => array(
                array( "name" => "Management team", "url" => "#"),
                array("name" => "Technical Team", "url" => "#"),
                array("name" => " Support Team", "url" => "#")
            )),
            array("name" => "Recruiter", "url" => "#", "dropdownItems" => array(
                array("name" => "add job", "url" => "#"),
                array("name" => "View job", "url" => "#")
            )),
            array("name" => "Student", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Student", "url" => "#"),
                array("name" => "View Student", "url" => "#")
            )),
            array("name" => "Courses", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Courses", "url" => "#"),
                array("name" => "View Courses", "url" => "#")
            )),
            array("name" => "Gallery", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Images", "url" => "#"),
                array("name" => "View Images", "url" => "#")
            )),
            array("name" => "Event", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Event", "url" => "#"),
                array("name" => "View Event", "url" => "#")
            )),
            array("name" => "Enquiry", "url" => "#", "dropdownItems" => array(
                array("name" => "View enquires", "url" => "#")
            )),
            array("name" => "Contact", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Contact", "url" => "#"),
                array("name" => "View Contact", "url" => "#")
            )),
            array("name" => "Placement", "url" => "#", "dropdownItems" => array(
                array("name" => "Add Placement", "url" => "#"),
                array("name" => "View Placement", "url" => "#")
            )),
        );

        // Loop through menu items
        foreach ($menuItems as $menuItem) {
            echo '<div class="dropdown">';
            echo '<a class="dropdown-toggle" href="' . $menuItem["url"] . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            echo $menuItem["name"];
            echo '</a>';
            echo '<div class="dropdown-menu dropdown-menu-right">';
            // Loop through dropdown items
            foreach ($menuItem["dropdownItems"] as $dropdownItem) {
                echo '<a class="dropdown-item" href="' . $dropdownItem["url"] . '">' . $dropdownItem["name"] . '</a>';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>

    </div>

    <div class="container-fluid">
        <!-- Content goes here -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
