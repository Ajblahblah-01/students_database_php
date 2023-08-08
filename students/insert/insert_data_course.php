<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="insert_data_course.php" method="post">
        <label for="course_id">Course_id</label>
        <input type="text" name="course_id">
        <br>
        <label for="name">Course Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="coordinator_id">Coordinator Name</label>
        <?php
            include '../conn.php';

            $sql = "SELECT * FROM coordinator";
            $result = mysqli_query($conn, $sql);

            echo "<select name='coordinator_id'>";
            while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['coordinator_id']."'>".$row['coordinator_name']."</option>";
            }
            echo"</select>";
        ?>
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
            $id = $_POST['course_id'];
            $name = $_POST['name'];
            $coordinator_id = $_POST['coordinator_id'];

            $sql = "INSERT INTO course(course_id, course_name,coordinator_id ) VALUES('$id', '$name', '$coordinator_id')";

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

