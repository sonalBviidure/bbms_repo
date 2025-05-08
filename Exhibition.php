<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./admin/image/favicon.jpeg" type="image/x-icon">
    <title>Exhibition</title>
    <link rel="stylesheet" href="css/exhibition.css">

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
        <h1 class="exhibition-heading mt-4"><span class="icon">B</span>usiness <span class="icon">E</span>xhibition</h1>
    </header>

    <section class="exhibition">
    <main class="container">
        <!-- Cards for the provided content -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Card 1: Product and Service Showcase -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Product and Service Showcase</h5>
                    <p class="card-text">Companies use exhibitions to display their latest products, services, or innovations to a wide audience.</p>
                </div>
            </div>

            <!-- Card 2: Networking Opportunities -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Networking Opportunities</h5>
                    <p class="card-text">Exhibitors and attendees have the chance to network, fostering connections and potential collaborations within the industry.</p>
                </div>
            </div>

            <!-- Card 3: Market Research -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Market Research</h5>
                    <p class="card-text">Businesses can gather feedback, conduct surveys, and gauge market trends by interacting with attendees.</p>
                </div>
            </div>

            <!-- Card 4: Brand Exposure -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Brand Exposure</h5>
                    <p class="card-text">Exhibiting companies can increase brand visibility and awareness, reaching a broader audience than traditional marketing channels.</p>
                </div>
            </div>

            <!-- Card 5: Industry Education -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Industry Education</h5>
                    <p class="card-text">Workshops, seminars, or presentations held during exhibitions provide opportunities for attendees to learn about industry trends, best practices, and new technologies.</p>
                </div>
            </div>

            <!-- Card 6: Lead Generation -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Lead Generation</h5>
                    <p class="card-text">Exhibitors can generate leads by engaging with potential customers and collecting contact information for follow-up.</p>
                </div>
            </div>

            <!-- Card 7: Sales Opportunities -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Sales Opportunities</h5>
                    <p class="card-text">Direct sales can occur during exhibitions, as attendees may make purchases or express interest in products and services.</p>
                </div>
            </div>

            <!-- Card 8: Competitor Analysis -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Competitor Analysis</h5>
                    <p class="card-text">Businesses can observe competitors and stay informed about industry developments and innovations.</p>
                </div>
            </div>

            <!-- Card 9: Brand Positioning -->
            <div class="col">
                <div class="card" style="width:100%;height:170px;">
                    <h5 class="card-title">Brand Positioning</h5>
                    <p class="card-text">Exhibiting at industry-specific events helps position a brand as a key player within that market.</p>
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
