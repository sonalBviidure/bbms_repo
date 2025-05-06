
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Status</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 50%;

        }

        .container {
            width: 80%; /* Adjust the width as needed */
            margin: 20px auto; /* Center the container */
            overflow: auto; /* Enable vertical scrolling */
            max-height: 600px; /* Set maximum height for scrolling */
            margin-top: -45px;
    
        }

        table {
            width: 70%;
            margin-left:350px;
            /* margin-right: 100px; */
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #008B8B;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f0f8ff;
        }

        tr:hover {
            background-color: #F0FFFF;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
            margin-left: 250px;
        }

        button {
            padding: 12px 20px;
            font-size: 14px;
            border: none;
            background-color: #008B8B;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }

        .button-container2 {
        position: fixed;
        bottom: 20px;
        padding-left: 260px;
        z-index: 999; /* Ensure it's above other content */
        }

        .button-container2 a {
        display: inline-block;
        padding: 5px;
        background-color: #008B8B;
        color: white;
        border-radius: 0%;
        text-decoration: none;
}
    /* Responsive styles */
    @media (max-width: 768px) {
            table {
                width: 100%;
                margin-left: auto;
                margin-right: auto;
            }

            /* Hide the ID column on small screens */
            th:first-child,
            td:first-child {
                display: none;
            }

            /* Adjust padding for table cells on small screens */
            th, td {
                padding: 8px;
            }
        }
        @media (max-width: 768px) {
    /* Adjust container padding for smaller screens to accommodate sidebar */
    .container {
        width: 100%;
        margin: 20px 0;
        padding-left: 220px; /* Adjust left padding for sidebar width */
        position: relative; /* Position relative for positioning absolute elements */
    }

    /* Show sidebar on small screens */
    .sidebar {
        display: block;
        width: 200px;
        background-color: #ddd;
        padding: 20px;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        z-index: 999; /* Ensure sidebar is above other content */
    }

    /* Ensure the back button is fixed to the bottom left of the screen */
    .button-container2 {
        position: fixed;
        bottom: 20px;
        left: -270px;
        z-index: 999; /* Ensure it's above other content */
    }
}
@media (max-width: 768px) {
        .container {
            padding-left: 220px; /* Adjust as needed */
        }
    }

    </style>
</head>

<body>
    <!-- <h1>Internship Status</h1> -->
    <?php include "a_dashb.php"; // Include the dashboard content ?>
    <form method="post" action="intern_status_en.php">
        
        <table>
            <tr>
                <th>ID</th>
                <th>internship Name</th>
                <th>position </th>
                <th>about us</th>
                <th>location</th>
                <th>duration</th>
                
                <th>Image</th>
                <th>requirements</th>
                <th>status</th>
                
            </tr>

            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "tnp_k";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve data from database
            $sql = "SELECT * FROM internships";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $internship = $row["internship"];
                    $position = $row["position"];
                    $about = $row["about_us"];
                    $location = $row["location"];
                    $duration = $row["duration"];
                //    $start_date = $row["start_date"];
                    $image = htmlspecialchars($row["image"]);
                    $req = $row["requirements"];
                    $status = $row["status"];
                    
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$internship</td>";
                    echo "<td>$position</td>";
                    echo "<td>$about</td>";
                    echo "<td>$location</td>";
                    echo "<td>$duration</td>";
                  //  echo "<td>$start_date</td>";
                    echo "<td><img src='$image' alt='Event Image' style='max-width: 150px; max-height: 150px;'></td>";
                    echo "<td>$req</td>";
                    
    
                    echo "<td><input type='checkbox' name='status[]' value='$id'";
                    if ($status == 1) {
                        echo " checked";
                    }
                    echo "></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }

            $conn->close();
            ?>
            
        </table>        
    </div>
        <div class="button-container">
           <button type="submit">Save Changes</button>
        </div>
    </form>
    <div class="button-container2">
        <a href="admindash2.php"><i class="fas fa-arrow-left"></i></a>
    </div>
</body>

</html>

















































