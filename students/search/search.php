<!DOCTYPE html>
<ht lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "search.php" method = "post">
        <label for="search">Roll No</label>
        <input type="text" name="roll_no">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: ".mysqli_connect_error());
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $roll_no = $_POST['roll_no'];
            $sql = "SELECT student.roll_no, student.name, course.course_name,course.course_id, coordinator.coordinator_name
            FROM student 
            JOIN course ON student.course_id = course.course_id
            JOIN coordinator ON course.coordinator_id = coordinator.coordinator_id
            WHERE student.roll_no = '$roll_no'";
                        
            $result = mysqli_query($conn, $sql);
            
            // display data in a table
            echo "<table border='1'>
            <tr>    
                <th>Roll No</th>
                <th>Name</th>
                <th>Course</th>
                <th>Coordinator</th>
            </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['roll_no']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['course_name']."</td>";
                echo "<td>".$row['coordinator_name']."</td>";
                echo "</tr>";
            }
            echo "</table>";

        }
        
    ?>
</body>
</ht