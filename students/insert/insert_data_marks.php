<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert_data_marks.php" method="post">
        <label for="marks_id">Marks_id</label>
        <input type="text" name="marks_id" >
        <br>
        <label for="roll_no">Roll No</label>
        <input type="text" name="roll_no" value=<?php if(isset($_GET['roll_no'])) echo $_GET['roll_no']; ?>>
        <br>
        <label for="roll_no">Student Name</label>
        <?php
            if(isset($_GET['roll_no'])){
                include '../conn.php';
                $sql = "SELECT name FROM student WHERE roll_no = '".$_GET['roll_no']."'";
                $result = mysqli_query($conn, $sql);
                $name = mysqli_fetch_array($result);
                echo "<input type='text' name='name' value=".$name['name'].">";
            }
           
        ?>
        <br>
        <label for="subject_id">Subject Name</label>    
        <?php
           if(isset($_GET['course_id'])){
            include '../conn.php';
            $id = $_GET['course_id'];
            $sql = "SELECT * FROM subjects WHERE course_id = '$id'";
            $result = mysqli_query($conn, $sql);

            echo "<select name='subject_id'>";
            while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['subject_id']."'>".$row['subject_name']."</option>";
            }
            echo"</select>";
           }
        ?>
        <br>
        <label for="marks">Marks</label>
        <input type="text" name="marks">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
           
        include "../conn.php";
                              
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['marks_id'];
            $marks = $_POST['marks'];
            $subject_id = $_POST['subject_id'];
            $roll_no = $_POST['roll_no'];
            $sql = "INSERT INTO marks(marks_id, marks, subject_id,roll_no) VALUES('$id','$marks', '$subject_id','$roll_no')";

            if(mysqli_query($conn, $sql)){
                header('Location: ../show/show_marks.php?roll_no='.$roll_no.'');
            }else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
            
        }
        

    ?>
</body>
</html>
