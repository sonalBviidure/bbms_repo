<?php
// Check if the file parameter is set in the URL
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    
    // File path on the server
    $filepath = 'admin/syllabus/' . $file;
    
    // Check if the file exists
    if (file_exists($filepath)) {
        // Get the file extension
        $fileExtension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        
        // Set headers based on file extension for appropriate download
        switch ($fileExtension) {
            case 'pdf':
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
                break;
            case 'csv':
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
                break;
            default:
                // Unsupported file type error
                echo "Unsupported file type.";
                exit;
        }

        // Set other headers for file download
        header('Content-Description: File Transfer');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // Read and output the file contents
        readfile($filepath);
        exit;
    } else {
        // File not found error
        echo "File not found.";
    }
} else {
    // Invalid request error
    echo "Invalid request.";
}
?>
