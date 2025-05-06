<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Status</title>
    <style>
   
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 8px; /* Reduce padding for table cells */
        text-align: left;
        font-size: 14px; /* Reduce font size for table content */
        border: 1px solid #ddd;
    }

    th {
        padding: 12px; /* Reduce padding for table headers */
        background-color: skyblue;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f0f8ff; /* Sky blue background for even rows */
    }

    tr:hover {
        background-color: lightcyan;
    }

    form {
        margin: 0 auto;
        height: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    button {
        display: block;
        width: auto; /* Allow button width to adjust based on content */
        padding: 8px; /* Reduce padding for button */
        font-size: 14px; /* Reduce font size for button text */
        border: none;
        background-color: skyblue;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
        margin-top: 10px; /* Reduce top margin */
    }
</style>

</head>

<body>
    <h1>Event Status</h1>
    <br>
    <form method="post" action="event_status_en.php">
        
        <table>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Event Contact</th>
                <th>Event Location</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Event Time</th>
                <th>Event Image</th>
                <th>Status</th>
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
            $sql = "SELECT * FROM events";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["event_id"];
                    $eve_name = $row["event_name"];
                   // $email = $row["t_emp_email"];
                    $eve_contact = $row["event_contact"];
                    $eve_location = $row["event_location"];
                    //$city = $row["t_emp_city"];
                    $start_date = $row["start_date"];
                    $end_date = $row["end_date"];
                    $eve_time = $row["event_time"];
                  //  $gender = $row["t_emp_gender"];
                    $eve_image = htmlspecialchars($row["event_image"]);
                    $status = $row["status"];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$eve_name</td>";
                    echo "<td>$eve_contact</td>";
                    echo "<td>$eve_location</td>";
                    echo "<td>$start_date</td>";
                    echo "<td>$end_date</td>";
                    echo "<td>$eve_time</td>";
                    echo "<td><img src='$eve_image' alt='event Image' style='max-width: 150px; max-height: 150px;'></td>";
                    //echo "<td>$current_post</td>";
                    //echo "<td>$gender</td>";
                    //echo "<td>$dob</td>";
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

        <button type="submit">Save Changes</button>
    </form>
</body>

</html>
