<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courses Status</title>
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
    <h1>courses Status</h1>
    <br>
    <form method="post" action="courses_status_en.php">
        
        <table>
            <tr>
                <th>ID</th>
                <th>courses Name</th>
                <th>Instructor</th>
                <th>Location</th>                
                <th>duration</th>
                <th>Start Date</th>
                <th>syllabus</th>
                <th>Image 1</th>
                <th>Image 2</th>
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
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["t_course_id"];
                    $course_name = $row["course_name"];
                    $course_instructor = $row["instructor"];
                    $course_location = $row["location"];
                    $start_date = $row["duration"];
                    $course_date = $row["start_date"];
                    $syllabus = $row["syllabus"];
                    $course_image1 = $row["image1"];
                    $course_image2 = $row["image2"];
                    $status = $row["status"];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$course_name</td>";
                    echo "<td>$course_instructor</td>";
                    echo "<td>$course_location</td>";
                    echo "<td>$start_date</td>";
                    echo "<td>$course_date</td>";
                    echo "<td>$syllabus</td>";
                    echo "<td>$course_image1</td>";
                    echo "<td>$course_image2</td>";
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
