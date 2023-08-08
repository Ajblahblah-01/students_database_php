<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert_data_subjects.php" method="post">
        <label for="subject_id">subject_id</label>
        <input type="text" name="subject_id">
        <br>
        <label for="name">Subject Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for= "course_id">Course name</label>
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
            $id = $_POST['subject_id'];
            $name = $_POST['name'];
            $course_id = $_POST['course_id'];
            $sql = "INSERT INTO subjects(subject_id, subject_name,course_id ) VALUES('$id', '$name', '$course_id')";

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

