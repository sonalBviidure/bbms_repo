<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <title>Internship</title>
    <link rel="stylesheet" href="css/internship.css">
    <link rel="stylesheet" href="css/devteam.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <?php include('navbar.php');?>
    
    <header class="internship-heading" style="display: flex; justify-content: center; align-items: center;">
</header>


            
     
<center> <h3 style="margin-top:5px"><span class="latter">I</span>nternship</h3></center>
    <section class="info">
    <div class="container">
        <h2 style="font-size:24px">About Internship</h2>
        
        <div class="row">
            <div class="col-md-4">
                <img src="admin/image/internship.jpeg" alt="Internship Image" class="img-fluid mb-3" style="width:100%;height:100%;" >
            </div>
            <div class="col-md-8">
                <p>
                    <br>
                    <br>
                    Explore real-world projects under the mentorship of Kale sir, our esteemed Corporate Trainer.
                    Here, students work on live projects with guidance from senior teams. The internship includes a technical interview, HR interview, and a final meeting with the
                    technical management team for selected candidates. A minimum 3-month commitment is required, and
                    successful interns receive an Internship Certificate.
                </p>
            </div>
        </div>
    </div>
</section>


    <section class="info">
        <h2 style="font-size:24px">About Stipend</h2>
        <p>
            Stipends are awarded to candidates handling clients independently. Choose from technologies like Full Stack Development, App Development, Digital Marketing, Data Science, HR Management, and Entrepreneur Skill Development.
            Opportunities for recruitment may follow a successful internship.
        </p>
    </section>

    <section class="info">
        <h2 style="font-size:24px">Internship Documentation Requirements</h2>
        <ul>
            <li>Submit 2 photos.</li>
            <li>Aadhar card Xerox.</li>
            <li>Last Educational Xerox certificate.</li>
            <li>2 copies of the resume.</li>
        </ul>
    </section>
    <section class="info">
    <div class="container">
        <h2 style="font-size:24px">Daily Work Schedule</h2>
        <div class="row">
            <div class="col-md-8">
                <p>Compulsory attendance every working day.<br>
                Daily schedule includes 2 hours of training and 4 hours of project work daily.
                <br>Sundays are holiday.   
                </p>
            </div>
            
            <div class="col-md-4">
                <img src="./off.jpg" alt="Internship Image" class="img-fluid mb-3" style="width:100%;height:100%;" >
            </div>
        </div>
    </div>
</section>
    <!-- <section class="info">
        <h2 style="font-size:24px">Daily Work Schedule</h2>
        <ul>
            <li>Compulsory attendance every working day.</li>
            <li>Daily schedule includes 2 hours of training and 4 hours of project work daily.</li>
            <li>Sundays are holiday.</li>
        </ul>
    </section> -->

    <section class="info">
        <h2 style="font-size:24px">Additional Information</h2>
        <ul>
            <li>Mandatory preparation and reporting to the senior team.</li>
            <li>Progress reports by HR are required.</li>
            <li>Award ceremonies are held every Friday.</li>
            <li>Upon joining, candidates receive the required syllabus Excel file for the chosen technology.</li>
        </ul>
    </section>
<section class="my-devteam">
    <div class="container">
        <div class="text-center">
            <h3 style="margin-top: 5px;"><span class="latter">D</span>eveloper <span class="latter">T</span>eam</h3>
        </div>
        <br>
        <div class="row team-container justify-content-center">
            <!-- Team Member 1 -->
            <?php
            // Perform SQL query to fetch data from the database
            $sql = "SELECT * FROM devloperteam WHERE status=1";
            $result = $con->query($sql);

            // Check if the query was successful
            if ($result) {
                // Fetch data and dynamically generate team members
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
                    echo '<div class="team-member text-center">';
                    echo '<img src="admin/' . $row['dev_image'] . '" alt="' . $row['dev_member_name'] . '" class="img-dev rounded-circle img-fluid">';
                    echo '<div class="member-info">';
                    echo '<h5>' . $row['dev_member_name'] . '</h5>';
                    echo '<p>' . $row['dev_member_role'] . '</p>';
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

<style>
    .team-member {
        transition: transform 0.3s ease; /* Add smooth transition on hover */
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .team-member:hover {
        transform: translateY(-5px); /* Lift the card slightly on hover */
    }

    .img-dev {
        width: 150px; /* Adjust image width for consistency */
        height: 150px; /* Adjust image height for consistency */
        object-fit: cover;
        border-radius: 50%; /* Apply circular clipping mask */
        overflow: hidden; /* Hide any overflow */
        margin-right:60px;
    }

    .member-info {
        padding-top: 10px; /* Adjust spacing between image and text */
        width: 100%; /* Ensure text width matches image width */
        text-align: center; /* Center-align text */
        margin-left: 15px;
    }

    .member-info h5 {
        margin-bottom: 5px;
        font-size: 18px;
        font-weight: bold;
    }

    .member-info p {
        margin-bottom: 0;
        font-size: 16px;
        color: #666;
    }

    /* Optional: Remove default spacing and margin */
    .my-devteam {
        padding-top: 20px;
    }

    .team-container {
        margin: 0 -15px; /* Remove default row margin */
    }

    .col-lg-3,
    .col-md-4,
    .col-sm-6 {
        padding: 0 15px; /* Adjust column padding */
    }
</style>

    <?php include('footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>