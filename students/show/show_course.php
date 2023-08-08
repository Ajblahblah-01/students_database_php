<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
                        
            include "../conn.php";
            $sql = "SELECT c.course_id,c.course_name,c.coordinator_id,co.coordinator_name FROM course c JOIN coordinator co ON c.coordinator_id = co.coordinator_id";
            $result = mysqli_query($conn, $sql);
    
            echo "<table border='1'>
                    <tr>
                        <th>Course Name</th>
                        <th>Coordinator Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['course_name']."</td>";
                echo "<td>".$row['coordinator_name']."</td>";
                echo "<td><a href='../update_delete/update/update_course.php?course_id=".$row['course_id']."'>Update</a></td>";
                echo "<td><a href='../update_delete/delete/delete_course.php?course_id=".$row['course_id']."'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";    
        
    ?>
    <br>
    <button onclick="location.href='../insert/insert_data_course.php'">Add Course</button>
</body>
</html>