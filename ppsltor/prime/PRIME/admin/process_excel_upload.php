<?php
// Include PhpSpreadsheet library
require_once 'src/PhpSpreadsheet/Spreadsheet.php'; // Adjust the path as needed

use PhpOffice\PhpSpreadsheet\IOFactory;

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "ltor_academy";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST["upload"])) {
    if (!empty($_FILES["excel_file"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["excel_file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an Excel file
        if ($fileType != "xls" && $fileType != "xlsx") {
            header("Location: index.html?status=format");
            exit();
        }

        if (move_uploaded_file($_FILES["excel_file"]["tmp_name"], $target_file)) {
            // Load the Excel file using PhpSpreadsheet
            $spreadsheet = IOFactory::load($target_file);
            $sheet = $spreadsheet->getActiveSheet();
            $highestRow = $sheet->getHighestRow();

            // Loop through each row in the Excel file
            for ($row = 2; $row <= $highestRow; $row++) { // Assuming data starts from row 2
                $id = $sheet->getCell('A' . $row)->getValue(); // Assuming ID is in column A
                $firstName = $sheet->getCell('B' . $row)->getValue(); // Change column letter based on data position
                $middleName = $sheet->getCell('C' . $row)->getValue(); // Change column letter based on data position

                // Check if the record exists in the database
                $selectQuery = "SELECT * FROM registration WHERE t_id = '" . $con->real_escape_string($id) . "'";
                $result = $con->query($selectQuery);

                if ($result->num_rows > 0) {
                    // Record exists, compare and update if needed
                    $row = $result->fetch_assoc();
                    if ($row['t_first_name'] != $firstName || $row['t_middle_name'] != $middleName) {
                        // Data has changed, update the record
                        $updateQuery = "UPDATE registration SET 
                                        t_first_name='" . $con->real_escape_string($firstName) . "', 
                                        t_middle_name='" . $con->real_escape_string($middleName) . "' 
                                        WHERE t_id='" . $con->real_escape_string($id) . "'";
                        $con->query($updateQuery);
                    }
                }
            }

            // Database updated successfully
            header("Location: index.html?status=success");
            exit();
        } else {
            // Error uploading file
            header("Location: index.html?status=error");
            exit();
        }
    } else {
        // No file selected
        header("Location: index.html?status=empty");
        exit();
    }
}

// Close database connection
$con->close();
?>
