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
        $sql = "SELECT c.coordinator_id,c.coordinator_name,co.course_name FROM coordinator c LEFT JOIN course co ON c.coordinator_id = co.coordinator_id";
        $result = mysqli_query($conn, $sql);

        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Course Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['coordinator_name']."</td>";
            echo "<td>".$row['course_name']."</td>";
            echo "<td><a href='../update_delete/update/update_coordinator.php?coordinator_id=".$row['coordinator_id']."'>Update</a></td>";
            echo "<td><a href='../update_delete/delete/delete_coordinator.php?coordinator_id=".$row['coordinator_id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>