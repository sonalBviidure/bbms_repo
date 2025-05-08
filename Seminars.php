<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Seminars</title>
    <link rel="stylesheet" href="css/seminars.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
         .card-title ,.icon{
            color: #00b9fe;
        }
     </style>      
</head>
<body>
    <?php include('navbar.php');?>

    <header>
        <h1 class="seminar-heading mt-4"><span class="icon">S</span>eminar</h1>
    </header>

    <section class="seminar-organization">
    <main class="container">
        <!-- Cards for the provided content -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Card 1: Event Planning -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Event Planning</h5>
                    <p class="card-text">Organizing logistics such as venue selection, date scheduling, and coordinating with suppliers for necessary services.</p>
                </div>
            </div>

            <!-- Card 2: Promotion and Marketing -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Promotion and Marketing</h5>
                    <p class="card-text">Creating promotional materials and marketing the seminar to attract attendees through various channels like email, social media, and online platforms.</p>
                </div>
            </div>

            <!-- Card 3: Registration and Attendee Management -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Registration and Attendee Management</h5>
                    <p class="card-text">Setting up an online or offline registration system, managing attendee lists, and ensuring a smooth check-in process.</p>
                </div>
            </div>

            <!-- Card 4: Content Development -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Content Development</h5>
                    <p class="card-text">Developing seminar content, including presentations, workshops, or panel discussions, aligning with the theme and objectives of the seminar.</p>
                </div>
            </div>

            <!-- Card 5: Speaker Management -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Speaker Management</h5>
                    <p class="card-text">Identifying and inviting knowledgeable speakers, coordinating their schedules, and ensuring they have the necessary resources for their presentations.</p>
                </div>
            </div>

            <!-- Card 6: Sponsorship Coordination -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Sponsorship Coordination</h5>
                    <p class="card-text">Attracting sponsors to support the seminar, managing sponsorship agreements, and ensuring sponsors receive appropriate visibility.</p>
                </div>
            </div>

            <!-- Card 7: Audio-Visual Setup -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Audio-Visual Setup</h5>
                    <p class="card-text">Arranging for necessary audio-visual equipment, ensuring proper setup for presentations, and troubleshooting technical issues.</p>
                </div>
            </div>

            <!-- Card 8: Catering and Hospitality -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Catering and Hospitality</h5>
                    <p class="card-text">Coordinating catering services for meals, snacks, and beverages during the seminar, and managing any hospitality arrangements for speakers or VIP guests.</p>
                </div>
            </div>

            <!-- Card 9: Networking Opportunities -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Networking Opportunities</h5>
                    <p class="card-text">Incorporating networking sessions or activities to facilitate interactions among attendees, speakers, and sponsors.</p>
                </div>
            </div>

            <!-- Card 10: Feedback Collection -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Feedback Collection</h5>
                    <p class="card-text">Implementing mechanisms to collect feedback from attendees regarding the seminar content, organization, and overall experience.</p>
                </div>
            </div>

            <!-- Card 11: Documentation and Recording -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Documentation and Recording</h5>
                    <p class="card-text">Capturing the seminar proceedings through recording or photography, and preparing post-event documentation or reports.</p>
                </div>
            </div>

            <!-- Card 12: Evaluation and Analysis -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Evaluation and Analysis</h5>
                    <p class="card-text">Assessing the success of the seminar through key performance indicators, attendee feedback, and other evaluation methods.</p>
                </div>
            </div>

            <!-- Card 13: Follow-Up Communication -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Follow-Up Communication</h5>
                    <p class="card-text">Sending post-event communications, such as thank-you messages, presentation materials, or additional resources to attendees.</p>
                </div>
            </div>

            <!-- Card 14: Post-Seminar Analysis -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Post-Seminar Analysis</h5>
                    <p class="card-text">Conducting a post-seminar analysis to identify areas of improvement for future events and refining the seminar strategy.</p>
                </div>
            </div>

            <!-- Card 15: Compliance and Legal Considerations -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Compliance and Legal Considerations</h5>
                    <p class="card-text">Ensuring compliance with relevant laws, regulations, and industry standards for organizing events.</p>
                </div>
            </div>
        </div>
    </main>
</section>

    
    <?php include('footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
