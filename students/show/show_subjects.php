<?php
    include '../conn.php';
    $sql = "SELECT subjects.subject_id,subjects.subject_name,course.course_name FROM subjects JOIN course ON subjects.course_id = course.course_id";
    $result = mysqli_query($conn, $sql);

    echo "<table border = 1>
            <th>Subject Name</th>
            <th>Course Name</th>
            <th>Update</th>
            <th>Delete</th>
            ";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['subject_name']."</td>";
        echo "<td>".$row['course_name']."</td>";
        echo "<td><a href='../update_delete/update/update_subjects.php?subject_id=".$row['subject_id']."'>Update</a></td>";
        echo "<td><a href='../update_delete/delete/delete_subjects.php?subject_id=".$row['subject_id']."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>