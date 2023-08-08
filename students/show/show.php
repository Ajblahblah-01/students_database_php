<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: ".mysqli_connect_error());
        }

        $sql = "SELECT student.roll_no, student.name, course.course_name,course.course_id, coordinator.coordinator_name
                FROM student 
                JOIN course ON student.course_id = course.course_id
                JOIN coordinator ON course.coordinator_id = coordinator.coordinator_id";
       
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        echo "<table border='1'>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Coordinator</th>
                    <th>Show Marks</th>
                    <th>Add Marks</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['roll_no']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['course_name']."</td>";
            echo "<td>".$row['coordinator_name']."</td>";
            echo "<td><a href='../show/show_marks.php?roll_no=".$row['roll_no']."'>Show Marks</a></td>";
            echo "<td><a href='../insert/insert_data_marks.php?roll_no=".$row['roll_no']."&course_id=".$row['course_id']."'>Add Marks</a></td>";
            echo "<td><a href='../update_delete/update/update_student.php?roll_no=".$row['roll_no']."&name=".$row['name']."'>Update</a></td>";
            echo "<td><a href='../update_delete/delete/delete_student.php?roll_no=".$row['roll_no']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <br>
    <button onclick="location.href='../insert/insert_data_student.php'">Add Student</button>
</body>
</html>