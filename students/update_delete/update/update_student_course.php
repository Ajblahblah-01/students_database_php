<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=<?php echo $_SERVER["PHP_SELF"]?> method="post">
        <label for="roll">Roll No</label>
        <input type = "text" name = "roll" placeholder="Enter Roll No" value=<?php if(isset($_GET['roll_no'])){ echo $_GET["roll_no"];} ?>>
        <br>
        <label for="old">Name</label>
        <input type = "text" name = "old" placeholder="Name" value = 
        <?php
            include "../../conn.php";
            if(isset($_GET['roll_no'])){ 
                $sql = "SELECT name FROM student WHERE roll_no = '".$_GET['roll_no']."'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['name'];
            } else{ echo "";}
        ?>>
        <br>
        <label for="new">Enter new course</label>
        <select name = "field">
            <?php
                include "../../conn.php";
                if(isset($_GET['roll_no'])){ 
                    $sql = "SELECT course_id FROM student WHERE roll_no = '".$_GET['roll_no']."'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $old_id = $row['course_id']; 
                    $sql = "SELECT course_name,course_id FROM course WHERE course_id != '$old_id'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value = ".$row['course_id'].">".$row['course_name']."</option>";
                    }
                }
            ?>
        </select>
        <br>
        <input type = "submit" value = "submit">
    </form>
    <?php 
        include "../../conn.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $roll = $_POST["roll"];
            $new = $_POST["field"];
            $sql = "UPDATE student SET course_id = '$new' WHERE roll_no = '$roll'";
            $result = mysqli_query($conn,$sql);

            if($result){
                echo "Successfuly Updated";
            }
            else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
        }
    ?>
</body>
</html>