<?php
// Database connection details - Please check and include your actual connection file.
include 'Includes/connection.php'; // Adjust path as needed

// Check if form is submitted
if (isset($_POST['sub'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $subcoursename = $_POST['subcoursename'];

    // Query to fetch the syllabus file from the database based on the subcourse name
    $query = "SELECT syllabus FROM subcourse WHERE subcoursename = ?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("s", $subcoursename);

        // Execute statement
        if ($stmt->execute()) {
            // Bind result variables
            $stmt->bind_result($syllabusFile);
            // Fetch the result
            $stmt->fetch();

            // Set headers for file download
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $subcoursename . '_syllabus.pdf"');
            header('Content-Length: ' . filesize($syllabusFile)); // Set content length

            // Output the file content for download
            readfile($syllabusFile);
            exit(); // Stop script execution after file download
        } else {
            echo "Error fetching syllabus file: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $con->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection - Uncomment if you have a valid database connection
// $con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry</title>
    <link rel="stylesheet" href="css/inquiry.css">
    <link rel="stylesheet" href="css/.css">
    <link rel="icon" href="./PRIME LOGO.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php include('navbar.php');?>
    <div class="container mt-5">
        <h1 class="text-center">Inquiry Form</h1>
        <form id="inquiryForm" method="post" class="mt-5">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="contact" class="form-label">Contact:</label>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="Phone Number" required>
                </div>
            </div>
            <!-- Hidden input field to store subcoursename -->
            <input type="hidden" name="subcoursename" value="<?php echo isset($_GET['subcoursename']) ? $_GET['subcoursename'] : ''; ?>">
            <button type="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 200px;" name="sub">Submit</button>
        </form>
    </div>
    
    
    <!-- Bootstrap JS (Place this before the closing </body> tag) -->
    <script src="js/dist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>