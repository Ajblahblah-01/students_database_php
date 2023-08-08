<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert_data_student.php" method="post">
        <label for="roll_no">Roll no</label>
        <input type="text" name="roll_no" id="roll_no">
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="course_id">Course Name</label>
        <?php
            include '../conn.php';
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);

            echo "<select name='course_id'>";
            while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['course_id']."'>".$row['course_name']."</option>";
            }
            echo"</select>";
        ?>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        include "../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $roll_no = $_POST['roll_no'];
            $name = $_POST['name'];
            $course_id = $_POST['course_id'];
            $sql = "INSERT INTO student(roll_no, name, course_id) VALUES('$roll_no', '$name', '$course_id')";
            
            if(mysqli_query($conn, $sql)){
                echo "Data inserted successfully";
            }
            else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
        }
        

    ?>
</body>
</html>

