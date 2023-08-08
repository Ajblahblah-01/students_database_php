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
        $roll_no = $_GET['roll_no'];
        $sql = "SELECT subjects.subject_name, marks.marks,marks.marks_id,marks.roll_no
                FROM marks
                JOIN subjects ON marks.subject_id = subjects.subject_id
                WHERE marks.roll_no = '$roll_no'";
        $result = mysqli_query($conn, $sql);
        
        $name_sql = "SELECT name FROM student WHERE roll_no = '$roll_no'";
        $name_result = mysqli_query($conn, $name_sql);
        $name_row = mysqli_fetch_assoc($name_result);
        echo "<h1>Name: ".$name_row['name']."</h1> <h2>Roll No: ".$roll_no." </h2> <br>";
        echo "<table border='1'>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>"; 

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['subject_name']."</td>";
            echo "<td>".$row['marks']."</td>";
            echo "<td><a href='../update_delete/update/update_marks.php?marks_id=".$row['marks_id']."&marks=".$row['marks']."&roll_no=".$row['roll_no']."'>Update</a></td>";
            echo "<td><a href='../update_delete/delete/delete_marks.php?marks_id=".$row['marks_id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>

</body>
</html>